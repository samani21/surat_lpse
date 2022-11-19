@extends('layouts.app')

@section('content')
<div class="container">
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
                    @foreach($surat as $sur)
                        <tr align="center">
                            <td><?php echo $sur['id'];?></td>
                            <td>{{$sur->id_surat}}</td>
                            <td>{{$sur->tgl_surat}}</td>
                            <td>{{$sur->sbr_surat}}</td>
                            <td>{{$sur->jdl_surat}}</td>
                            <td><?php if($sur['status']=='1'){
                               echo '<span class="badge bg-success">Sudah dibelas</span>';
                            }if($sur['status']=='0'){
                                echo '<span class="badge bg-danger">Belum dibelas</span>';
                             }?></td>
                            <td>
                                <a href="{{asset ('file/'.$sur->nm_file)}}" class="btn btn-success" download="">Download</a>
                                <a href="/surat_keluar/balasan/{{$sur->id}}" class="btn btn-primary">Balas</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
