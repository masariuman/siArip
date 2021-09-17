<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/logout', 'UuzaaController@logout');

Route::get('/getUuzaa', 'UuzaaController@getUuzaa');

Route::post('/kanrisha/masuk/deeta/update', 'suratMasukCOntroller@apdet');
Route::post('/kanrisha/keluar/deeta/update', 'suratKeluarController@apdet');

Route::post('/kanrisha/uuzaa/sashin', 'UuzaaController@sashin');
Route::post('/kanrisha/uuzaa/sashinUuzaa', 'UuzaaController@sashinUuzaa');
Route::get('/kanrisha/uuzaa/resetPasswordUser/{id}', 'UuzaaController@resetPassword');

Route::post('/uuzaa/search', 'UuzaaController@search');
Route::post('/heya/search', 'HeyaController@search');
Route::post('/alhuqulAlfareia/search', 'alhuqulAlfareiaController@search');
Route::post('/masuk/search', 'suratMasukCOntroller@search');
Route::post('/keluar/search', 'suratKeluarController@search');


Route::get('/admin/referensi/agama/deeta', 'ReferensiController@agama');
Route::post('/admin/referensi/agama', 'ReferensiController@agamaStore');
Route::get('/admin/referensi/agama/{url}', 'ReferensiController@agamaEdit');
Route::put('/admin/referensi/agama/{url}', 'ReferensiController@agamaUpdate');
Route::delete('/admin/referensi/agama/{url}', 'ReferensiController@agamaDestroy');

Route::get('/admin/referensi/unor/deeta', 'ReferensiController@unor');
Route::post('/admin/referensi/unor', 'ReferensiController@unorStore');
Route::get('/admin/referensi/unor/{url}', 'ReferensiController@unorEdit');
Route::put('/admin/referensi/unor/{url}', 'ReferensiController@unorUpdate');
Route::delete('/admin/referensi/unor/{url}', 'ReferensiController@unorDestroy');


Route::resources([
    'kanrisha/heya/deeta' => 'HeyaController',
    'kanrisha/uuzaa/deeta' => 'UuzaaController',
    'kanrisha/alhuqulAlfareia/deeta' => 'alhuqulAlfareiaController',
    'kanrisha/masuk/deeta' => 'suratMasukCOntroller',
    'kanrisha/keluar/deeta' => 'suratKeluarController',
    'kanrisha/dashboard/deeta' => 'DashboardController'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::any('{all}', function () {
        return view('template');
    })
        ->where(['all' => '.*']);
});
