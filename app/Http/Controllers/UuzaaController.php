<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuzaa;
use App\Models\Heya;
use App\Models\ReferensiSubBidang;
use App\Models\Arsip;
use App\Models\ReferensiKategoriArsip;
use Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;

class UuzaaController extends Controller
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
        $data = Uuzaa::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['tanggalLahirText'] = date("d F Y", strtotime($items['tanggalLahir']));
            $dateNow = getdate();
            $tahunLahir = date("Y", strtotime($items['tanggalLahir']));
            $bulanLahir = date("m", strtotime($items['tanggalLahir']));
            $tahunNow = $dateNow['year'];
            $bulanNow = $dateNow['mon'];
            // dd($tahunNow - $tahunLahir);
            $dateLahirr = date_create($tahunLahir . '-' . $bulanLahir . '-01');
            $datenow = date_create($tahunNow . '-' . $bulanNow . '-01');
            $interval = date_diff($dateLahirr, $datenow);
            $items['usia'] = $interval->y." Tahun ".$interval->m." Bulan";
            // dd($usia);
            $items['subbidName'] = $items->ref_subbid->name;
            if ($items['reberu'] === "3") {
                $items['level'] = "User";
            } else if ($items['reberu'] === "2") {
                $items['level'] = "Admin";
            } else if ($items['reberu'] === "1") {
                $items['level'] = "Super Admin";
            } else {
                $items['level'] = "Legendary Admin";
            }
            $count++;
        }
        // dd($data);
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
        $data = Heya::where('sutattsu', '1')->get();
        $heya = [];
        $x = 0;
        foreach ($data as $items) {
            $heya['heya'][$x]['heyaMei'] = $items->heyaMei;
            $heya['heya'][$x]['rinku'] = $items->rinku;
            $x = $x + 1;
        }
        return response()->json([
            'data' => $heya
        ]);
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
        // dd($request->request);
        $data = $request->request->all();
        $subbid = ReferensiSubBidang::where('rinku', $data['subbidName'])->first();
        // dd($subbid);
        Uuzaa::create([
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string))))),
            'juugyouinBangou' => $data['nip'],
            'nip9' => $data['nip9'],
            'gelarDepan' =>  $data['gelarDepan'],
            'name' => $data['namaLengkap'],
            'gelarBelakang' => $data['gelarBelakang'],
            'tempatLahir' => $data['tempatLahir'],
            'tanggalLahir' => $data['tanggalLahir'],
            'yuuzaaMei' => $data['nip'],
            'subBidang_id' => $subbid->id,
            'password' => Hash::make($request->nip)
        ]);
        // $pagination = 5;
        // $data = Uuzaa::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        // $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        // foreach ($data as $items) {
        //     $items['nomor'] = $count;
        //     $count++;
        // }
        $data = Uuzaa::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        $data['subbidName'] = $data->ref_subbid->name;
        if ($data['reberu'] === "3") {
            $data['level'] = "User";
        } else if ($itdataems['reberu'] === "2") {
            $data['level'] = "Administrator";
        } else if ($data['reberu'] === "1") {
            $data['level'] = "Super Admin";
        } else {
            $data['level'] = "Legendary Admin";
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
        $data['arsip'] = Arsip::where('pegawai_id',$data['pegawai']['id'])->where('sutattsu','1')->orderBy("id", "DESC")->paginate($pagination);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $data = Uuzaa::where('rinku', $id)->first();
        // // $data['heyaRinku'] = $data->heya->rinku;
        // return response()->json([
        //     'data' => $data
        // ]);
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
        $Uuzaa = Uuzaa::where('rinku', $id)->first();
        $oldpass = false;
        if ($request->heyaMei) {
            $heya = Heya::where('rinku', $request->heyaMei)->first();
        }
        if ($request->reberu) {
            if ($request->reberu === "nol") {
                $Uuzaa->update([
                    'reberu' => "0",
                    'login' => "1"
                ]);
            } else if ($request->reberu === "1" || $request->reberu === "2") {
                $Uuzaa->update([
                    'reberu' => $request->reberu,
                    'login' => "1"
                ]);
            } else {
                $Uuzaa->update([
                    'reberu' => $request->reberu,
                    'login' => "0"
                ]);
            }
        } else if ($request->newPass) {
            if (!Hash::check($request->oldPass, $request->user()->password)) {
                $oldpass = true;
            } else {
                $oldpass = false;
                $Uuzaa->update([
                    'password' => Hash::make($request->newPass)
                ]);
            }
        } else {
            $Uuzaa->update([
                'juugyouinBangou' => $request->nip,
                'name' => $request->name,
                'heya_id' => $heya->id
            ]);
        }
        $pagination = 5;
        $data = Uuzaa::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['heyaMei'] = $items->heya->heyaMei;
            if ($items['reberu'] === "3") {
                $items['level'] = "User";
            } else if ($items['reberu'] === "2") {
                $items['level'] = "Admin";
            } else if ($items['reberu'] === "1") {
                $items['level'] = "Super Admin";
            } else {
                $items['level'] = "Legendary Admin";
            }
            $count++;
        }
        if ($oldpass === true) {
            $data['oldPassConfirm'] = false;
        }
        if ($oldpass === false) {
            $data['oldPassConfirm'] = true;
        }
        return response()->json([
            'data' => $data
        ]);
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
        $novel = Uuzaa::where("rinku", $id)->first();
        $novel->update([
            'sutattsu' => '0',
            'login' => '0'
        ]);
        $pagination = 5;
        $data = Uuzaa::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['heyaMei'] = $items->heya->heyaMei;
            if ($items['reberu'] === "3") {
                $items['level'] = "User";
            } else if ($items['reberu'] === "2") {
                $items['level'] = "Administrator";
            } else if ($items['reberu'] === "1") {
                $items['level'] = "Super Admin";
            } else {
                $items['level'] = "Legendary Admin";
            }
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        //
        $cari = $request->cari;
        $pagination = 5;
        $data = Uuzaa::where("sutattsu", "1")
            ->where(function ($query) use ($cari) {
                $query->where("juugyouinBangou", "like", "%" . $cari . "%")
                    ->orWhere("name", "like", "%" . $cari . "%");
            })->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['heyaMei'] = $items->heya->heyaMei;
            if ($items['reberu'] === "3") {
                $items['level'] = "User";
            } else if ($items['reberu'] === "2") {
                $items['level'] = "Admin";
            } else if ($items['reberu'] === "1") {
                $items['level'] = "Super Admin";
            } else {
                $items['level'] = "Legendary Admin";
            }
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }

    public function getUuzaa()
    {
        $data = Auth::user();
        if ($data['reberu'] === "3") {
            $data['level'] = "User Employee";
        } else if ($data['reberu'] === "2") {
            $data['level'] = "Administrator";
        } else if ($data['reberu'] === "1") {
            $data['level'] = "Super Admin";
        } else {
            $data['level'] = "Legendary Admin";
        }
        return response()->json([
            'data' => $data
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function sashin(Request $request)
    {
        //
        // dd($data);
        $file = $request->files->all();
        $user = Auth::user();
        $uuzaa = Uuzaa::where('rinku', $user['rinku'])->first();
        $file = $request->file('file');
        $fileExt = $file->getClientOriginalExtension();
        $fileName = $uuzaa['juugyouinBangou'] . "_" . date('YmdHis') . ".$fileExt";

        $destinationPath = public_path('/sashin');
        $img = Image::make($file->path());
        $img->resize(220, 220)->save($destinationPath . '/' . $fileName);

        // $request->file('file')->move("sashin", $fileName);
        $uuzaa->update([
            'sashin' => $fileName
        ]);
        $data['data'] = Auth::user();
        return response()->json([
            'data' => $data
        ]);
    }

    public function resetPassword($id)
    {
        //
        // dd('bisa');
        $novel = Uuzaa::where("rinku", $id)->first();
        $novel->update([
            'password' => Hash::make($novel->juugyouinBangou)
        ]);
        $pagination = 5;
        $data = Uuzaa::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['heyaMei'] = $items->heya->heyaMei;
            if ($items['reberu'] === "3") {
                $items['level'] = "User";
            } else if ($items['reberu'] === "2") {
                $items['level'] = "Administrator";
            } else if ($items['reberu'] === "1") {
                $items['level'] = "Super Admin";
            } else {
                $items['level'] = "Legendary Admin";
            }
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }

    public function sashinUuzaa(Request $request)
    {
        //
        // dd($data);
        $data = $request->request->all();
        $file = $request->files->all();
        $uuzaa = Uuzaa::where('rinku', $data['url'])->first();
        // dd($uuzaa);
        $file = $request->file('file');
        $fileExt = $file->getClientOriginalExtension();
        $fileName = $uuzaa['juugyouinBangou'] . "_" . date('YmdHis') . ".$fileExt";

        $destinationPath = public_path('/sashin');
        $img = Image::make($file->path());
        $img->resize(220, 220)->save($destinationPath . '/' . $fileName);

        // $request->file('file')->move("sashin", $fileName);
        $uuzaa->update([
            'sashin' => $fileName
        ]);
        $data['data'] = $uuzaa;
        return response()->json([
            'data' => $data
        ]);
    }


    public function arsipPegawai(Request $request)
    {
        //
        $data = $request->request->all();
        // dd($request);
        $file = $request->files->all();
        $pegawai = Uuzaa::where('rinku', $data['pegawai_id'])->first();
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

    public function arsipPegawaiSearch(Request $request)
    {
        //
        $pagination = 5;
        $data = Uuzaa::where("sutattsu", "1")->where("name", "like", "%" . $request->cari . "%")
            ->orWhere("juugyouinBangou", "like", "%" . $request->cari . "%")
            ->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }

    public function arsipPegawaiEdit($id)
    {
        //
        $data = Arsip::where('rinku', $id)->first();
        $data['kategori_name'] = $data->kategori->rinku;
        $data['fileurl'] = '/zaFail/' . $data->file;
        // $data['heyaRinku'] = $data->heya->rinku;
        return response()->json([
            'data' => $data
        ]);
    }

    public function arsipPegawaiUpdate(Request $request)
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

    public function arsipPegawaiArsipSearch(Request $request)
    {
        //
        $cari = $request->cari;
        $pegawai = Uuzaa::where('rinku',$request->pegawai_id)->first();
        // dd($request);
        $pagination = 5;
        $kategori = ReferensiKategoriArsip::where("sutattsu", "1")->where("name", "like", "%" . $request->cari . "%")->first();
        if ($kategori === null) {
            $data = Arsip::where("pegawai_id", $pegawai['id'])
            ->where(function ($query) use ($cari) {
                $query->where("name", "like", "%" . $cari . "%")
                    ->orWhere("keterangan", "like", "%" . $cari . "%");
            })
            ->where("sutattsu", "1")
            // ->orWhere("kategori_id", $kategori->id)
            ->orderBy("id", "DESC")->paginate($pagination);
        } else {
            $data = Arsip::where("pegawai_id", $pegawai['id'])
            ->where(function ($query) use ($cari,$kategori) {
                $query->where("name", "like", "%" . $cari . "%")
                    ->orWhere("keterangan", "like", "%" . $cari . "%")
                    ->orWhere("kategori_id", $kategori->id);
            })
            ->where("sutattsu", "1")
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

    public function arsipPegawaiArsipDelete($id)
    {
        //
        $arsip = Arsip::where('rinku', $id)->first();
        $arsip->update([
            'sutattsu' => '0'
        ]);
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
