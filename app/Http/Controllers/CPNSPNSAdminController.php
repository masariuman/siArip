<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuzaa;
use Illuminate\Support\Facades\Auth;
use App\Models\ReferensiStatusKepegawaian;
use App\Models\CPNSPNS;

class CPNSPNSAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // dd($id);
        $data['pegawai'] = Uuzaa::where('rinku', $id)->first();
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
        //
        $data = $request->request->all();
        $cpns = CPNSPNS::where('rinku', $data['url'])->first();
        $pegawai = Uuzaa::where('id', $cpns['pegawai_id'])->first();
        $statusKepegawaian = ReferensiStatusKepegawaian::where('rinku',$data['statusKepegawaianText'])->first();
        if ($data['skCpns']===null) {
            $data['skCpns']="";
        }
        if ($data['tanggalSkCpns']===null) {
            $data['tanggalSkCpns']="";
        }
        if ($data['tanggalSkCpns']===null) {
            $data['tanggalSkCpns']="";
        }
        if ($data['tmtCpns']===null) {
            $data['tmtCpns']="";
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
