<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use Illuminate\Support\Facades\Auth;
use Uuid;
use Illuminate\Support\Facades\Hash;
use App\Models\ReferensiKategoriArsip;
use App\Models\Uuzaa;

class PengajuanAdminController extends Controller
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
        $data['pegawai'] = Uuzaa::where('rinku',$id)->first();
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
        $data['arsip'] = Arsip::where('pegawai_id',$data['pegawai']['id'])->whereIn('sutattsu',['2', '3', '4'])->orderBy("id", "DESC")->paginate($pagination);
        $count = $data['arsip']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['arsip'] as $items) {
            $items['nomor'] = $count;
            $items['kategori'] = $items->kategori->name;
            if ($items['sutattsu'] === '3') {
                $items['status'] = 'Belum Terverifikasi';
                $items['statusClass'] = 'mr-2 mb-2 btn btn-warning btn-rounded';
            }
            if ($items['sutattsu'] === '2') {
                $items['status'] = 'Pengajuan Diterima';
                $items['statusClass'] = 'mr-2 mb-2 btn btn-success btn-rounded';
            }
            if ($items['sutattsu'] === '4') {
                $items['status'] = 'Pengajuan Ditolak';
                $items['statusClass'] = 'mr-2 mb-2 btn btn-danger btn-rounded';
            }
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
        $data = Arsip::where('rinku', $id)->first();
        $data['kategori_name'] = $data->kategori->rinku;
        $data['fileurl'] = '/zaFail/' . $data->file;
        if ($data['sutattsu'] === '3') {
            $data['status'] = 'Belum Terverifikasi';
            $data['statusButton'] = 1;
            $data['statusClass'] = 'mr-2 mb-2 btn btn-warning btn-rounded';
        }
        if ($data['sutattsu'] === '2') {
            $data['status'] = 'Pengajuan Diterima';
            $data['statusButton'] = 0;
            $data['statusClass'] = 'mr-2 mb-2 btn btn-success btn-rounded';
        }
        if ($data['sutattsu'] === '4') {
            $data['status'] = 'Pengajuan Ditolak';
            $data['keteranganVerifikasi'] = 'ALASAN DITOLAK : '.$data['keteranganVerifikasi'];
            $data['statusButton'] = 0;
            $data['statusClass'] = 'mr-2 mb-2 btn btn-danger btn-rounded';
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

    public function terima(Request $request)
    {
        $data = $request->request->all();
        // dd($request);
        $file = $request->files->all();
        $arsip = Arsip::where('rinku',$data['url'])->first();
        // dd($arsip);
        $arsip->update([
            'sutattsu' => '2'
        ]);
        $data['pegawai'] = Uuzaa::where('id', $arsip->pegawai_id)->first();
        $pagination = 5;
        $data['arsip'] = Arsip::where('pegawai_id',$data['pegawai']['id'])->whereIn('sutattsu',['2', '3', '4'])->orderBy("id", "DESC")->paginate($pagination);
        $count = $data['arsip']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['arsip'] as $items) {
            $items['nomor'] = $count;
            $items['kategori'] = $items->kategori->name;
            if ($items['sutattsu'] === '3') {
                $items['status'] = 'Belum Terverifikasi';
                $items['statusClass'] = 'mr-2 mb-2 btn btn-warning btn-rounded';
            }
            if ($items['sutattsu'] === '2') {
                $items['status'] = 'Pengajuan Diterima';
                $items['statusClass'] = 'mr-2 mb-2 btn btn-success btn-rounded';
            }
            if ($items['sutattsu'] === '4') {
                $items['status'] = 'Pengajuan Ditolak';
                $items['statusClass'] = 'mr-2 mb-2 btn btn-danger btn-rounded';
            }
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }

    public function tolak(Request $request)
    {
        $data = $request->request->all();
        // dd($request);
        $file = $request->files->all();
        $arsip = Arsip::where('rinku',$data['url'])->first();
        // dd($arsip);
        $arsip->update([
            'sutattsu' => '4',
            'keteranganVerifikasi' => $data['keteranganVerifikasi']
        ]);
        $data['pegawai'] = Uuzaa::where('id', $arsip->pegawai_id)->first();
        $pagination = 5;
        $data['arsip'] = Arsip::where('pegawai_id',$data['pegawai']['id'])->whereIn('sutattsu',['2', '3', '4'])->orderBy("id", "DESC")->paginate($pagination);
        $count = $data['arsip']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['arsip'] as $items) {
            $items['nomor'] = $count;
            $items['kategori'] = $items->kategori->name;
            if ($items['sutattsu'] === '3') {
                $items['status'] = 'Belum Terverifikasi';
                $items['statusClass'] = 'mr-2 mb-2 btn btn-warning btn-rounded';
            }
            if ($items['sutattsu'] === '2') {
                $items['status'] = 'Pengajuan Diterima';
                $items['statusClass'] = 'mr-2 mb-2 btn btn-success btn-rounded';
            }
            if ($items['sutattsu'] === '4') {
                $items['status'] = 'Pengajuan Ditolak';
                $items['statusClass'] = 'mr-2 mb-2 btn btn-danger btn-rounded';
            }
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
}
