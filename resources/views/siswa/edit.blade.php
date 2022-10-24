@extends('layout.admin')
@section('title','edit siswa')
@section('content-title','edit siswa')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">

                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $item)
                            <li>{{$item}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
         
            <form action="/msiswa/{{$data->id}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input value="{{$data->nama}}" type="text" class="form-control" id="nama" name='nama'>
                </div>
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input value="{{$data->nisn}}" type="text" class="form-control" id="nisn" name='nisn'>
                </div>
                <div class="form-group">
                    <label for="alamat">ALAMAT</label>
                    <input value="{{$data->alamat}}" type="text" class="form-control" id="alamat" name='alamat'>
                </div>
                <div class="form-group">
                    <label for="jk">JENIS KELAMIN</label>
                    <select class="form select form-control" id="jk" name='jk'>
                        <option value="laki-laki" @if($data->jk == 'laki-laki') selected @endif>LAKI-LAKI</option>
                        <option value="perempuan" @if($data->jk == 'perempuan') selected @endif>PEREMPUAN</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">FOTO SISWA</label>
                    <img src="{{asset('/template/img/'.$data->foto)}}" alt="" width="300" 
                    class="storage-thumnail">
                    <input type="file" class="form-control-file" id="foto" name='foto'>
                </div>
                <div class="form-group">
                    <label for="about">ABOUT</label>
                    <textarea class="form-control" id="about" name='about'>{{$data->about}}</textarea>
                </div>
                <div class="form-group">
                    <a href="{{ route('msiswa.index')}}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                
            </form>
            </div>
        </div>
    </div>
</div>


@endsection