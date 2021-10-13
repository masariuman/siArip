<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use Illuminate\Support\Facades\Auth;
use Uuid;
use Illuminate\Support\Facades\Hash;
use App\Models\Uuzaa;
use App\Models\ReferensiKategoriArsip;

class PengajuanController extends Controller
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
                'sutattsu' => '3',
                'file' => $fileName
            ]);
        } else {
            Arsip::create([
                'name' => $data['name'],
                'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string))))),
                'keterangan' => $data['keterangan'],
                'kategori_id' => $kategori->id,
                'sutattsu' => '3',
                'pegawai_id' => $pegawai->id
            ]);
        }
        $pagination = 5;
        $data['arsip'] = Arsip::orderBy("id", "DESC")->first();
        $data['arsip']['nomor'] = "BARU";
        $data['arsip']['kategori'] = $data['arsip']->kategori->name;
        if ($data['arsip']['sutattsu'] === '3') {
            $data['arsip']['status'] = 'Belum Terverifikasi';
            $data['arsip']['statusClass'] = 'mr-2 mb-2 btn btn-warning btn-rounded';
        }
        if ($data['arsip']['sutattsu'] === '2') {
            $data['arsip']['status'] = 'Pengajuan Diterima';
            $data['arsip']['statusClass'] = 'mr-2 mb-2 btn btn-success btn-rounded';
        }
        if ($data['arsip']['sutattsu'] === '4') {
            $data['arsip']['status'] = 'Pengajuan Ditolak';
            $data['arsip']['statusClass'] = 'mr-2 mb-2 btn btn-danger btn-rounded';
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
            ->whereIn('sutattsu',['2', '3', '4'])
            // ->orWhere("kategori_id", $kategori->id)
            ->orderBy("id", "DESC")->paginate($pagination);
        } else {
            $data = Arsip::where("pegawai_id", $data['pegawai']['id'])
            ->where(function ($query) use ($cari,$kategori) {
                $query->where("name", "like", "%" . $cari . "%")
                    ->orWhere("keterangan", "like", "%" . $cari . "%")
                    ->orWhere("kategori_id", $kategori->id);
            })
            ->whereIn('sutattsu',['2', '3', '4'])
            ->orderBy("id", "DESC")->paginate($pagination);
        }
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
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
        $arsip = Arsip::where('rinku',$data['url']);
        dd($arsip);
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
                'sutattsu' => '3',
                'file' => $fileName
            ]);
        } else {
            Arsip::create([
                'name' => $data['name'],
                'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string))))),
                'keterangan' => $data['keterangan'],
                'kategori_id' => $kategori->id,
                'sutattsu' => '3',
                'pegawai_id' => $pegawai->id
            ]);
        }
        $pagination = 5;
        $data['arsip'] = Arsip::orderBy("id", "DESC")->first();
        $data['arsip']['nomor'] = "BARU";
        $data['arsip']['kategori'] = $data['arsip']->kategori->name;
        if ($data['arsip']['sutattsu'] === '3') {
            $data['arsip']['status'] = 'Belum Terverifikasi';
            $data['arsip']['statusClass'] = 'mr-2 mb-2 btn btn-warning btn-rounded';
        }
        if ($data['arsip']['sutattsu'] === '2') {
            $data['arsip']['status'] = 'Pengajuan Diterima';
            $data['arsip']['statusClass'] = 'mr-2 mb-2 btn btn-success btn-rounded';
        }
        if ($data['arsip']['sutattsu'] === '4') {
            $data['arsip']['status'] = 'Pengajuan Ditolak';
            $data['arsip']['statusClass'] = 'mr-2 mb-2 btn btn-danger btn-rounded';
        }
        return response()->json([
            'data' => $data
        ]);
    }
}
