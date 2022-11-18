<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index(){
        $surat = Surat::all();
        return view('surat_keluar.home',compact(['surat']));
    }

    public function create(){
        return view('surat_masuk.kirim');
    }

    public function store(Request $request){
        $surat = $request->nm_file;
        $namaFile = $surat->getClientoriginalName();
            $dtUpload = new Surat;
            $dtUpload->id_surat = $request->id_surat;
            $dtUpload->tgl_surat = $request->tgl_surat;
            $dtUpload->sbr_surat = $request->sbr_surat;
            $dtUpload->jdl_surat = $request->jdl_surat;
            $dtUpload->nm_file = $namaFile;
            $dtUpload->kd_surat = $request->kd_surat;

            $surat->move(public_path().'/file',$namaFile);
            $dtUpload->save();
            return redirect('/');

        // Surat::create($request->except(['_token','simpan']));
        // return redirect('/');
    }
}
