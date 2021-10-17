<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuzaa;
use App\Models\Pangkat;
use App\Models\ReferensiPangkatGolonganRuang;
use App\Models\ReferensiJenisNaikPangkat;

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
        $file = $request->files->all();
        $pegawai = Uuzaa::where('rinku', $data['pegawai_id'])->first();
        $golongan = ReferensiPangkatGolonganRuang::where('rinku', $data['pangkat_id'])->first();
        $jenisNaikPangkat = ReferensiJenisNaikPangkat::where('rinku', $data['jenisNaikPangkat_id'])->first();
            Pangkat::create([
                'pegawai_id' => $pegawai->id,
                'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string))))),
                'pangkat_id' => $golongan->id,
                'jenisNaikPangkat_id' => $jenisNaikPangkat->id,
                'masaKerjaGolonganTahun' => $data[''],
                'masaKerjaGolonganBulan' => $data[''],
                'tmtGolongan' => $data[''],
                'nomorSk' => $data[''],
                'tanggalSk' => $data[''],
                'nomorPertek' => $data[''],
                'tanggalPertek' => $data['']
            ]);
        $pagination = 5;
        $data['arsip'] = Arsip::orderBy("id", "DESC")->first();
        $data['arsip']['nomor'] = "BARU";
        $data['arsip']['kategori'] = $data['arsip']->kategori->name;
        return response()->json([
            'data' => $data
        ]);
    }

    public function apdet(Request $request)
    {
        //
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
