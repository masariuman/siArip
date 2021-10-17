<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuzaa;
use App\Models\Pangkat;
use App\Models\ReferensiPangkatGolonganRuang;
use App\Models\ReferensiJenisNaikPangkat;
use Uuid;
use Illuminate\Support\Facades\Hash;

class AdminPangkatController extends Controller
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
        // dd($request);
        $pegawai = Uuzaa::where('rinku', $data['pegawai_id'])->first();
        $golongan = ReferensiPangkatGolonganRuang::where('rinku', $data['pangkat_id'])->first();
        $jenisNaikPangkat = ReferensiJenisNaikPangkat::where('rinku', $data['jenisNaikPangkat_id'])->first();
        if ($data['masaKerjaGolonganTahun']===null || $data['masaKerjaGolonganTahun']==='null' || $data['masaKerjaGolonganTahun']==='undefined') {
            // dd('asd');
            $data['masaKerjaGolonganTahun']="";
        }
        if ($data['masaKerjaGolonganBulan']===null || $data['masaKerjaGolonganBulan']==='null' || $data['masaKerjaGolonganBulan']==='undefined') {
            // dd('asd');
            $data['masaKerjaGolonganBulan']="";
        }
        if ($data['tmtGolongan']===null || $data['tmtGolongan']==='null' || $data['tmtGolongan']==='undefined') {
            // dd('asd');
            $data['tmtGolongan']=date('Y-m-d', time());
        }
        if ($data['nomorSk']===null || $data['nomorSk']==='null' || $data['nomorSk']==='undefined') {
            // dd('asd');
            $data['nomorSk']="";
        }
        if ($data['tanggalSk']===null || $data['tanggalSk']==='null' || $data['tanggalSk']==='undefined') {
            // dd('asd');
            $data['tanggalSk']=date('Y-m-d', time());
        }
        if ($data['nomorPertek']===null || $data['nomorPertek']==='null' || $data['nomorPertek']==='undefined') {
            // dd('asd');
            $data['nomorPertek']="";
        }
        if ($data['tanggalPertek']===null || $data['tanggalPertek']==='null' || $data['tanggalPertek']==='undefined') {
            // dd('asd');
            $data['tanggalPertek']=date('Y-m-d', time());
        }
            Pangkat::create([
                'pegawai_id' => $pegawai->id,
                'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string))))),
                'pangkat_id' => $golongan->id,
                'jenisNaikPangkat_id' => $jenisNaikPangkat->id,
                'masaKerjaGolonganTahun' => $data['masaKerjaGolonganTahun'],
                'masaKerjaGolonganBulan' => $data['masaKerjaGolonganBulan'],
                'tmtGolongan' => $data['tmtGolongan'],
                'nomorSk' => $data['nomorSk'],
                'tanggalSk' => $data['tanggalSk'],
                'nomorPertek' => $data['nomorPertek'],
                'tanggalPertek' => $data['tanggalPertek']
            ]);
        $data['data'] = Pangkat::orderBy("id", "DESC")->first();
        $data['data']['nomor'] = "BARU";
        $data['data']['golongan'] =$data['data']->pangkat->name;
        $data['data']['golongan2'] =" ( " . $data['data']->pangkat->pangkat . " ) ";
        $data['data']['jenisNaikPangkat'] = $data['data']->jenisNaikPangkat->name;
        return response()->json([
            'data' => $data
        ]);
    }

    public function apdet(Request $request)
    {
        //
        $data = $request->request->all();
        // dd($request);
        $pangkat = Pangkat::where('rinku',$data['url'])->first();
        $pegawai = Uuzaa::where('id', $pangkat['pegawai_id'])->first();
        $golongan = ReferensiPangkatGolonganRuang::where('rinku', $data['pangkat_id'])->first();
        $jenisNaikPangkat = ReferensiJenisNaikPangkat::where('rinku', $data['jenisNaikPangkat_id'])->first();
        if ($data['masaKerjaGolonganTahun']===null || $data['masaKerjaGolonganTahun']==='null' || $data['masaKerjaGolonganTahun']==='undefined') {
            // dd('asd');
            $data['masaKerjaGolonganTahun']="";
        }
        if ($data['masaKerjaGolonganBulan']===null || $data['masaKerjaGolonganBulan']==='null' || $data['masaKerjaGolonganBulan']==='undefined') {
            // dd('asd');
            $data['masaKerjaGolonganBulan']="";
        }
        if ($data['tmtGolongan']===null || $data['tmtGolongan']==='null' || $data['tmtGolongan']==='undefined') {
            // dd('asd');
            $data['tmtGolongan']=date('Y-m-d', time());
        }
        if ($data['nomorSk']===null || $data['nomorSk']==='null' || $data['nomorSk']==='undefined') {
            // dd('asd');
            $data['nomorSk']="";
        }
        if ($data['tanggalSk']===null || $data['tanggalSk']==='null' || $data['tanggalSk']==='undefined') {
            // dd('asd');
            $data['tanggalSk']=date('Y-m-d', time());
        }
        if ($data['nomorPertek']===null || $data['nomorPertek']==='null' || $data['nomorPertek']==='undefined') {
            // dd('asd');
            $data['nomorPertek']="";
        }
        if ($data['tanggalPertek']===null || $data['tanggalPertek']==='null' || $data['tanggalPertek']==='undefined') {
            // dd('asd');
            $data['tanggalPertek']=date('Y-m-d', time());
        }
            $pangkat->update([
                'pegawai_id' => $pegawai->id,
                'pangkat_id' => $golongan->id,
                'jenisNaikPangkat_id' => $jenisNaikPangkat->id,
                'masaKerjaGolonganTahun' => $data['masaKerjaGolonganTahun'],
                'masaKerjaGolonganBulan' => $data['masaKerjaGolonganBulan'],
                'tmtGolongan' => $data['tmtGolongan'],
                'nomorSk' => $data['nomorSk'],
                'tanggalSk' => $data['tanggalSk'],
                'nomorPertek' => $data['nomorPertek'],
                'tanggalPertek' => $data['tanggalPertek']
            ]);
        $pagination = 5;
        $data['pangkat'] = Pangkat::where('pegawai_id',$pegawai['id'])->whereIn('sutattsu',['1', '2'])->orderBy("id", "ASC")->paginate($pagination);
        $count = $data['pangkat']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['pangkat'] as $items) {
            $items['nomor'] = $count;
            $items['golongan'] =$items->pangkat->name;
            $items['golongan2'] =" ( " . $items->pangkat->pangkat . " ) ";
            $items['jenisNaikPangkat'] = $items->jenisNaikPangkat->name;
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
        //
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
        $data['pangkat'] = Pangkat::where('pegawai_id',$data['pegawai']['id'])->whereIn('sutattsu',['1', '2'])->orderBy("id", "ASC")->paginate($pagination);
        $count = $data['pangkat']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['pangkat'] as $items) {
            $items['nomor'] = $count;
            $items['golongan'] =$items->pangkat->name;
            $items['golongan2'] =" ( " . $items->pangkat->pangkat . " ) ";
            $items['jenisNaikPangkat'] = $items->jenisNaikPangkat->name;
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
        $data['pangkat'] = Pangkat::where('rinku',$id)->first();
        // dd($data);
        $data['golongan'] = ReferensiPangkatGolonganRuang::where('id',$data['pangkat']['pangkat_id'])->first();
        $data['jenisNaikPangkat'] = ReferensiJenisNaikPangkat::where('id',$data['pangkat']['jenisNaikPangkat_id'])->first();
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
        $pangkat = Pangkat::where('rinku',$id)->first();
        $pegawai = Uuzaa::where('id', $pangkat['pegawai_id'])->first();
            $pangkat->update([
                'sutattsu' => '0'
            ]);
        $pagination = 5;
        $data['pangkat'] = Pangkat::where('pegawai_id',$pegawai['id'])->whereIn('sutattsu',['1', '2'])->orderBy("id", "ASC")->paginate($pagination);
        $count = $data['pangkat']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['pangkat'] as $items) {
            $items['nomor'] = $count;
            $items['golongan'] =$items->pangkat->name;
            $items['golongan2'] =" ( " . $items->pangkat->pangkat . " ) ";
            $items['jenisNaikPangkat'] = $items->jenisNaikPangkat->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }

    public function aktif($id)
    {
        //
        $pangkat = Pangkat::where('sutattsu','2')->get();
        foreach ($pangkat as $key => $value) {
            $value->update([
                'sutattsu' => '1'
            ]);
        }
        $pangkat = Pangkat::where('rinku',$id)->first();
        $pegawai = Uuzaa::where('id', $pangkat['pegawai_id'])->first();
            $pangkat->update([
                'sutattsu' => '2'
            ]);
        $pagination = 5;
        $data['pangkat'] = Pangkat::where('pegawai_id',$pegawai['id'])->whereIn('sutattsu',['1', '2'])->orderBy("id", "ASC")->paginate($pagination);
        $count = $data['pangkat']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['pangkat'] as $items) {
            $items['nomor'] = $count;
            $items['golongan'] =$items->pangkat->name;
            $items['golongan2'] =" ( " . $items->pangkat->pangkat . " ) ";
            $items['jenisNaikPangkat'] = $items->jenisNaikPangkat->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
}
