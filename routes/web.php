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
Route::post('/admin/referensi/agama/search', 'ReferensiController@agamaSearch');

Route::get('/admin/referensi/unor/deeta', 'ReferensiController@unor');
Route::get('/admin/referensi/unor/create', 'ReferensiController@unorCreate');
Route::post('/admin/referensi/unor', 'ReferensiController@unorStore');
Route::get('/admin/referensi/unor/{url}', 'ReferensiController@unorEdit');
Route::put('/admin/referensi/unor/{url}', 'ReferensiController@unorUpdate');
Route::delete('/admin/referensi/unor/{url}', 'ReferensiController@unorDestroy');
Route::post('/admin/referensi/unor/search', 'ReferensiController@unorSearch');

Route::get('/admin/referensi/bidang/deeta', 'ReferensiController@bidang');
Route::get('/admin/referensi/bidang/create', 'ReferensiController@bidangCreate');
Route::post('/admin/referensi/bidang', 'ReferensiController@bidangStore');
Route::get('/admin/referensi/bidang/{url}', 'ReferensiController@bidangEdit');
Route::put('/admin/referensi/bidang/{url}', 'ReferensiController@bidangUpdate');
Route::delete('/admin/referensi/bidang/{url}', 'ReferensiController@bidangDestroy');
Route::post('/admin/referensi/bidang/search', 'ReferensiController@bidangSearch');

Route::get('/admin/referensi/subBidang/deeta', 'ReferensiController@subBidang');
Route::post('/admin/referensi/subBidang', 'ReferensiController@subBidangStore');
Route::get('/admin/referensi/subBidang/{url}', 'ReferensiController@subBidangEdit');
Route::put('/admin/referensi/subBidang/{url}', 'ReferensiController@subBidangUpdate');
Route::delete('/admin/referensi/subBidang/{url}', 'ReferensiController@subBidangDestroy');
Route::post('/admin/referensi/subBidang/search', 'ReferensiController@subBidangSearch');

Route::get('/admin/referensi/statusKepegawaian/deeta', 'ReferensiController@statusKepegawaian');
Route::post('/admin/referensi/statusKepegawaian', 'ReferensiController@statusKepegawaianStore');
Route::get('/admin/referensi/statusKepegawaian/{url}', 'ReferensiController@statusKepegawaianEdit');
Route::put('/admin/referensi/statusKepegawaian/{url}', 'ReferensiController@statusKepegawaianUpdate');
Route::delete('/admin/referensi/statusKepegawaian/{url}', 'ReferensiController@statusKepegawaianDestroy');
Route::post('/admin/referensi/statusKepegawaian/search', 'ReferensiController@statusKepegawaianSearch');

Route::get('/admin/referensi/jenisHukumanDisiplin/deeta', 'ReferensiController@jenisHukumanDisiplin');
Route::post('/admin/referensi/jenisHukumanDisiplin', 'ReferensiController@jenisHukumanDisiplinStore');
Route::get('/admin/referensi/jenisHukumanDisiplin/{url}', 'ReferensiController@jenisHukumanDisiplinEdit');
Route::put('/admin/referensi/jenisHukumanDisiplin/{url}', 'ReferensiController@jenisHukumanDisiplinUpdate');
Route::delete('/admin/referensi/jenisHukumanDisiplin/{url}', 'ReferensiController@jenisHukumanDisiplinDestroy');
Route::post('/admin/referensi/jenisHukumanDisiplin/search', 'ReferensiController@jenisHukumanDisiplinSearch');

Route::get('/admin/referensi/jenisKepegawaian/deeta', 'ReferensiController@jenisKepegawaian');
Route::post('/admin/referensi/jenisKepegawaian', 'ReferensiController@jenisKepegawaianStore');
Route::get('/admin/referensi/jenisKepegawaian/{url}', 'ReferensiController@jenisKepegawaianEdit');
Route::put('/admin/referensi/jenisKepegawaian/{url}', 'ReferensiController@jenisKepegawaianUpdate');
Route::delete('/admin/referensi/jenisKepegawaian/{url}', 'ReferensiController@jenisKepegawaianDestroy');
Route::post('/admin/referensi/jenisKepegawaian/search', 'ReferensiController@jenisKepegawaianSearch');

Route::get('/admin/referensi/jenisPenghargaan/deeta', 'ReferensiController@jenisPenghargaan');
Route::post('/admin/referensi/jenisPenghargaan', 'ReferensiController@jenisPenghargaanStore');
Route::get('/admin/referensi/jenisPenghargaan/{url}', 'ReferensiController@jenisPenghargaanEdit');
Route::put('/admin/referensi/jenisPenghargaan/{url}', 'ReferensiController@jenisPenghargaanUpdate');
Route::delete('/admin/referensi/jenisPenghargaan/{url}', 'ReferensiController@jenisPenghargaanDestroy');
Route::post('/admin/referensi/jenisPenghargaan/search', 'ReferensiController@jenisPenghargaanSearch');

Route::get('/admin/referensi/kedudukanKepegawaian/deeta', 'ReferensiController@kedudukanKepegawaian');
Route::post('/admin/referensi/kedudukanKepegawaian', 'ReferensiController@kedudukanKepegawaianStore');
Route::get('/admin/referensi/kedudukanKepegawaian/{url}', 'ReferensiController@kedudukanKepegawaianEdit');
Route::put('/admin/referensi/kedudukanKepegawaian/{url}', 'ReferensiController@kedudukanKepegawaianUpdate');
Route::delete('/admin/referensi/kedudukanKepegawaian/{url}', 'ReferensiController@kedudukanKepegawaianDestroy');
Route::post('/admin/referensi/kedudukanKepegawaian/search', 'ReferensiController@kedudukanKepegawaianSearch');


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
