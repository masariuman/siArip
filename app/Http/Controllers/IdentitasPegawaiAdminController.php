<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuzaa;
use App\Models\Heya;
use App\Models\ReferensiSubBidang;
use App\Models\Arsip;
use App\Models\ReferensiKategoriArsip;
use App\Models\IdentitasPegawai;
use App\Models\ReferensiAgama;
use Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;

class IdentitasPegawaiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->request->all();
        $identitasPegawai = IdentitasPegawai::where('rinku', $data['identitasId'])->first();
        $pegawai = Uuzaa::where('id', $identitasPegawai['pegawai_id'])->first();
        $agama = ReferensiAgama::where('rinku',$data['agamaUser'])->first();
        // dd($subbid);
        $identitasPegawai->update([
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon'],
            'handphone' => $data['handphone'],
            'emailDinas' => $data['emailDinas'],
            'emailPribadi' => $data['emailPribadi'],
            'nik' => $data['nik'],
            'nomorKK' => $data['nomorKK'],
            'agama_id' => $agama->id,
            'lokasiKerja' => $data['lokasiKerja'],
            'akta' => $data['akta'],
            'npwp' => $data['npwp'],
            'tanggalNpwp' => $data['tanggalNpwp'],
            'bpjs' => $data['bpjs'],
            'karis' => $data['karis'],
            'taspen' => $data['taspen'],
            'tanggalTaspen' => $data['tanggalTaspen'],
            'tapera' => $data['tapera'],
            'kppn' => $data['kppn'],
            'kelasJabatan' => $data['kelasJabatan']
        ]);
        $pegawai->update([
            'name' => $data['namaLengkap'],
            'gelarDepan' => $data['gelarDepan'],
            'gelarBelakang' => $data['gelarBelakang']
        ]);

        // $pagination = 5;
        // $data = Uuzaa::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        // $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        // foreach ($data as $items) {
        //     $items['nomor'] = $count;
        //     $count++;
        // }
        // $data['nomor'] = "BARU";
        // $data['subbidName'] = $data->ref_subbid->name;

        // $data['tanggalLahirText'] = date("d F Y", strtotime($data['tanggalLahir']));
        // $dateNow = getdate();
        // $tahunLahir = date("Y", strtotime($data['tanggalLahir']));
        // $bulanLahir = date("m", strtotime($data['tanggalLahir']));
        // $tahunNow = $dateNow['year'];
        // $bulanNow = $dateNow['mon'];
        // // dd($tahunNow - $tahunLahir);
        // $dateLahirr = date_create($tahunLahir . '-' . $bulanLahir . '-01');
        // $datenow = date_create($tahunNow . '-' . $bulanNow . '-01');
        // $interval = date_diff($dateLahirr, $datenow);
        // $data['usia'] = $interval->y." Tahun ".$interval->m." Bulan";

        // if ($data['reberu'] === "3") {
        //     $data['level'] = "User";
        // } else if ($itdataems['reberu'] === "2") {
        //     $data['level'] = "Administrator";
        // } else if ($data['reberu'] === "1") {
        //     $data['level'] = "Super Admin";
        // } else {
        //     $data['level'] = "Legendary Admin";
        // }
        return response()->json([
            'data' => $pegawai
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
