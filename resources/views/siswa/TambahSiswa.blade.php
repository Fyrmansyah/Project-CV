@extends('layout.admin')
@section('title', 'TambahSiswa')
@section('content-title', 'TambahSiswa')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ ('route(mastersiswa.store')}}"></form>
                <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input type="text" class="form-control" id="nama" name='nama'>
                </div>
                <div class="form-group">
                    <label for="nama">NISN</label>
                    <input type="text" class="form-control" id="nama" name='nisn'>
                </div>
                <div class="form-group">
                    <label for="nama">ALAMAT</label>
                    <input type="text" class="form-control" id="nama" name='alamat'>
                </div>
                <div class="form-group">
                    <label for="nama">ALAMAT</label>
                    <input type="text" class="form select form-control" id="jk" name='jk'>
                    <option value="laki-laki">LAKI-LAKI</option>
                    <option value="perempuan">PEREMPUAN</option>
                </div>
            </div>
        </div>
    </div>
</div>