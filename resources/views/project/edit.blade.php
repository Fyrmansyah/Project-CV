@extends('layout.admin')
@section('title','edit project')
@section('content-title','edit project')
@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="/mproject/{{$data->id}}" method="post" >
            @csrf      
            @method('PUT')
            <!-- <input type="hidden" name="id" value="{{$data->id}}">           -->
            <div class="form-group form-floating">
                <label>Nama</label>
                <input type="text" value="{{ $data->nama_project }}" class="form-control @error('nama_project') is-invalid @enderror" name="nama_project" />
                @error('nama_project')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ $data->deskripsi }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group form-floating">
                <label>Tanggal Project</label>
                <input type="date" value="{{ $data->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" />
                @error('tanggal')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="modal-footer">
                <a href="/mproject" class="btn btn-warning" ><i class="fa fa-reply"></i>&nbsp;Cancel</a>
                <button class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Tambah Project</button>
            </div>
        
        </form>
    </div>
</div>
 

@endsection