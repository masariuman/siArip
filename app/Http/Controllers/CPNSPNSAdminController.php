<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uuzaa;
use Illuminate\Support\Facades\Auth;
use App\Models\ReferensiStatusKepegawaian;
use App\Models\CPNSPNS;

class CPNSPNSAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // dd($id);
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
        $data['cpnspns'] = CPNSPNS::where('pegawai_id', $data['pegawai']['id'])->first();
        if ($data['cpnspns'] != null) {
            if ($data['cpnspns']['statusKepegawaian_id'] === null || $data['cpnspns']['statusKepegawaian_id'] === "") {
                $data['cpnspns']['statusKepegawaianText'] = "";
                $data['cpnspns']['statusKepegawaianrinku'] = "";
            } else {
                $data['cpnspns']['statusKepegawaianText'] = $data['cpnspns']->statusKepegawaian->name;
                $data['cpnspns']['statusKepegawaianrinku'] = $data['cpnspns']->statusKepegawaian->rinku;
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
        $data = $request->request->all();
        $cpns = CPNSPNS::where('rinku', $data['url'])->first();
        $pegawai = Uuzaa::where('id', $cpns['pegawai_id'])->first();
        $statusKepegawaian = ReferensiStatusKepegawaian::where('rinku',$data['statusKepegawaianText'])->first();
        // dd($data);
        if ($data['skCpns']===null || $data['skCpns']==='null' || $data['skCpns']==='undefined') {
            // dd('asd');
            $data['skCpns']="";
        }
        if ($data['tanggalSkCpns'] === null || $data['tanggalSkCpns']==='null' || $data['tanggalSkCpns']==='undefined') {
            // dd('asd');
            $data['tanggalSkCpns']=date('Y-m-d', time());
        }
        if ($data['tanggalSkCpns']===null ||  $data['tanggalSkCpns']==='null' || $data['tanggalSkCpns']==='undefined') {
            $data['tanggalSkCpns']=date('Y-m-d', time());
        }
        if ($data['tmtCpns']===null ||  $data['tmtCpns']==='null' ||$data['tmtCpns']==='undefined' ) {
            $data['tmtCpns']=date('Y-m-d', time());
        }
        if ($data['pejabatPenetapCpns']===null || $data['pejabatPenetapCpns']==='null'  || $data['pejabatPenetapCpns']==='undefined') {
            $data['pejabatPenetapCpns']="";
        }
        if ($data['skPns']===null || $data['skPns']==='null'  ||$data['skPns']==='undefined') {
            $data['skPns']="";
        }
        if ($data['tanggalSkPns']===null ||$data['tanggalSkPns']==='null'   ||$data['tanggalSkPns']==='undefined') {
            $data['tanggalSkPns']=date('Y-m-d', time());
        }
        if ($data['tmtPns']===null ||  $data['tmtPns']==='null' ||$data['tmtPns']==='undefined') {
            $data['tmtPns']=date('Y-m-d', time());
        }
        if ($data['nomorSttpl']===null || $data['nomorSttpl']==='null'  ||$data['nomorSttpl']==='undefined') {
            $data['nomorSttpl']="";
        }
        if ($data['tanggalSttpl']===null || $data['tanggalSttpl']==='null'  ||$data['tanggalSttpl']==='undefined' ) {
            $data['tanggalSttpl']=date('Y-m-d', time());
        }
        if ($data['nomorSpmt']===null ||  $data['nomorSpmt']==='null' ||$data['nomorSpmt']==='undefined' ) {
            $data['nomorSpmt']="";
        }
        if ($data['tanggalSpmt']===null ||  $data['tanggalSpmt']==='null' || $data['tanggalSpmt']==='undefined') {
            $data['tanggalSpmt']=date('Y-m-d', time());
        }
        if ($data['nomorPertekC2th']===null || $data['nomorPertekC2th']==='null'  ||$data['nomorPertekC2th']==='undefined' ) {
            $data['nomorPertekC2th']="";
        }
        if ($data['tanggalPertekC2th']===null || $data['tanggalPertekC2th']==='null'  || $data['tanggalPertekC2th']==='undefined') {
            $data['tanggalPertekC2th']=date('Y-m-d', time());
        }
        if ($data['nomorSkd']===null || $data['nomorSkd']==='null'  || $data['nomorSkd']==='undefined') {
            $data['nomorSkd']="";
        }
        if ($data['tanggalSkd']===null || $data['tanggalSkd']=== 'null' ||$data['tanggalSkd']==='undefined' ) {
            $data['tanggalSkd']=date('Y-m-d', time());
        }
        if ($data['karpeg']===null ||  $data['karpeg']==='null' || $data['karpeg']==='undefined') {
            $data['karpeg']="";
        }

        // dd($subbid);
        $cpns->update([
            'statusKepegawaian_id' => $statusKepegawaian->id,
            'nomorSkCpns' => $data['skCpns'],
            'tanggalSkCpns' => $data['tanggalSkCpns'],
            'tmtCpns' => $data['tmtCpns'],
            'namaPejabatPenetapCpns' => $data['pejabatPenetapCpns'],
            'nomorSkPns' => $data['skPns'],
            'tanggalSkPns' => $data['tanggalSkPns'],
            'tmtPns' => $data['tmtPns'],
            'nomorSttpl' => $data['nomorSttpl'],
            'tanggalSttpl' => $data['tanggalSttpl'],
            'nomorSpmt' => $data['nomorSpmt'],
            'tanggalSpmt' => $data['tanggalSpmt'],
            'nomorPertekC2th' => $data['nomorPertekC2th'],
            'tanggalPertekC2th' => $data['tanggalPertekC2th'],
            'nomorSkd' => $data['nomorSkd'],
            'tanggalSkd' => $data['tanggalSkd'],
            'karpeg' => $data['karpeg']
        ]);
        return response()->json([
            'data' => $pegawai
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
}
