<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Contact;

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
 
Route::get('contacts', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Contact::all();
});
 
Route::get('contacts/{id}', function($id) {
    return Contact::find($id);
});

Route::post('contacts', function(Request $request) {
    return Contact::create($request->all);
});

Route::put('contacts/{id}', function(Request $request, $id) {
    $contacts = Contact::findOrFail($id);
    $contacts->update($request->all());

    return $contacts;
});

Route::delete('contacts/{id}', function($id) {
    Contact::find($id)->delete();

    return 204;
});