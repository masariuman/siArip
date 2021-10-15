<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuzaa;
use App\Models\IdentitasPegawai;
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
        $pagination = 5;
        $data['pegawai'] = Uuzaa::where('rinku', $id)->first();
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
        $data['arsip'] = Arsip::where('pegawai_id',$data['pegawai']['id'])->whereIn('sutattsu',['1', '2'])->orderBy("id", "DESC")->paginate($pagination);
        $count = $data['arsip']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['arsip'] as $items) {
            $items['nomor'] = $count;
            $items['kategori'] = $items->kategori->name;
            $count++;
        }
        $data['identitasPegawai'] = IdentitasPegawai::where('pegawai_id', $data['pegawai']['id'])->first();
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
}
