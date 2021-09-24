<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferensiAgama;
use App\Models\ReferensiUnor;
use App\Models\ReferensiBidang;
use App\Models\ReferensiSubBidang;
use App\Models\ReferensiStatusKepegawaian;
use App\Models\ReferensiJenisHukumanDisiplin;
use App\Models\ReferensiJenisKepegawaian;
use App\Models\ReferensiJenisPenghargaan;
use App\Models\ReferensiKedudukanKepegawaian;
use App\Models\ReferensiPangkatGolonganRuang;
use App\Models\ReferensiSTLUD;
use Uuid;
use Illuminate\Support\Facades\Hash;

class ReferensiController extends Controller
{
    //referensi agama
    public function agama()
    {
        $pagination = 5;
        $data = ReferensiAgama::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function agamaStore(Request $request)
    {
        ReferensiAgama::create([
            'name' => $request->data,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiAgama::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        return response()->json([
            'data' => $data
        ]);
    }
    public function agamaEdit($id)
    {
        //
        $data = ReferensiAgama::where("rinku", $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function agamaUpdate(Request $request, $id)
    {
        //
        $data = ReferensiAgama::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data
        ]);
        $pagination = 5;
        $data = ReferensiAgama::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function agamaDestroy($id)
    {
        //
        $data = ReferensiAgama::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiAgama::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function agamaSearch(Request $request)
    {
        //
        $pagination = 5;
        $data = ReferensiAgama::where("name", "like", "%" . $request->cari . "%")->where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }


//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------


    //referensi unor
    public function unor()
    {
        $pagination = 5;
        $data = ReferensiUnor::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function unorCreate()
    {
        $data = ReferensiUnor::where("sutattsu", "1")->orderBy("id", "DESC")->get();
        // dd($data);
        return response()->json([
            'data' => $data
        ]);
    }
    public function unorStore(Request $request)
    {
        ReferensiBidang::create([
            'name' => $request->data,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiBidang::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        return response()->json([
            'data' => $data
        ]);
    }
    public function unorEdit($id)
    {
        //
        $data = ReferensiUnor::where("rinku", $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function unorUpdate(Request $request, $id)
    {
        //
        $data = ReferensiUnor::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data
        ]);
        $pagination = 5;
        $data = Referensiunor::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function unorDestroy($id)
    {
        //
        $data = ReferensiUnor::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiUnor::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function unorSearch(Request $request)
    {
        //
        $pagination = 5;
        $data = ReferensiUnor::where("name", "like", "%" . $request->cari . "%")->where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }


//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------

    //referensi bidang
    public function bidang()
    {
        $pagination = 5;
        $data = ReferensiBidang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['unor'] = $items->ref_unor->name;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function bidangCreate()
    {
        $data = ReferensiBidang::where("sutattsu", "1")->orderBy("name", "ASC")->get();
        // dd($data);
        foreach ($data as $key => $value) {
            $value['name'] = $value['name'].' - '.$value->ref_unor->name;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function bidangStore(Request $request)
    {
        // dd($request->data);
        // dd($request->unorName);
        $unor = ReferensiUnor::where('rinku',$request->unorName)->first();
        // dd($unor);
        ReferensiBidang::create([
            'name' => $request->data,
            'refUnor_id' => $unor->id,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiBidang::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        $data['unor'] = $data->ref_unor->name;
        // dd($data['unor']);
        return response()->json([
            'data' => $data
        ]);
    }
    public function bidangEdit($id)
    {
        //
        $data = ReferensiBidang::where("rinku", $id)->first();
        $data['unorName'] = $data->ref_unor->rinku;
        return response()->json([
            'data' => $data
        ]);
    }
    public function bidangUpdate(Request $request, $id)
    {
        //
        $unor = ReferensiUnor::where('rinku',$request->unorName)->first();
        $data = ReferensiBidang::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data,
            'refUnor_id' => $unor->id
        ]);
        $pagination = 5;
        $data = ReferensiBidang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['unor'] = $items->ref_unor->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function bidangDestroy($id)
    {
        //
        $data = ReferensiBidang::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiBidang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['unor'] = $items->ref_unor->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function bidangSearch(Request $request)
    {
        //
        $pagination = 5;
        if ($request->cari === null || $request->cari === "") {
            $data = ReferensiBidang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        } else {
            $unor = ReferensiUnor::where("name", "like", "%" . $request->cari . "%")->get();
            $unorId = [];
            foreach ($unor as $key => $value) {
                array_push($unorId,$value->id);
            }
            // dd($unorId);
            $data = ReferensiBidang::where("sutattsu", "1")->where("name", "like", "%" . $request->cari . "%")->orWhere(function ($query) use ($unorId) {
                $query->whereIn('refUnor_id',$unorId)->where("sutattsu", "1");
            })
                ->orderBy("id", "DESC")->paginate($pagination);
        }
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['unor'] = $items->ref_unor->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }

//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------

    //referensi sub bidang
    public function subBidang()
    {
        $pagination = 5;
        $data = ReferensiSubBidang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['bidang'] = $items->ref_bidang->name.' - '.$items->ref_bidang->ref_unor->name;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function subBidangCreate()
    {
        $data = ReferensiSubBidang::where("sutattsu", "1")->orderBy("id", "DESC")->get();
        // dd($data);
        return response()->json([
            'data' => $data
        ]);
    }
    public function subBidangStore(Request $request)
    {
        // dd($request->data);
        // dd($request->unorName);
        $bidang = ReferensiBidang::where('rinku',$request->bidangName)->first();
        // dd($unor);
        ReferensiSubBidang::create([
            'name' => $request->data,
            'refBidang_id' => $bidang->id,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiSubBidang::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        $data['bidang'] = $data->ref_bidang->name.' - '.$data->ref_bidang->ref_unor->name;
        // dd($data['unor']);
        return response()->json([
            'data' => $data
        ]);
    }
    public function subBidangEdit($id)
    {
        //
        $data = ReferensiSubBidang::where("rinku", $id)->first();
        $data['bidangName'] = $data->ref_bidang->rinku;
        return response()->json([
            'data' => $data
        ]);
    }
    public function subBidangUpdate(Request $request, $id)
    {
        //
        $bidang = ReferensiBidang::where('rinku',$request->bidangName)->first();
        $data = ReferensiSubBidang::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data,
            'refBidang_id' => $bidang->id
        ]);
        $pagination = 5;
        $data = ReferensiSubBidang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['bidang'] = $items->ref_bidang->name.' - '.$items->ref_bidang->ref_unor->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function subBidangDestroy($id)
    {
        //
        $data = ReferensiSubBidang::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiSubBidang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['bidang'] = $items->ref_bidang->name.' - '.$items->ref_bidang->ref_unor->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function subBidangSearch(Request $request)
    {
        //
        $pagination = 5;
        if ($request->cari === null || $request->cari === "") {
            $data = ReferensiSubBidang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        } else {
            $unor = ReferensiUnor::where("sutattsu", "1")->where("name", "like", "%" . $request->cari . "%")->get();
            $unorId = [];
            foreach ($unor as $key => $value) {
                array_push($unorId,$value->id);
            }
            $bidang = ReferensiBidang::where("sutattsu", "1")->where("name", "like", "%" . $request->cari . "%")
                ->orWhereIn("refUnor_id",$unorId)
                ->orderBy("id", "DESC")->get();
            $bidangId = [];
            foreach ($bidang as $key => $value) {
                array_push($bidangId,$value->id);
            }
            $data = ReferensiSubBidang::where("sutattsu", "1")->where("name", "like", "%" . $request->cari . "%")->orWhere(function ($query) use ($bidangId) {
                $query->whereIn('refBidang_id',$bidangId)->where("sutattsu", "1");
            })
                ->orderBy("id", "DESC")->paginate($pagination);
        }
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $items['bidang'] = $items->ref_bidang->name.' - '.$items->ref_bidang->ref_unor->name;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }


//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------


    //referensi status kepegawaian
    public function statusKepegawaian()
    {
        $pagination = 5;
        $data = ReferensiStatusKepegawaian::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function statusKepegawaianStore(Request $request)
    {
        ReferensiStatusKepegawaian::create([
            'name' => $request->data,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiStatusKepegawaian::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        return response()->json([
            'data' => $data
        ]);
    }
    public function statusKepegawaianEdit($id)
    {
        //
        $data = ReferensiStatusKepegawaian::where("rinku", $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function statusKepegawaianUpdate(Request $request, $id)
    {
        //
        $data = ReferensiStatusKepegawaian::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data
        ]);
        $pagination = 5;
        $data = ReferensiStatusKepegawaian::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function statusKepegawaianDestroy($id)
    {
        //
        $data = ReferensiStatusKepegawaian::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiStatusKepegawaian::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function statusKepegawaianSearch(Request $request)
    {
        //
        $pagination = 5;
        $data = ReferensiStatusKepegawaian::where("name", "like", "%" . $request->cari . "%")->where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }


//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------


    //referensi jenis kepegawaian
    public function jenisKepegawaian()
    {
        $pagination = 5;
        $data = ReferensiJenisKepegawaian::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisKepegawaianStore(Request $request)
    {
        ReferensiJenisKepegawaian::create([
            'name' => $request->data,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiJenisKepegawaian::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisKepegawaianEdit($id)
    {
        //
        $data = ReferensiJenisKepegawaian::where("rinku", $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisKepegawaianUpdate(Request $request, $id)
    {
        //
        $data = ReferensiJenisKepegawaian::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data
        ]);
        $pagination = 5;
        $data = ReferensiJenisKepegawaian::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisKepegawaianDestroy($id)
    {
        //
        $data = ReferensiJenisKepegawaian::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiJenisKepegawaian::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisKepegawaianSearch(Request $request)
    {
        //
        $pagination = 5;
        $data = ReferensiJenisKepegawaian::where("name", "like", "%" . $request->cari . "%")->where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }


//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------


    //referensi jenis penghargaan
    public function jenisPenghargaan()
    {
        $pagination = 5;
        $data = ReferensiJenisPenghargaan::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisPenghargaanStore(Request $request)
    {
        ReferensiJenisPenghargaan::create([
            'name' => $request->data,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiJenisPenghargaan::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisPenghargaanEdit($id)
    {
        //
        $data = ReferensiJenisPenghargaan::where("rinku", $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisPenghargaanUpdate(Request $request, $id)
    {
        //
        $data = ReferensiJenisPenghargaan::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data
        ]);
        $pagination = 5;
        $data = ReferensiJenisPenghargaan::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisPenghargaanDestroy($id)
    {
        //
        $data = ReferensiJenisPenghargaan::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiJenisPenghargaan::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisPenghargaanSearch(Request $request)
    {
        //
        $pagination = 5;
        $data = ReferensiJenisPenghargaan::where("name", "like", "%" . $request->cari . "%")->where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }



//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------


    //referensi jenis hukuman disiplin
    public function jenisHukumanDisiplin()
    {
        $pagination = 5;
        $data = ReferensiJenisHukumanDisiplin::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisHukumanDisiplinStore(Request $request)
    {
        ReferensiJenisHukumanDisiplin::create([
            'name' => $request->data,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiJenisHukumanDisiplin::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisHukumanDisiplinEdit($id)
    {
        //
        $data = ReferensiJenisHukumanDisiplin::where("rinku", $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisHukumanDisiplinUpdate(Request $request, $id)
    {
        //
        $data = ReferensiJenisHukumanDisiplin::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data
        ]);
        $pagination = 5;
        $data = ReferensiJenisHukumanDisiplin::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisHukumanDisiplinDestroy($id)
    {
        //
        $data = ReferensiJenisHukumanDisiplin::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiJenisHukumanDisiplin::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function jenisHukumanDisiplinSearch(Request $request)
    {
        //
        $pagination = 5;
        $data = ReferensiJenisHukumanDisiplin::where("name", "like", "%" . $request->cari . "%")->where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }


//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------


    //referensi kedudukan kepegawaian kepegawaian
    public function kedudukanKepegawaian()
    {
        $pagination = 5;
        $data = ReferensiKedudukanKepegawaian::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function kedudukanKepegawaianStore(Request $request)
    {
        ReferensiKedudukanKepegawaian::create([
            'name' => $request->data,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiKedudukanKepegawaian::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        return response()->json([
            'data' => $data
        ]);
    }
    public function kedudukanKepegawaianEdit($id)
    {
        //
        $data = ReferensiKedudukanKepegawaian::where("rinku", $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function kedudukanKepegawaianUpdate(Request $request, $id)
    {
        //
        $data = ReferensiKedudukanKepegawaian::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data
        ]);
        $pagination = 5;
        $data = ReferensiKedudukanKepegawaian::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function kedudukanKepegawaianDestroy($id)
    {
        //
        $data = ReferensiKedudukanKepegawaian::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiKedudukanKepegawaian::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function kedudukanKepegawaianSearch(Request $request)
    {
        //
        $pagination = 5;
        $data = ReferensiKedudukanKepegawaian::where("name", "like", "%" . $request->cari . "%")->where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }

//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------


    //referensi pangkat / golongan ruang
    public function pangkatGolonganRuang()
    {
        $pagination = 5;
        $data = ReferensiPangkatGolonganRuang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function pangkatGolonganRuangStore(Request $request)
    {
        ReferensiPangkatGolonganRuang::create([
            'name' => $request->data,
            'pangkat' => $request->dataPangkat,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiPangkatGolonganRuang::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        return response()->json([
            'data' => $data
        ]);
    }
    public function pangkatGolonganRuangEdit($id)
    {
        //
        $data = ReferensiPangkatGolonganRuang::where("rinku", $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function pangkatGolonganRuangUpdate(Request $request, $id)
    {
        //
        $data = ReferensiPangkatGolonganRuang::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data,
            'pangkat' => $request->dataPangkat
        ]);
        $pagination = 5;
        $data = ReferensiPangkatGolonganRuang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function pangkatGolonganRuangDestroy($id)
    {
        //
        $data = ReferensiPangkatGolonganRuang::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiPangkatGolonganRuang::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function pangkatGolonganRuangSearch(Request $request)
    {
        //
        $pagination = 5;
        $data = ReferensiPangkatGolonganRuang::where("sutattsu", "1")->where("name", "like", "%" . $request->cari . "%")->orWhere(function ($query) use ($request) {
            $query->where("pangkat", "like", "%" . $request->cari . "%")->where("sutattsu", "1");
        })
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

//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------


    //referensi stlud
    public function stlud()
    {
        $pagination = 5;
        $data = ReferensiSTLUD::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        // dd($gets);
        return response()->json([
            'data' => $data
        ]);
    }
    public function stludStore(Request $request)
    {
        ReferensiSTLUD::create([
            'name' => $request->data,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiSTLUD::orderBy("id", "DESC")->first();
        $data['nomor'] = "BARU";
        return response()->json([
            'data' => $data
        ]);
    }
    public function stludEdit($id)
    {
        //
        $data = ReferensiSTLUD::where("rinku", $id)->first();
        return response()->json([
            'data' => $data
        ]);
    }
    public function stludUpdate(Request $request, $id)
    {
        //
        $data = ReferensiSTLUD::where("rinku", $id)->first();
        $data->update([
            'name' => $request->data
        ]);
        $pagination = 5;
        $data = ReferensiSTLUD::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function stludDestroy($id)
    {
        //
        $data = ReferensiSTLUD::where("rinku", $id)->first();
        $data->update([
            'sutattsu' => '0'
        ]);
        $pagination = 5;
        $data = ReferensiSTLUD::where("sutattsu", "1")->orderBy("id", "DESC")->paginate($pagination);
        $count = $data->CurrentPage() * $pagination - ($pagination - 1);
        foreach ($data as $items) {
            $items['nomor'] = $count;
            $count++;
        }
        return response()->json([
            'data' => $data
        ]);
    }
    public function stludSearch(Request $request)
    {
        //
        $pagination = 5;
        $data = ReferensiSTLUD::where("sutattsu", "1")->where("name", "like", "%" . $request->cari . "%")->orWhere(function ($query) use ($request) {
            $query->where("pangkat", "like", "%" . $request->cari . "%")->where("sutattsu", "1");
        })
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
}
