@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead class="table-secondary">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Sumber</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Aksi</th>    
                </tr>
                </thead>
                <tbody>
                    @foreach($surat as $sur)
                        <tr>
                            <td>{{$sur->id}}</td>
                            <td>{{$sur->id_surat}}</td>
                            <td>{{$sur->tgl_surat}}</td>
                            <td>{{$sur->sbr_surat}}</td>
                            <td>{{$sur->jdl_surat}}</td>
                            <td>
                                <a href="{{asset ('file/'.$sur->nm_file)}}" class="btn btn-success" download="">download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
