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
 *      title="L5 OpenApi",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="zoheirmaz.zm@gmail.com"
 *      ),
 * ),
 * @OA\Server(
 *      url="/api",
 *  )
 */


/**
 * @OA\Get(
 *     path="/user",
 *     summary="Get current user",
 *     tags={"User"},
 *     @OA\Response(response="200", description="register sucessful"),
 *     @OA\Response(response="401", description="unauthorized"),
 *     security={
 *         {
 *             "bearer": {}
 *         }
 *     },
 * )
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * @OA\Post(
 *     path="/register",
 *     summary="Register a user",
 *     tags={"User"},
 *     @OA\RequestBody(
 *          description="Pass name, mobile, password",
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="name",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="mobile",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="password",
 *                  type="string",
 *              )
 *          )
 *     ),
 *     @OA\Response(response="200", description="register sucessful"),
 *     @OA\Response(response="401", description="unauthorized")
 * )
 */
Route::post('/register', 'AuthController@register');

/**
 * @OA\Post(
 *     path="/login",
 *     summary="Post to URL",
 *     tags={"User"},
 *     @OA\RequestBody(
 *          request="Pet",
 *          description="Pet object that needs to be added to the store",
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="mobile",
 *                  type="string",
 *              ),
 *              @OA\Property(
 *                  property="password",
 *                  type="string",
 *              )
 *          )
 *     ),
 *     @OA\Response(response="200", description="login sucessful"),
 *     @OA\Response(response="401", description="unauthorized")
 * )
 */
Route::post('/login', 'AuthController@login');
