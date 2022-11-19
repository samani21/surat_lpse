<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Alert;

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
        $namaFile = time().rand(100,999).".".$surat->getClientOriginalExtension();
            $dtUpload = new Surat;
            $dtUpload->id_surat = $request->id_surat;
            $dtUpload->tgl_surat = $request->tgl_surat;
            $dtUpload->sbr_surat = $request->sbr_surat;
            $dtUpload->jdl_surat = $request->jdl_surat;
            $dtUpload->nm_file = $namaFile;
            $dtUpload->kd_surat = $request->kd_surat;
            $dtUpload->status = $request->status;
            $dtUpload->file_balasan = $request->file_balasan;

            $surat->move(public_path().'/file',$namaFile);
            $dtUpload->save();
            alert('Sukses','Simpan Data Berhasil', 'success');
            return redirect('/');
        // Surat::create($request->except(['_token','simpan']));
        // return redirect('/');
    }

    public function edit($id){
        $surat = Surat::find($id);
        return view('surat_keluar.balasan',compact(['surat']));
    }

    public function update(Request $request, $id){
        $ubah = Surat::findorfail($id);
        $surat = $request->file_balasan;
        $nama_file = time().rand(100,999).".".$surat->getClientOriginalExtension();
        $dt =[
            'id_surat' => $request['id_surat'],
            'tgl_surat' => $request['tgl_surat'],
            'sbr_surat' => $request['sbr_surat'],
            'jdl_surat' => $request['jdl_surat'],
            'nm_file' => $request['nm_file'],
            'kd_surat' => $request['kd_surat'],
            'status' => $request['status'],
            'file_balasan' => $nama_file,
        ];
        $request->file_balasan->move(public_path().'/file/balasan',$nama_file);
        $ubah->update($dt);
        return redirect('home');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$surat = DB::table('tb_surat')
		->where('tgl_surat','like',"%".$cari."%",'')
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('welcome',compact(['surat']));
 
	}
    
}
