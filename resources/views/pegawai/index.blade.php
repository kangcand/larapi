@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Pegawai
                <div class="panel-title pull-right"><a href="{{route('pegawai.create')}}"> Tambah </a></div>
                </div>

                <div class="panel-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Posisi</th>
                          <th scope="col">Gaji</th>
                          <th scope="col" colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $no = 1; @endphp
                        @foreach($pegawai as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->posisi}}</td>
                            <td>Rp {{number_format($data->gaji,2)}}</td>
                            <td><a class="btn btn-warning" href="{{route('pegawai.edit',$data->id)}}">Edit</a></td>
                             <td>
                                {!! Form::model($data, ['route' => ['pegawai.destroy', $data->id], 'method' => 'delete'] ) !!}
                                {!! Form::button('Delete',['type' => 'submit','class'=>'btn btn-danger'])!!}
                                {!! Form::close()!!}

                             </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <center>{{$pegawai->links()}}</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
