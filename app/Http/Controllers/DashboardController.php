<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $day = 30;
        $day2 = $day - 1;
        $date = today()->subDays($day);
        $user = Auth::user();

        $Arsip = Arsip::where("pegawai_id", $user['id'])->whereIn('sutattsu',['1', '2'])->get();
        $Pengajuan = Arsip::where("pegawai_id", $user['id'])->whereIn('sutattsu',['2', '3', '4'])->get();
        $Menunggu = Arsip::where("pegawai_id", $user['id'])->where('sutattsu','3')->get();
        $Diterima = Arsip::where("pegawai_id", $user['id'])->where('sutattsu','2')->get();
        $Ditolak = Arsip::where("pegawai_id", $user['id'])->where('sutattsu','4')->get();

        $data['totalArsip'] = count($Arsip);
        $data['totalPengajuan'] = count($Pengajuan);
        $data['totalMenunggu'] = count($Menunggu);
        $data['totalDiterima'] = count($Diterima);
        $data['totalDitolak'] = count($Ditolak);

        // if ($user['reberu'] === "0" || $user['reberu'] === "1") {
        //     $totalSuratMasuk = SuratMasuk::where("sutattsu", "1")->get();
        //     $totalSuratKeluar = SuratKeluar::where("sutattsu", "1")->get();
        //     for ($i = 0; $i < $day; $i++) {
        //         $dataSuratMasukPerDay[$i] = SuratMasuk::whereDate('created_at', today()->subDays($day2))->where("sutattsu", "1")->get();
        //         $data['dateSuratMasuk'][] = today()->subDays($day2)->format('d');
        //         $dataSuratKeluarPerDay[$i] = SuratKeluar::whereDate('created_at', today()->subDays($day2))->where("sutattsu", "1")->get();
        //         $data['dateSuratKeluar'][] = today()->subDays($day2)->format('d');
        //         $day2--;
        //     }
        //     foreach ($dataSuratMasukPerDay as $key => $value) {
        //         $data['dataSuratMasukPerDay'][] = count($value);
        //     }
        //     foreach ($dataSuratKeluarPerDay as $key => $value) {
        //         $data['dataSuratKeluarPerDay'][] = count($value);
        //     }
        //     $totalSuratMasuk30HariTerakhir = count(SuratMasuk::where('created_at', '>=', $date)->where("sutattsu", "1")->get());
        //     $totalSuratKeluar30HariTerakhir = count(SuratKeluar::where('created_at', '>=', $date)->where("sutattsu", "1")->get());
        //     $data['totalSurat30HariTerakhir'] = $totalSuratMasuk30HariTerakhir + $totalSuratKeluar30HariTerakhir;
        // } elseif ($user['reberu'] === "2") {
            // $totalSuratMasuk = $user->heya->masuk()->where("sutattsu", "1")->get();
            // $totalSuratKeluar = $user->heya->keluar()->where("sutattsu", "1")->get();
            for ($i = 0; $i < $day; $i++) {
                $dataTotalArsipPerDay[$i] = $user->arsip()->whereDate('created_at', today()
                                                ->subDays($day2))->whereIn("sutattsu", ['1', '2'])->get();
                $dataTotalPengajuanPerDay[$i] = $user->arsip()->whereDate('created_at', today()
                                                ->subDays($day2))->whereIn("sutattsu", ['2', '3', '4'])->get();
                $dataTotalDiterimaPerDay[$i] = $user->arsip()->whereDate('created_at', today()
                                                ->subDays($day2))->where("sutattsu", '2')->get();
                $dataTotalDitolakPerDay[$i] = $user->arsip()->whereDate('created_at', today()
                                                ->subDays($day2))->where("sutattsu", '4')->get();


                $data['dateTotalArsipPerDay'][] = today()->subDays($day2)->format('d');
                $data['dateTotalPengajuanPerDay'][] = today()->subDays($day2)->format('d');
                $data['dateTotalDiterimaPerDay'][] = today()->subDays($day2)->format('d');
                $data['dateTotalDitolakPerDay'][] = today()->subDays($day2)->format('d');


                $day2--;
            }
            foreach ($dataTotalArsipPerDay as $key => $value) {
                $data['dataTotalArsipPerDay'][] = count($value);
            }
            foreach ($dataTotalPengajuanPerDay as $key => $value) {
                $data['dataTotalPengajuanPerDay'][] = count($value);
            }
            foreach ($dataTotalDiterimaPerDay as $key => $value) {
                $data['dataTotalDiterimaPerDay'][] = count($value);
            }
            foreach ($dataTotalDitolakPerDay as $key => $value) {
                $data['dataTotalDitolakPerDay'][] = count($value);
            }
            $data['totalArsip30HariTerakhir'] = count($user->arsip()->where('created_at', '>=', $date)->whereIn("sutattsu", ['1', '2'])->get());
            // $totalSuratKeluar30HariTerakhir = count($user->heya->keluar()->where('created_at', '>=', $date)->where("sutattsu", "1")->get());
            // $data['totalSurat30HariTerakhir'] = $totalSuratMasuk30HariTerakhir + $totalSuratKeluar30HariTerakhir;
        // }
        // $data['totalSuratMasuk'] = count($totalSuratMasuk);
        // $data['totalSuratKeluar'] = count($totalSuratKeluar);
        // $data['totalSurat'] = $data['totalSuratKeluar'] + $data['totalSuratMasuk'];

        return response()->json([
            'data' => $data
        ]);
    }

    public function idmin()
    {
        //
        $day = 30;
        $day2 = $day - 1;
        $date = today()->subDays($day);
        $user = Auth::user();

        $Arsip = Arsip::where("pegawai_id", $user['id'])->whereIn('sutattsu',['1', '2'])->get();
        $Pengajuan = Arsip::where("pegawai_id", $user['id'])->whereIn('sutattsu',['2', '3', '4'])->get();
        $Menunggu = Arsip::where("pegawai_id", $user['id'])->where('sutattsu','3')->get();
        $Diterima = Arsip::where("pegawai_id", $user['id'])->where('sutattsu','2')->get();
        $Ditolak = Arsip::where("pegawai_id", $user['id'])->where('sutattsu','4')->get();

        $data['totalArsip'] = count($Arsip);
        $data['totalPengajuan'] = count($Pengajuan);
        $data['totalMenunggu'] = count($Menunggu);
        $data['totalDiterima'] = count($Diterima);
        $data['totalDitolak'] = count($Ditolak);

        // if ($user['reberu'] === "0" || $user['reberu'] === "1") {
        //     $totalSuratMasuk = SuratMasuk::where("sutattsu", "1")->get();
        //     $totalSuratKeluar = SuratKeluar::where("sutattsu", "1")->get();
        //     for ($i = 0; $i < $day; $i++) {
        //         $dataSuratMasukPerDay[$i] = SuratMasuk::whereDate('created_at', today()->subDays($day2))->where("sutattsu", "1")->get();
        //         $data['dateSuratMasuk'][] = today()->subDays($day2)->format('d');
        //         $dataSuratKeluarPerDay[$i] = SuratKeluar::whereDate('created_at', today()->subDays($day2))->where("sutattsu", "1")->get();
        //         $data['dateSuratKeluar'][] = today()->subDays($day2)->format('d');
        //         $day2--;
        //     }
        //     foreach ($dataSuratMasukPerDay as $key => $value) {
        //         $data['dataSuratMasukPerDay'][] = count($value);
        //     }
        //     foreach ($dataSuratKeluarPerDay as $key => $value) {
        //         $data['dataSuratKeluarPerDay'][] = count($value);
        //     }
        //     $totalSuratMasuk30HariTerakhir = count(SuratMasuk::where('created_at', '>=', $date)->where("sutattsu", "1")->get());
        //     $totalSuratKeluar30HariTerakhir = count(SuratKeluar::where('created_at', '>=', $date)->where("sutattsu", "1")->get());
        //     $data['totalSurat30HariTerakhir'] = $totalSuratMasuk30HariTerakhir + $totalSuratKeluar30HariTerakhir;
        // } elseif ($user['reberu'] === "2") {
            // $totalSuratMasuk = $user->heya->masuk()->where("sutattsu", "1")->get();
            // $totalSuratKeluar = $user->heya->keluar()->where("sutattsu", "1")->get();
            for ($i = 0; $i < $day; $i++) {
                $dataTotalArsipPerDay[$i] = $user->arsip()->whereDate('created_at', today()
                                                ->subDays($day2))->whereIn("sutattsu", ['1', '2'])->get();
                $dataTotalPengajuanPerDay[$i] = $user->arsip()->whereDate('created_at', today()
                                                ->subDays($day2))->whereIn("sutattsu", ['2', '3', '4'])->get();
                $dataTotalDiterimaPerDay[$i] = $user->arsip()->whereDate('created_at', today()
                                                ->subDays($day2))->where("sutattsu", '2')->get();
                $dataTotalDitolakPerDay[$i] = $user->arsip()->whereDate('created_at', today()
                                                ->subDays($day2))->where("sutattsu", '4')->get();


                $data['dateTotalArsipPerDay'][] = today()->subDays($day2)->format('d');
                $data['dateTotalPengajuanPerDay'][] = today()->subDays($day2)->format('d');
                $data['dateTotalDiterimaPerDay'][] = today()->subDays($day2)->format('d');
                $data['dateTotalDitolakPerDay'][] = today()->subDays($day2)->format('d');


                $day2--;
            }
            foreach ($dataTotalArsipPerDay as $key => $value) {
                $data['dataTotalArsipPerDay'][] = count($value);
            }
            foreach ($dataTotalPengajuanPerDay as $key => $value) {
                $data['dataTotalPengajuanPerDay'][] = count($value);
            }
            foreach ($dataTotalDiterimaPerDay as $key => $value) {
                $data['dataTotalDiterimaPerDay'][] = count($value);
            }
            foreach ($dataTotalDitolakPerDay as $key => $value) {
                $data['dataTotalDitolakPerDay'][] = count($value);
            }
            $data['totalArsip30HariTerakhir'] = count($user->arsip()->where('created_at', '>=', $date)->whereIn("sutattsu", ['1', '2'])->get());
            // $totalSuratKeluar30HariTerakhir = count($user->heya->keluar()->where('created_at', '>=', $date)->where("sutattsu", "1")->get());
            // $data['totalSurat30HariTerakhir'] = $totalSuratMasuk30HariTerakhir + $totalSuratKeluar30HariTerakhir;
        // }
        // $data['totalSuratMasuk'] = count($totalSuratMasuk);
        // $data['totalSuratKeluar'] = count($totalSuratKeluar);
        // $data['totalSurat'] = $data['totalSuratKeluar'] + $data['totalSuratMasuk'];

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
