<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use Illuminate\Support\Facades\Auth;
use Uuid;
use Illuminate\Support\Facades\Hash;
use App\Models\ReferensiKategoriArsip;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 5;
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
        $data['arsip'] = Arsip::where('pegawai_id',$data['pegawai']['id'])->whereIn('sutattsu',['1', '2'])->orderBy("id", "DESC")->paginate($pagination);
        $count = $data['arsip']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['arsip'] as $items) {
            $items['nomor'] = $count;
            $items['kategori'] = $items->kategori->name;
            $count++;
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
        // dd($request);
        $file = $request->files->all();
        $pegawai = Auth::user();
        $kategori = ReferensiKategoriArsip::where('rinku', $data['kategoriName'])->first();
        if ($file) {
            $file = $request->file('file');
            $fileExt = $file->getClientOriginalExtension();
            $fileName = $pegawai->juugyouinBangou."_".$kategori->name."_".date('YmdHis').".$fileExt";
            $request->file('file')->move("zaFail", $fileName);
            Arsip::create([
                'name' => $data['name'],
                'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string))))),
                'keterangan' => $data['keterangan'],
                'kategori_id' => $kategori->id,
                'pegawai_id' => $pegawai->id,
                'file' => $fileName
            ]);
        } else {
            Arsip::create([
                'name' => $data['name'],
                'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string))))),
                'keterangan' => $data['keterangan'],
                'kategori_id' => $kategori->id,
                'pegawai_id' => $pegawai->id
            ]);
        }
        $pagination = 5;
        $data['arsip'] = Arsip::orderBy("id", "DESC")->first();
        $data['arsip']['nomor'] = "BARU";
        $data['arsip']['kategori'] = $data['arsip']->kategori->name;
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Arsip::where('rinku', $id)->first();
        $data['kategori_name'] = $data->kategori->rinku;
        $data['fileurl'] = '/zaFail/' . $data->file;
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

    public function search(Request $request)
    {
        //
        $cari = $request->cari;
        $data['pegawai'] = Auth::user();
        $pagination = 5;
        $kategori = ReferensiKategoriArsip::where("sutattsu", "1")->where("name", "like", "%" . $request->cari . "%")->first();
        if ($kategori === null) {
            $data = Arsip::where("pegawai_id", $data['pegawai']['id'])
            ->where(function ($query) use ($cari) {
                $query->where("name", "like", "%" . $cari . "%")
                    ->orWhere("keterangan", "like", "%" . $cari . "%");
            })
            ->whereIn('sutattsu',['1', '2'])
            // ->orWhere("kategori_id", $kategori->id)
            ->orderBy("id", "DESC")->paginate($pagination);
        } else {
            $data = Arsip::where("pegawai_id", $data['pegawai']['id'])
            ->where(function ($query) use ($cari,$kategori) {
                $query->where("name", "like", "%" . $cari . "%")
                    ->orWhere("keterangan", "like", "%" . $cari . "%")
                    ->orWhere("kategori_id", $kategori->id);
            })
            ->whereIn('sutattsu',['1', '2'])
            ->orderBy("id", "DESC")->paginate($pagination);
        }
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['kategori'] = $items->kategori->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }

    public function apdet(Request $request)
    {
        //
        $data = $request->request->all();
        // dd($request);
        $file = $request->files->all();
        $arsip = Arsip::where('rinku', $data['url'])->first();
        $pegawai = Uuzaa::where('id',$arsip->pegawai_id)->first();
        $kategori = ReferensiKategoriArsip::where('rinku', $data['kategoriName'])->first();
        if ($file) {
            $file = $request->file('file');
            $fileExt = $file->getClientOriginalExtension();
            $fileName = $pegawai->juugyouinBangou."_".$kategori->name."_".date('YmdHis').".$fileExt";
            $request->file('file')->move("zaFail", $fileName);
            $arsip->update([
                'name' => $data['name'],
                'keterangan' => $data['keterangan'],
                'kategori_id' => $kategori->id,
                'file' => $fileName
            ]);
        } else {
            $arsip->update([
                'name' => $data['name'],
                'keterangan' => $data['keterangan'],
                'kategori_id' => $kategori->id
            ]);
        }
        $pagination = 5;
        $data['pegawai'] = Uuzaa::where('rinku', $arsip->pegawai_id)->first();
        $data['arsip'] = Arsip::where('pegawai_id',$arsip->pegawai_id)->where('sutattsu','1')->orderBy("id", "DESC")->paginate($pagination);
        $count = $data['arsip']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['arsip'] as $items) {
            $items['nomor'] = $count;
            $items['kategori'] = $items->kategori->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
}
