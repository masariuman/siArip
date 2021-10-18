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
Route::get('/admin/referensi/agama/create', 'ReferensiController@agamaCreate');
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
Route::get('/admin/referensi/unorBidang', 'ReferensiController@unorBidang');
Route::get('/admin/referensi/unorBidang/{url}', 'ReferensiController@unorBidangOnChange');
Route::get('/admin/referensi/bidangSubbid/{url}', 'ReferensiController@bidangSubbidOnChange');

Route::get('/admin/referensi/subBidang/deeta', 'ReferensiController@subBidang');
Route::post('/admin/referensi/subBidang', 'ReferensiController@subBidangStore');
Route::get('/admin/referensi/subBidang/{url}', 'ReferensiController@subBidangEdit');
Route::put('/admin/referensi/subBidang/{url}', 'ReferensiController@subBidangUpdate');
Route::delete('/admin/referensi/subBidang/{url}', 'ReferensiController@subBidangDestroy');
Route::post('/admin/referensi/subBidang/search', 'ReferensiController@subBidangSearch');

Route::get('/admin/referensi/statusKepegawaian/deeta', 'ReferensiController@statusKepegawaian');
Route::get('/admin/referensi/statusKepegawaian/create', 'ReferensiController@statusKepegawaianCreate');
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

Route::get('/admin/referensi/pangkatGolonganRuang/deeta', 'ReferensiController@pangkatGolonganRuang');
Route::get('/admin/referensi/pangkatGolonganRuang/create', 'ReferensiController@pangkatGolonganRuangCreate');
Route::post('/admin/referensi/pangkatGolonganRuang', 'ReferensiController@pangkatGolonganRuangStore');
Route::get('/admin/referensi/pangkatGolonganRuang/{url}', 'ReferensiController@pangkatGolonganRuangEdit');
Route::put('/admin/referensi/pangkatGolonganRuang/{url}', 'ReferensiController@pangkatGolonganRuangUpdate');
Route::delete('/admin/referensi/pangkatGolonganRuang/{url}', 'ReferensiController@pangkatGolonganRuangDestroy');
Route::post('/admin/referensi/pangkatGolonganRuang/search', 'ReferensiController@pangkatGolonganRuangSearch');

Route::get('/admin/referensi/stlud/deeta', 'ReferensiController@stlud');
Route::post('/admin/referensi/stlud', 'ReferensiController@stludStore');
Route::get('/admin/referensi/stlud/{url}', 'ReferensiController@stludEdit');
Route::put('/admin/referensi/stlud/{url}', 'ReferensiController@stludUpdate');
Route::delete('/admin/referensi/stlud/{url}', 'ReferensiController@stludDestroy');
Route::post('/admin/referensi/stlud/search', 'ReferensiController@stludSearch');

Route::get('/admin/referensi/jenisNaikPangkat/deeta', 'ReferensiController@jenisNaikPangkat');
Route::get('/admin/referensi/jenisNaikPangkat/create', 'ReferensiController@jenisNaikPangkatCreate');
Route::post('/admin/referensi/jenisNaikPangkat', 'ReferensiController@jenisNaikPangkatStore');
Route::get('/admin/referensi/jenisNaikPangkat/{url}', 'ReferensiController@jenisNaikPangkatEdit');
Route::put('/admin/referensi/jenisNaikPangkat/{url}', 'ReferensiController@jenisNaikPangkatUpdate');
Route::delete('/admin/referensi/jenisNaikPangkat/{url}', 'ReferensiController@jenisNaikPangkatDestroy');
Route::post('/admin/referensi/jenisNaikPangkat/search', 'ReferensiController@jenisNaikPangkatSearch');

Route::get('/admin/referensi/tingkatPendidikan/deeta', 'ReferensiController@tingkatPendidikan');
Route::post('/admin/referensi/tingkatPendidikan', 'ReferensiController@tingkatPendidikanStore');
Route::get('/admin/referensi/tingkatPendidikan/{url}', 'ReferensiController@tingkatPendidikanEdit');
Route::put('/admin/referensi/tingkatPendidikan/{url}', 'ReferensiController@tingkatPendidikanUpdate');
Route::delete('/admin/referensi/tingkatPendidikan/{url}', 'ReferensiController@tingkatPendidikanDestroy');
Route::post('/admin/referensi/tingkatPendidikan/search', 'ReferensiController@tingkatPendidikanSearch');

Route::get('/admin/referensi/jurusanPendidikan/deeta', 'ReferensiController@jurusanPendidikan');
Route::post('/admin/referensi/jurusanPendidikan', 'ReferensiController@jurusanPendidikanStore');
Route::get('/admin/referensi/jurusanPendidikan/{url}', 'ReferensiController@jurusanPendidikanEdit');
Route::put('/admin/referensi/jurusanPendidikan/{url}', 'ReferensiController@jurusanPendidikanUpdate');
Route::delete('/admin/referensi/jurusanPendidikan/{url}', 'ReferensiController@jurusanPendidikanDestroy');
Route::post('/admin/referensi/jurusanPendidikan/search', 'ReferensiController@jurusanPendidikanSearch');

Route::get('/admin/referensi/diklatStruktural/deeta', 'ReferensiController@diklatStruktural');
Route::post('/admin/referensi/diklatStruktural', 'ReferensiController@diklatStrukturalStore');
Route::get('/admin/referensi/diklatStruktural/{url}', 'ReferensiController@diklatStrukturalEdit');
Route::put('/admin/referensi/diklatStruktural/{url}', 'ReferensiController@diklatStrukturalUpdate');
Route::delete('/admin/referensi/diklatStruktural/{url}', 'ReferensiController@diklatStrukturalDestroy');
Route::post('/admin/referensi/diklatStruktural/search', 'ReferensiController@diklatStrukturalSearch');

Route::get('/admin/referensi/diklatTeknis/deeta', 'ReferensiController@diklatTeknis');
Route::post('/admin/referensi/diklatTeknis', 'ReferensiController@diklatTeknisStore');
Route::get('/admin/referensi/diklatTeknis/{url}', 'ReferensiController@diklatTeknisEdit');
Route::put('/admin/referensi/diklatTeknis/{url}', 'ReferensiController@diklatTeknisUpdate');
Route::delete('/admin/referensi/diklatTeknis/{url}', 'ReferensiController@diklatTeknisDestroy');
Route::post('/admin/referensi/diklatTeknis/search', 'ReferensiController@diklatTeknisSearch');

Route::get('/admin/referensi/jabatanFungsionalUmum/deeta', 'ReferensiController@jabatanFungsionalUmum');
Route::post('/admin/referensi/jabatanFungsionalUmum', 'ReferensiController@jabatanFungsionalUmumStore');
Route::get('/admin/referensi/jabatanFungsionalUmum/{url}', 'ReferensiController@jabatanFungsionalUmumEdit');
Route::put('/admin/referensi/jabatanFungsionalUmum/{url}', 'ReferensiController@jabatanFungsionalUmumUpdate');
Route::delete('/admin/referensi/jabatanFungsionalUmum/{url}', 'ReferensiController@jabatanFungsionalUmumDestroy');
Route::post('/admin/referensi/jabatanFungsionalUmum/search', 'ReferensiController@jabatanFungsionalUmumSearch');

Route::get('/admin/referensi/jabatanFungsionalTertentu/deeta', 'ReferensiController@jabatanFungsionalTertentu');
Route::post('/admin/referensi/jabatanFungsionalTertentu', 'ReferensiController@jabatanFungsionalTertentuStore');
Route::get('/admin/referensi/jabatanFungsionalTertentu/{url}', 'ReferensiController@jabatanFungsionalTertentuEdit');
Route::put('/admin/referensi/jabatanFungsionalTertentu/{url}', 'ReferensiController@jabatanFungsionalTertentuUpdate');
Route::delete('/admin/referensi/jabatanFungsionalTertentu/{url}', 'ReferensiController@jabatanFungsionalTertentuDestroy');
Route::post('/admin/referensi/jabatanFungsionalTertentu/search', 'ReferensiController@jabatanFungsionalTertentuSearch');

Route::get('/admin/referensi/jabatanKORPRI/deeta', 'ReferensiController@jabatanKORPRI');
Route::post('/admin/referensi/jabatanKORPRI', 'ReferensiController@jabatanKORPRIStore');
Route::get('/admin/referensi/jabatanKORPRI/{url}', 'ReferensiController@jabatanKORPRIEdit');
Route::put('/admin/referensi/jabatanKORPRI/{url}', 'ReferensiController@jabatanKORPRIUpdate');
Route::delete('/admin/referensi/jabatanKORPRI/{url}', 'ReferensiController@jabatanKORPRIDestroy');
Route::post('/admin/referensi/jabatanKORPRI/search', 'ReferensiController@jabatanKORPRISearch');

Route::get('/admin/referensi/eselonJabatan/deeta', 'ReferensiController@eselonJabatan');
Route::post('/admin/referensi/eselonJabatan', 'ReferensiController@eselonJabatanStore');
Route::get('/admin/referensi/eselonJabatan/{url}', 'ReferensiController@eselonJabatanEdit');
Route::put('/admin/referensi/eselonJabatan/{url}', 'ReferensiController@eselonJabatanUpdate');
Route::delete('/admin/referensi/eselonJabatan/{url}', 'ReferensiController@eselonJabatanDestroy');
Route::post('/admin/referensi/eselonJabatan/search', 'ReferensiController@eselonJabatanSearch');

Route::get('/admin/referensi/diklatFungsional/deeta', 'ReferensiController@diklatFungsional');
Route::post('/admin/referensi/diklatFungsional', 'ReferensiController@diklatFungsionalStore');
Route::get('/admin/referensi/diklatFungsional/{url}', 'ReferensiController@diklatFungsionalEdit');
Route::put('/admin/referensi/diklatFungsional/{url}', 'ReferensiController@diklatFungsionalUpdate');
Route::delete('/admin/referensi/diklatFungsional/{url}', 'ReferensiController@diklatFungsionalDestroy');
Route::post('/admin/referensi/diklatFungsional/search', 'ReferensiController@diklatFungsionalSearch');

Route::get('/admin/referensi/jenisJabatan/deeta', 'ReferensiController@jenisJabatan');
Route::post('/admin/referensi/jenisJabatan', 'ReferensiController@jenisJabatanStore');
Route::get('/admin/referensi/jenisJabatan/{url}', 'ReferensiController@jenisJabatanEdit');
Route::put('/admin/referensi/jenisJabatan/{url}', 'ReferensiController@jenisJabatanUpdate');
Route::delete('/admin/referensi/jenisJabatan/{url}', 'ReferensiController@jenisJabatanDestroy');
Route::post('/admin/referensi/jenisJabatan/search', 'ReferensiController@jenisJabatanSearch');

Route::get('/admin/referensi/pejabatPenetap/deeta', 'ReferensiController@pejabatPenetap');
Route::post('/admin/referensi/pejabatPenetap', 'ReferensiController@pejabatPenetapStore');
Route::get('/admin/referensi/pejabatPenetap/{url}', 'ReferensiController@pejabatPenetapEdit');
Route::put('/admin/referensi/pejabatPenetap/{url}', 'ReferensiController@pejabatPenetapUpdate');
Route::delete('/admin/referensi/pejabatPenetap/{url}', 'ReferensiController@pejabatPenetapDestroy');
Route::post('/admin/referensi/pejabatPenetap/search', 'ReferensiController@pejabatPenetapSearch');

Route::get('/admin/referensi/pejabatNegara/deeta', 'ReferensiController@pejabatNegara');
Route::post('/admin/referensi/pejabatNegara', 'ReferensiController@pejabatNegaraStore');
Route::get('/admin/referensi/pejabatNegara/{url}', 'ReferensiController@pejabatNegaraEdit');
Route::put('/admin/referensi/pejabatNegara/{url}', 'ReferensiController@pejabatNegaraUpdate');
Route::delete('/admin/referensi/pejabatNegara/{url}', 'ReferensiController@pejabatNegaraDestroy');
Route::post('/admin/referensi/pejabatNegara/search', 'ReferensiController@pejabatNegaraSearch');

Route::get('/admin/referensi/kategoriArsip/deeta', 'ReferensiController@kategoriArsip');
Route::get('/admin/referensi/kategoriArsip/create', 'ReferensiController@kategoriArsipCreate');
Route::post('/admin/referensi/kategoriArsip', 'ReferensiController@kategoriArsipStore');
Route::get('/admin/referensi/kategoriArsip/{url}', 'ReferensiController@kategoriArsipEdit');
Route::put('/admin/referensi/kategoriArsip/{url}', 'ReferensiController@kategoriArsipUpdate');
Route::delete('/admin/referensi/kategoriArsip/{url}', 'ReferensiController@kategoriArsipDestroy');
Route::post('/admin/referensi/kategoriArsip/search', 'ReferensiController@kategoriArsipSearch');

Route::post('/admin/pegawai/arsip', 'UuzaaController@arsipPegawai');
// Route::post('/admin/pegawai/arsip/search', 'UuzaaController@arsipPegawaiSearch');
Route::get('/admin/pegawai/arsip/{url}/edit', 'UuzaaController@arsipPegawaiEdit');
Route::post('/admin/pegawai/arsip/update', 'UuzaaController@arsipPegawaiUpdate');
Route::post('/admin/pegawai/arsip/search', 'UuzaaController@arsipPegawaiArsipSearch');
Route::delete('/admin/pegawai/arsip/{url}', 'UuzaaController@arsipPegawaiArsipDelete');

Route::post('/admin/pegawai/pangkat', 'AdminPangkatController@store');
Route::get('/admin/pegawai/pangkat/{url}', 'AdminPangkatController@show');
Route::post('/admin/pegawai/pangkat/search', 'AdminPangkatController@search');
Route::get('/admin/pegawai/pangkat/{url}/edit', 'AdminPangkatController@edit');
Route::post('/admin/pegawai/pangkat/update', 'AdminPangkatController@apdet');
Route::delete('/admin/pegawai/pangkat/{url}', 'AdminPangkatController@destroy');
Route::post('/admin/pegawai/pangkat/aktif/{url}', 'AdminPangkatController@aktif');


Route::post('/admin/pegawai/jabatan', 'AdminJabatanController@store');
Route::get('/admin/pegawai/jabatan/{url}', 'AdminJabatanController@show');
Route::post('/admin/pegawai/jabatan/search', 'AdminJabatanController@search');
Route::get('/admin/pegawai/jabatan/{url}/edit', 'AdminJabatanController@edit');
Route::post('/admin/pegawai/jabatan/update', 'AdminJabatanController@apdet');
Route::delete('/admin/pegawai/jabatan/{url}', 'AdminJabatanController@destroy');
Route::post('/admin/pegawai/jabatan/aktif/{url}', 'AdminJabatanController@aktif');

// Route::post('/pegawai/arsip', 'UuzaaController@arsipPegawai');
// Route::post('/pegawai/search', 'UuzaaController@arsipPegawaiSearch');
// Route::get('/pegawai/arsip/{url}/edit', 'UuzaaController@arsipPegawaiEdit');
Route::post('/pegawai/arsip/update', 'ArsipController@apdet');
Route::post('/pegawai/arsip/search', 'ArsipController@search');
// Route::delete('/pegawai/arsip/{url}', 'UuzaaController@arsipPegawaiArsipDelete');

Route::get('/admin/pegawai/{url}/pns/deeta', 'CPNSPNSAdminController@index');
Route::post('/admin/pegawai/pns/update', 'CPNSPNSAdminController@store');
// Route::post('/admin/pegawai/arsip/search', 'UuzaaController@arsipPegawaiSearch');
// Route::get('/admin/pegawai/arsip/{url}/edit', 'UuzaaController@arsipPegawaiEdit');
// Route::post('/admin/pegawai/arsip/update', 'UuzaaController@arsipPegawaiUpdate');
// Route::post('/admin/pegawai/arsip/search', 'UuzaaController@arsipPegawaiArsipSearch');
// Route::delete('/admin/pegawai/arsip/{url}', 'UuzaaController@arsipPegawaiArsipDelete');

Route::post('/pengajuan/arsip/search', 'PengajuanController@search');

Route::post('/admin/pengajuan/terima', 'PengajuanAdminController@terima');
Route::post('/admin/pengajuan/tolak', 'PengajuanAdminController@tolak');
Route::post('/admin/pengajuan/search', 'PengajuanAdminController@search');

Route::post('/admin/pegawai/detail/update', 'IdentitasPegawaiAdminController@store');

Route::post('/admin/pegawai/search', 'UuzaaController@pegawaiSearch');

Route::post('/identitasPegawai/deeta/update', 'IdentitasPegawaiController@store');

Route::get('/identitasPegawai/pns', 'IdentitasPegawaiController@pns');


Route::resources([
    'kanrisha/heya/deeta' => 'HeyaController',
    'admin/pegawai' => 'UuzaaController',
    'admin/pengajuan' => 'PengajuanAdminController',
    'pegawai/arsip' => 'ArsipController',
    'pengajuan/arsip' => 'PengajuanController',
    'identitasPegawai/deeta' => 'IdentitasPegawaiController',
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
