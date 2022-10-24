@extends('layout.admin')
@section('title','create project')
@section('content-title','create project \ ' .$data->nama )
@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="/mproject" method="post" >
            @csrf      
            <input type="hidden" name="id" value="{{$data->id}}">          
            <div class="form-group form-floating">
                <label>Nama</label>
                <input type="text" value="{{ old('nama_project') }}" class="form-control @error('nama_project') is-invalid @enderror" name="nama_project" />
                @error('nama_project')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group form-floating">
                <label>Tanggal Project</label>
                <input type="date" value="{{ old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" />
                @error('tanggal')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="modal-footer">
                <a href="/masterproject" class="btn btn-warning" ><i class="fa fa-reply"></i>&nbsp;Cancel</a>
                <button class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Tambah Project</button>
            </div>
        
        </form>
    </div>
</div>
 

@endsection