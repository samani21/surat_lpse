@extends('layouts.surat')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>Balasan Surat</h3>
            <hr>
            <form action="/surat_masuk/{{$surat->id}}" method="POST" enctype="multipart/form-data">
                
                @csrf
                <div>
                    <label for="">No surat</label>
                    <input class="form-control" type="text" name="id_surat" value="{{$surat->id_surat}}" aria-label="default input example" required>
                </div>
                <div>
                    <label for="">Tanggal surat</label>
                    <input class="form-control" type="text" name="tgl_surat" value="{{$surat->tgl_surat}}" readonly aria-label="default input example" required>
                </div>
                <div>
                    <label for="">Sumber surat</label>
                    <input class="form-control" type="text" name="sbr_surat" value="{{$surat->sbr_surat}}"  aria-label="default input example" required>
                </div>
                <div>
                    <label for="">Judul surat</label>
                    <input class="form-control" type="text" name="jdl_surat" value="{{$surat->jdl_surat}}"  aria-label="default input example" required>
                </div>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Masukkan file</label>
                    <input class="form-control form-control-sm" id="nm_file" onchange="return validasiEkstensi()" type="file" name="nm_file" id="file_balasan" value="{{$surat->nm_file}}" required>
                    </div>
                <div>
                    <input class="form-control" type="hidden" name="status" value="0"  aria-label="default input example" >
                </div>
                <div class="mb-3">
                <input class="form-control form-control-sm" id="formFileSm" type="hidden" name="file_balasan" id="file_balasan" value="{{$surat->file_balasan}}" required>
                </div>
                <div>
                    <label for="">kode surat</label>
                    <input class="form-control" type="text" name="kd_surat" value="{{$surat->kd_surat}}"  aria-label="default input example">
                </div>
                <br>
                <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
                <input type="reset" class="btn btn-danger" value="Reset">
            </form>
        </div>
    </div>
</div>
@endsection