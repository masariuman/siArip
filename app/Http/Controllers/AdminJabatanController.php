<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuzaa;
use App\Models\Jabatan;
use App\Models\ReferensiJenisJabatan;
use App\Models\ReferensiSubBidang;
use App\Models\ReferensiBidang;
use App\Models\ReferensiUnor;
use Uuid;
use Illuminate\Support\Facades\Hash;

class AdminJabatanController extends Controller
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
        //
        $data = $request->request->all();
        // dd($request);
        $pegawai = Uuzaa::where('rinku', $data['pegawai_id'])->first();
        // dd($pegawai->id);
        $jenisJabatan_id = ReferensiJenisJabatan::where('rinku', $data['jenisJabatan_id'])->first();
        $subbid_id = ReferensiSubBidang::where('rinku', $data['subbid_id'])->first();
        if ($data['jabatan']===null || $data['jabatan']==='null' || $data['jabatan']==='undefined') {
            // dd('asd');
            $data['jabatan']="";
        }
        if ($data['tmtJabatan']===null || $data['tmtJabatan']==='null' || $data['tmtJabatan']==='undefined') {
            // dd('asd');
            $data['tmtJabatan']=date('Y-m-d', time());
        }
        if ($data['tmtPelantikan']===null || $data['tmtPelantikan']==='null' || $data['tmtPelantikan']==='undefined') {
            // dd('asd');
            $data['tmtPelantikan']=date('Y-m-d', time());
        }
        if ($data['nomorSk']===null || $data['nomorSk']==='null' || $data['nomorSk']==='undefined') {
            // dd('asd');
            $data['nomorSk']="";
        }
        if ($data['tanggalSk']===null || $data['tanggalSk']==='null' || $data['tanggalSk']==='undefined') {
            // dd('asd');
            $data['tanggalSk']=date('Y-m-d', time());
        }
            Jabatan::create([
                'pegawai_id' => $pegawai->id,
                'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string))))),
                'jenisJabatan_id' => $jenisJabatan_id->id,
                'subbid_id' => $subbid_id->id,
                'jabatan' => $data['jabatan'],
                'tmtJabatan' => $data['tmtJabatan'],
                'tmtPelantikan' => $data['tmtPelantikan'],
                'nomorSk' => $data['nomorSk'],
                'tanggalSk' => $data['tanggalSk']
            ]);
        $data['data'] = Jabatan::orderBy("id", "DESC")->first();
        $data['data']['nomor'] = "BARU";
        $data['data']['subbidText'] =$data['data']->subbid->name;
        $subbid = ReferensiSubBidang::where('id',$data['data']->subbid->id)->first();
        $bidang = ReferensiBidang::where('id',$subbid->ref_bidang->id)->first();
        $data['data']['unorText'] =ReferensiUnor::where('id',$bidang->ref_unor->id)->first();
        $data['data']['jenisJabatanText'] = $data['data']->jenisJabatan->name;
        return response()->json([
            'data' => $data
        ]);
    }

    public function apdet(Request $request)
    {
        //
        $data = $request->request->all();
        // dd($request);
        $jabatan = Jabatan::where('rinku',$data['url'])->first();
        $pegawai = Uuzaa::where('id', $jabatan['pegawai_id'])->first();
        $jenisJabatan_id = ReferensiJenisJabatan::where('rinku', $data['jenisJabatan_id'])->first();
        $subbid_id = ReferensiSubBidang::where('rinku', $data['subbid_id'])->first();
        if ($data['jabatan']===null || $data['jabatan']==='null' || $data['jabatan']==='undefined') {
            // dd('asd');
            $data['jabatan']="";
        }
        if ($data['tmtJabatan']===null || $data['tmtJabatan']==='null' || $data['tmtJabatan']==='undefined') {
            // dd('asd');
            $data['tmtJabatan']=date('Y-m-d', time());
        }
        if ($data['tmtPelantikan']===null || $data['tmtPelantikan']==='null' || $data['tmtPelantikan']==='undefined') {
            // dd('asd');
            $data['tmtPelantikan']=date('Y-m-d', time());
        }
        if ($data['nomorSk']===null || $data['nomorSk']==='null' || $data['nomorSk']==='undefined') {
            // dd('asd');
            $data['nomorSk']="";
        }
        if ($data['tanggalSk']===null || $data['tanggalSk']==='null' || $data['tanggalSk']==='undefined') {
            // dd('asd');
            $data['tanggalSk']=date('Y-m-d', time());
        }
            $jabatan->update([
                'jenisJabatan_id' => $jenisJabatan_id->id,
                'subbid_id' => $subbid_id->id,
                'jabatan' => $data['jabatan'],
                'tmtJabatan' => $data['tmtJabatan'],
                'tmtPelantikan' => $data['tmtPelantikan'],
                'nomorSk' => $data['nomorSk'],
                'tanggalSk' => $data['tanggalSk']
            ]);
        $pagination = 5;
        $data['jabatan'] = Jabatan::where('pegawai_id',$pegawai['id'])->whereIn('sutattsu',['1', '2'])->orderBy("id", "ASC")->paginate($pagination);
        $count = $data['jabatan']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['jabatan'] as $items) {
            $items['nomor'] = $count;
            $items['subbidText'] =$items->subbid->name;
            $subbid = ReferensiSubBidang::where('id',$items->subbid->id)->first();
            $bidang = ReferensiBidang::where('id',$subbid->ref_bidang->id)->first();
            $items['unorText'] =ReferensiUnor::where('id',$bidang->ref_unor->id)->first();
            $items['jenisJabatanText'] = $items->jenisJabatan->name;
            $count++;
        }
        return response()->json([
            'data' => $data
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
        $pagination = 5;
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
        $data['jabatan'] = Jabatan::where('pegawai_id',$data['pegawai']['id'])->whereIn('sutattsu',['1', '2'])->orderBy("id", "ASC")->paginate($pagination);
        $count = $data['jabatan']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['jabatan'] as $items) {
            $items['nomor'] = $count;
            $items['subbidText'] =$items->subbid->name;
            $subbid = ReferensiSubBidang::where('id',$items->subbid->id)->first();
            $bidang = ReferensiBidang::where('id',$subbid->ref_bidang->id)->first();
            $items['unorText'] =ReferensiUnor::where('id',$bidang->ref_unor->id)->first();
            $items['jenisJabatanText'] = $items->jenisJabatan->name;
            $count++;
        }

        // $data['heyaRinku'] = $data->heya->rinku;
        return response()->json([
            'data' => $data
        ]);
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
        $data['jabatan'] = Jabatan::where('rinku',$id)->first();
        // dd($data);
        // $data['golongan'] = ReferensiPangkatGolonganRuang::where('id',$data['pangkat']['pangkat_id'])->first();
        // $data['jenisNaikPangkat'] = ReferensiJenisNaikPangkat::where('id',$data['pangkat']['jenisNaikPangkat_id'])->first();

        $data['subbidName'] =$data['jabatan']->subbid->rinku;
        $subbid = ReferensiSubBidang::where('id',$data['jabatan']->subbid->id)->first();
        $bidang = ReferensiBidang::where('id',$subbid->ref_bidang->id)->first();
        $data['bidangName'] =$bidang->rinku;
        $unor = ReferensiUnor::where('id',$bidang->ref_unor->id)->first();
        $data['unorName'] =$unor->rinku;
        $data['bidang'] =ReferensiBidang::where('refUnor_id',$unor->id)->where('sutattsu','1')->get();
        $data['subbid'] =ReferensiSubBidang::where('refBidang_id',$bidang->id)->where('sutattsu','1')->get();
        $data['jenisJabatan_id'] = $data['jabatan']->jenisJabatan->rinku;
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
        $jabatan = Jabatan::where('rinku',$id)->first();
        $pegawai = Uuzaa::where('id', $jabatan['pegawai_id'])->first();
            $jabatan->update([
                'sutattsu' => '0'
            ]);
        $pagination = 5;
        $data['jabatan'] = Jabatan::where('pegawai_id',$pegawai['id'])->whereIn('sutattsu',['1', '2'])->orderBy("id", "ASC")->paginate($pagination);
        $count = $data['jabatan']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['jabatan'] as $items) {
            $items['nomor'] = $count;
            $items['subbidText'] =$items->subbid->name;
            $subbid = ReferensiSubBidang::where('id',$items->subbid->id)->first();
            $bidang = ReferensiBidang::where('id',$subbid->ref_bidang->id)->first();
            $items['unorText'] =ReferensiUnor::where('id',$bidang->ref_unor->id)->first();
            $items['jenisJabatanText'] = $items->jenisJabatan->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }

    public function aktif($id)
    {
        //
        $jabatan = Jabatan::where('sutattsu','2')->get();
        foreach ($jabatan as $key => $value) {
            $value->update([
                'sutattsu' => '1'
            ]);
        }
        $jabatan = Jabatan::where('rinku',$id)->first();
        $pegawai = Uuzaa::where('id', $jabatan['pegawai_id'])->first();
            $jabatan->update([
                'sutattsu' => '2'
            ]);
        $pagination = 5;
        $data['jabatan'] = Jabatan::where('pegawai_id',$pegawai['id'])->whereIn('sutattsu',['1', '2'])->orderBy("id", "ASC")->paginate($pagination);
        $count = $data['jabatan']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['jabatan'] as $items) {
            $items['nomor'] = $count;
            $items['subbidText'] =$items->subbid->name;
            $subbid = ReferensiSubBidang::where('id',$items->subbid->id)->first();
            $bidang = ReferensiBidang::where('id',$subbid->ref_bidang->id)->first();
            $items['unorText'] =ReferensiUnor::where('id',$bidang->ref_unor->id)->first();
            $items['jenisJabatanText'] = $items->jenisJabatan->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
}
