@extends('layouts.surat')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>Kirim Surat</h3>
            <hr>
            <form action="/surat_masuk/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">No surat</label>
                    <input class="form-control" type="text" name="id_surat" placeholder="No surat" aria-label="default input example" required>
                </div>
                <div>
                    <label for="">Tanggal surat</label>
                    <input class="form-control" type="text" name="tgl_surat" value="<?php echo date('d-m-Y'); ?>" aria-label="default input example" readonly required>
                </div>
                <div>
                    <label for="">Sumber surat</label>
                    <input class="form-control" type="text" name="sbr_surat" placeholder="Sumber surat" aria-label="default input example" required>
                </div>
                <div>
                    <label for="">Judul surat</label>
                    <input class="form-control" type="text" name="jdl_surat" placeholder="Judul surat" aria-label="default input example" required>
                </div>
                <div class="mb-3">
                <label for="formFileSm" class="form-label">Masukkan file</label>
                <input class="form-control form-control-sm"  type="file" name="nm_file" id="nm_file" onchange="return validasiEkstensi()" required>
                </div>
                <div>
                    <label for="">kode surat</label>
                    <input class="form-control" type="text" name="kd_surat" placeholder="Kode surat" aria-label="default input example" required>
                </div>
                <div>
                    <input class="form-control" type="hidden" name="status" value="0" placeholder="status" aria-label="default input example">
                </div>
                <div>
                    <input class="form-control" type="hidden" name="file_balasan" value="-" placeholder="Kode surat" aria-label="default input example">
                </div>
                <br>
                <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
                <input type="reset" class="btn btn-danger" value="Reset">
            </form>
        </div>
    </div>
</div>
@endsection

