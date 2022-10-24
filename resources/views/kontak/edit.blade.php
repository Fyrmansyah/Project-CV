@extends('layout.admin')
@section('title','edit kontak')
@section('content-title','edit kontak')
@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="/mkontak/{{$data->id}}" method="post" >
            @csrf      
            @method('PUT')
            <input type="hidden" name="siswa_id" value="{{$data->siswa_id}}">   
            <div class="form-group form-floating">
                <label>Jenis</label>
                <select name="jenis_kontak" id="jenis_kontak" class="form-control">
                    @foreach ($jenis as $item)
                    <option value="{{$item->id}}">{{$item->jenis_kontak}}</option>
                    @endforeach
                </select>
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
            <div class="modal-footer">
                <a href="/mkontak" class="btn btn-warning" ><i class="fa fa-reply"></i>&nbsp;Cancel</a>
                <button class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Update</button>
            </div>
        
        </form>
    </div>
</div>

@endsection