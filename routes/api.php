<?php

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Luigel\Paymongo\Facades\Paymongo;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/webhook/paymongo', function(Request $request){
    $data = Arr::get($request->all(), 'data.attributes');

        if ($data['type'] !== 'source.chargeable') {
            return response()->noContent();
        }

        $source = Arr::get($data, 'data');
        $sourceData = $source['attributes'];

        if ($sourceData['status'] === 'chargeable') {
            $payment = Paymongo::payment()->create([
                'amount' => $sourceData['amount'] / 100,
                'currency' => $sourceData['currency'],
                'description' => $sourceData['type'].' test from src ' . $source['id'],
                'source' => [
                    'id' => $source['id'],
                    'type' => $source['type'],
                ]
            ]);
        }
        return response()->noContent();
});
