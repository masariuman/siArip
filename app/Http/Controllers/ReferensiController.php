<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferensiAgama;
use App\Models\ReferensiUnor;
use App\Models\ReferensiBidang;
use App\Models\ReferensiSubBidang;
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
            $data = ReferensiBidang::where("name", "like", "%" . $request->cari . "%")
                ->orWhereIn("refUnor_id",$unorId)
                ->orderBy("id", "DESC")->where("sutattsu", "1")->paginate($pagination);
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
            // $bidang = ReferensiBidang::where("name", "like", "%" . $request->cari . "%")->get();
            // $bidangId = [];
            // foreach ($bidang as $key => $value) {
            //     array_push($bidangId,$value->id);
            // }
            $unor = ReferensiUnor::where("name", "like", "%" . $request->cari . "%")->where("sutattsu", "1")->get();
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
            $data = ReferensiSubBidang::where("sutattsu", "1")->where("name", "like", "%" . $request->cari . "%")
                ->orWhereIn("refBidang_id",$bidangId)
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
}
