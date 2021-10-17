<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuzaa;
use App\Models\IdentitasPegawai;
use App\Models\ReferensiAgama;
use App\Models\CPNSPNS;
use Illuminate\Support\Facades\Auth;

class IdentitasPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pegawai'] = Auth::user();
        if ($data['pegawai']['gelarDepan'] === null || $data['pegawai']['gelarDepan'] === "") {
            $data['pegawai']['gelarDepan'] = "";
        } else {
            $data['pegawai']['gelarDepan'] = $data['pegawai']['gelarDepan'] . ". ";
        }
        if ($data['pegawai']['gelarBelakang'] === null || $data['pegawai']['gelarBelakang'] === "") {
            $data['pegawai']['gelarBelakang'] = "";
        } else {
            $data['pegawai']['gelarBelakang'] = ", " . $data['pegawai']['gelarBelakang'];
        }
        $data['identitasPegawai'] = IdentitasPegawai::where('pegawai_id', $data['pegawai']['id'])->first();
        if ($data['identitasPegawai'] != null) {
            if ($data['identitasPegawai']['agama'] === null || $data['identitasPegawai']['agama'] === "") {
                $data['identitasPegawai']['agamaUser'] = "";
            } else {
                $data['identitasPegawai']['agamaUser'] = $data['identitasPegawai']->agama->name;
            }
        }

        // $data['heyaRinku'] = $data->heya->rinku;
        return response()->json([
            'data' => $data
        ]);
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
        if ($data['alamat']===null) {
            $data['alamat']="";
        }
        if ($data['telepon']===null) {
            $data['telepon']="";
        }
        if ($data['handphone']===null) {
            $data['handphone']="";
        }
        if ($data['emailDinas']===null) {
            $data['emailDinas']="";
        }
        if ($data['emailPribadi']===null) {
            $data['emailPribadi']="";
        }
        if ($data['nik']===null) {
            $data['nik']="";
        }
        if ($data['nomorKK']===null) {
            $data['nomorKK']="";
        }
        if ($data['lokasiKerja']===null) {
            $data['lokasiKerja']="";
        }
        if ($data['akta']===null) {
            $data['akta']="";
        }
        if ($data['npwp']===null) {
            $data['npwp']="";
        }
        if ($data['kelasJabatan']===null) {
            $data['kelasJabatan']="";
        }
        if ($data['bpjs']===null) {
            $data['bpjs']="";
        }
        if ($data['karis']===null) {
            $data['karis']="";
        }
        if ($data['taspen']===null) {
            $data['taspen']="";
        }
        if ($data['tapera']===null) {
            $data['tapera']="";
        }
        if ($data['kppn']===null) {
            $data['kppn']="";
        }
        if ($data['namaLengkap']===null) {
            $data['namaLengkap']="";
        }
        if ($data['gelarDepan']===null) {
            $data['gelarDepan']="";
        }
        if ($data['gelarBelakang']===null) {
            $data['gelarBelakang']="";
        }

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
        $pagination = 5;
        $data['identitasPegawai'] = IdentitasPegawai::where('rinku', $id)->first();
        $data['pegawai'] = Uuzaa::where('id', $data['identitasPegawai']['pegawai_id'])->first();
        // dd($data);
        if ($data['pegawai']['gelarDepan'] === null || $data['pegawai']['gelarDepan'] === "") {
            $data['pegawai']['gelarDepanText'] = "";
        } else {
            $data['pegawai']['gelarDepanText'] = $data['pegawai']['gelarDepan'] . ". ";
        }
        if ($data['pegawai']['gelarBelakang'] === null || $data['pegawai']['gelarBelakang'] === "") {
            $data['pegawai']['gelarBelakangText'] = "";
        } else {
            $data['pegawai']['gelarBelakangText'] = ", " . $data['pegawai']['gelarBelakang'];
        }
        // $data['identitasPegawai'] = IdentitasPegawai::where('pegawai_id', $data['pegawai']['id'])->first();
        if ($data['identitasPegawai']['agama'] === null || $data['identitasPegawai']['agama'] === "") {
            $data['identitasPegawai']['agamaUser'] = "";
        } else {
            $data['identitasPegawai']['agamaUser'] = $data['identitasPegawai']->agama->rinku;
        }
        // $data['heyaRinku'] = $data->heya->rinku;
        return response()->json([
            'data' => $data
        ]);
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

    public function pns()
    {
        $data['pegawai'] = Auth::user();
        if ($data['pegawai']['gelarDepan'] === null || $data['pegawai']['gelarDepan'] === "") {
            $data['pegawai']['gelarDepan'] = "";
        } else {
            $data['pegawai']['gelarDepan'] = $data['pegawai']['gelarDepan'] . ". ";
        }
        if ($data['pegawai']['gelarBelakang'] === null || $data['pegawai']['gelarBelakang'] === "") {
            $data['pegawai']['gelarBelakang'] = "";
        } else {
            $data['pegawai']['gelarBelakang'] = ", " . $data['pegawai']['gelarBelakang'];
        }
        $data['cpnspns'] = CPNSPNS::where('pegawai_id', $data['pegawai']['id'])->first();
        if ($data['cpnspns'] != null) {
            if ($data['cpnspns']['statusKepegawaian_id'] === null || $data['cpnspns']['statusKepegawaian_id'] === "") {
                $data['cpnspns']['statusKepegawaianText'] = "";
                $data['cpnspns']['statusKepegawaianrinku'] = "";
            } else {
                $data['cpnspns']['statusKepegawaianText'] = $data['cpnspns']->statusKepegawaian->name;
                $data['cpnspns']['statusKepegawaianrinku'] = $data['cpnspns']->statusKepegawaian->rinku;
            }
        }



        // $data['heyaRinku'] = $data->heya->rinku;
        return response()->json([
            'data' => $data
        ]);
    }
}
