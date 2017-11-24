@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Pegawai
                <div class="panel-title pull-right"><a href="{{URL::previous() }}"> Kembali </a></div>
                </div>

                <div class="panel-body">
                   <form action="{{ route('pegawai.update',$pegawai->id) }}" method="post">
                     <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}
                     <div class="form-group">
                       <label class="control-label">Nama</label>
                       <input type="text" name="nama" value="{{$pegawai->nama}}" class="form-control" required="">
                     </div>
                     <div class="form-group">
                     <label class="control-label">Posisi</label>
                       <input type="text" name="posisi" value="{{$pegawai->posisi}}" class="form-control" required="">
                     </div>
                     <div class="form-group">
                     <label class="control-label">Gaji</label>
                       <input type="number" name="gaji" value="{{$pegawai->gaji}}" class="form-control" required="">
                     </div>

                     <div class="form-group">
                        <button type="submit" class="btn btn-info">Simpan</button>
                     </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
