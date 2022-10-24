@extends('layout.admin')
@section('title','create kontak')
@section('content-title','create kontak')
@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        @if (session()->has('errors'))
            @foreach ($errors as $error)
                {{$error}}
            @endforeach
        @endif
        <form action="{{url('mkontak/store')}}" method="post" >
            @csrf      
            <input type="hidden" name="siswa_id" value="{{$data->id}}">  
            <label>Jenis</label>
            <select name="jenis_kontak" id="jenis_kontak" class="form-control">
                @foreach ($jenis as $item)
                <option value="{{$item->id}}">{{$item->jenis_kontak}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="modal-footer">
                <a href="/mkontak" class="btn btn-warning" ><i class="fa fa-reply"></i>&nbsp;Cancel</a>
                <button class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Tambah Kontak</button>
            </div>
        
        </form>
    </div>
</div>

@endsection