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
        $file = $request->files->all();
        $pegawai = Uuzaa::where('rinku', $data['pegawai_id'])->first();
        $golongan = ReferensiPangkatGolonganRuang::where('rinku', $data['pangkat_id'])->first();
        $jenisNaikPangkat = ReferensiJenisNaikPangkat::where('rinku', $data['jenisNaikPangkat_id'])->first();
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
        $data['data']['golongan'] = $data['data']->pangkat->name . " ( " . $data['data']->pangkat->pangkat . " ) ";
        $data['data']['jenisNaikPangkat'] = $data['data']->jenisNaikPangkat->name;
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
        $count = $data['arsip']->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data['arsip'] as $items) {
            $items['nomor'] = $count;
            $items['kategori'] = $items->kategori->name;
            $count++;
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
