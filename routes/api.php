<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Wallet",
 *      @OA\Contact(
 *          email="zoheirmaz.zm@gmail.com"
 *      ),
 * ),
 * @OA\Server(
 *      url="/api",
 *  )
 */


Route::prefix('/credit')->group(function () {
    /**
     * @OA\Post(
     *     path="/credit/charge",
     *     summary="Charge user credit",
     *     tags={"Credit"},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="amount",
     *                  type="integer",
     *              ),
     *              @OA\Property(
     *                  property="mobile",
     *                  type="string",
     *              ),
     *          )
     *     ),
     *     @OA\Response(response="200", description="register sucessful"),
     *     @OA\Response(response="401", description="unauthorized")
     * )
     */
    Route::post('/charge', 'CreditController@charge');
});

Route::prefix('/coupon')->group(function () {
    /**
     * @OA\Post(
     *      path="/coupon/apply",
     *      summary="apply a coupon and get credit",
     *      tags={"Coupon"},
     *     @OA\Parameter(
     *          name="coupon_id",
     *          description="Coupon id",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="mobile",
     *          description="User mobile",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(response="200", description="requst is sucessful"),
     *      @OA\Response(response="401", description="unauthorized")
     * )
     */
    Route::post('/apply', 'CreditController@getCreditByCoupon');
});
