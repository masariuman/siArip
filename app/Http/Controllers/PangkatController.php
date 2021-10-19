<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuzaa;
use App\Models\Pangkat;
use App\Models\ReferensiPangkatGolonganRuang;
use App\Models\ReferensiJenisNaikPangkat;
use Illuminate\Support\Facades\Auth;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
