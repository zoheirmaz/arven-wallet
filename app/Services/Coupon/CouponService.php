<?php

namespace App\Services\Coupon;

use App\Entities\Credit;
use Illuminate\Support\Facades\Http;
use Infrastructure\Interfaces\Services\CouponServiceInterface;
use Infrastructure\Interfaces\Services\Coupon\FieldOutput\FieldOutputInterface;

class CouponService implements CouponServiceInterface
{
    private $url;
    private $timeout;
    private $mobile;
    private $coupon_id;

    public function __construct($mobile, $coupon_id)
    {
        $this->mobile = $mobile;
        $this->coupon_id = $coupon_id;
        $this->url = config('services.coupon.url');
        $this->timeout = config('services.coupon.timeout');
    }

    public function outputCredit(array $params)
    {
        $couponResponse = $this->getCoupon($params);
        return $this->getCouponOutput($couponResponse, $params);
    }

    private function getCoupon(array $params = [])
    {
        $url = config('services.coupon.apply_coupon');

        $params = $this->injectToRequestParams($params);

        $response = Http::post(
            $this->url . $url,
            $params
        );

        if ($response->status() == 200) {
            $responseData = $response->json()['data'];

            return $this->injectToCreditFields($responseData);
        } else {
            throw new \Exception($response->json()['error']['messages'][0]['text']);
        }
    }

    private function injectToRequestParams(array $params): array
    {
        $params['mobile'] = $this->mobile;
        $params['coupon_id'] = $this->coupon_id;

        return $params;
    }

    private function injectToCreditFields(array $credit): array
    {
        $credit[Credit::USER_ID] = $this->mobile;
        $credit[Credit::DESCRIPTION] = 'افزایش اعتبار بابت کپن شماره ' . $this->coupon_id;
        $credit[Credit::CREATED_BY] = $this->mobile;

        return $credit;
    }

    private function getCouponOutput($inputs, $requestParams)
    {
        $output = [];

        foreach ($inputs as $field => $input) {
            $fieldOutputClass = config('coupon.field_output_directory_name') . '\\' . ucfirst($field);

            if (!class_exists($fieldOutputClass)) {
                $output[$field] = $input;
            } else {
                /** @var FieldOutputInterface $fieldOutputObj */
                $fieldOutputObj = new $fieldOutputClass();

                $fieldOutput = $fieldOutputObj->output($input);

                $output = array_merge($output, $fieldOutput);
            }
        }

        $output = $this->injectToCreditFields($output);
        return $output;
    }
}
