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
            $items['subbid'] =$items->subbid->name;
            $subbid = ReferensiSubBidang::where('id',$items->subbid->id)->first();
            $bidang = ReferensiBidang::where('id',$subbid->ref_bidang->id)->first();
            $items['unor'] =ReferensiUnor::where('id',$bidang->ref_unor->id)->first();
            $items['jenisJabatan'] = $items->jenisJabatan->name;
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

    public function aktif($id)
    {
        //

    }
}
