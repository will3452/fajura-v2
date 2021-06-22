<?php

use App\Models\Package;
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

Route::get('v1/packages', function(Request $request){
    
    if($request->has('q')){
        $packages = Package::with('services')->where('name', 'LIKE', '%'.$request->q.'%')->get();
    }else {
        $packages = Package::with('services')->get();
    }
    
    return $packages; 
});