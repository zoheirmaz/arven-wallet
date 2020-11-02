<?php

namespace App\Http\Controllers\Test;

use App\Entities\Enumeration;
use App\Entities\Transaction;
use App\Http\Resources\TransactionResource;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Infrastructure\Abstracts\ControllerAbstract;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Infrastructure\Enums\PaymentGatewaysEnums;
use Infrastructure\Enums\TransactionStatusEnums;
use Shetabit\Multipay\Abstracts\Driver;
use Shetabit\Multipay\Contracts\ReceiptInterface;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class Test
{
    public function payment()
    {
        $p = new \App\Entities\Payment();
        $p->{\App\Entities\Payment::ENTITY_TYPE} = 1;
        $p->{\App\Entities\Payment::ENTITY_ID} = 1;
        $p->save();

        return pay($p);
    }

    public function returnPayment(Request $request)
    {
        $transactionId = $request->get('Authority');

        $transaction = Transaction::query()->where(
            Transaction::TRANSACTION_ID,
            $transactionId
        )->where(
            Transaction::STATUS,
            TransactionStatusEnums::WAITING
        )->first();

        try {
            /** @var ReceiptInterface $receipt */
            $receipt = Payment::amount(1000)->transactionId($transactionId)->verify();

            $transaction->{Transaction::PAID_AT} = Carbon::now();
            $transaction->{Transaction::STATUS} = TransactionStatusEnums::PAID;
            $transaction->{Transaction::REFERENCE_ID} = $receipt->getReferenceId();

            dd($receipt->getDriver());
        } catch (InvalidPaymentException $exception) {
            $transaction->{Transaction::STATUS} = TransactionStatusEnums::FAILED;
            $transaction->{Transaction::GATEWAY_STATUS} = $exception->getCode();

            dd($exception->getCode());
        }
    }
}
