<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferensiAgama;
use App\Models\ReferensiUnor;
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
    public function unorStore(Request $request)
    {
        ReferensiUnor::create([
            'name' => $request->data,
            'rinku' => str_replace('#', 'o', str_replace('.', 'A', str_replace('/', '$', Hash::make(Hash::make(Uuid::generate()->string)))))
        ]);
        $data = ReferensiUnor::orderBy("id", "DESC")->first();
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
}
