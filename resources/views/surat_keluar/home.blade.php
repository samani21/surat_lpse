@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('surat_keluar/home')}}" method="get">
        <div class="container">
            <div class="row">
                <div class="col col-lg-10">
                <input class="form-control" type="text" name="cari" placeholder="Cari surat berdasarkan no surat" aria-label="default input example">
                </div>
                <div class="col col-lg-1">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
            </div>
        </form>
        <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead class="table-secondary">
                    <tr align="center">
                    <th scope="col">#</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Sumber</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>    
                </tr>
                </thead>
                <tbody>
                    @php 
                        $no=1;
                    @endphp
                    @foreach($surat as $sur)
                        <tr align="center">
                            <td>{{ $no++ }}</td>
                            <td>{{$sur->id_surat}}</td>
                            <td>{{$sur->tgl_surat}}</td>
                            <td>{{$sur->sbr_surat}}</td>
                            <td>{{$sur->jdl_surat}}</td>
                            <td align="center" ><?php if($sur->status =='1'){
                                echo '<span class="badge bg-success">Sudah dibelas</span>';
                             }if($sur->status =='0'){
                                 echo '<span class="badge bg-danger">Belum dibelas</span>';
                              }?></td>
                            <td align="right">
                                <a href="{{asset ('file/'.$sur->nm_file)}}" class="btn btn-success" download=""><i class="fa-sharp fa-solid fa-download"></i> Download</a>
                                <a href="/surat_keluar/balasan/{{$sur->id}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Balas</a>
                                <a href="hapussurat/{{$sur->id}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
