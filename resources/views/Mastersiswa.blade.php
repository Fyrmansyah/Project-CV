@extends('layout.admin')
@section('title','Siswa')
@section('content-title','MasterSiswa')
@section('content')

<!-- Basic Card Example -->
@if(session()->has('success')) 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>           
@endif
<!-- MODAL DELETE DATA -->
@foreach ($datas as $deleteModal)
    <div class="modal fade" id="exampleModalCenter{{$deleteModal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">hapus data?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{$deleteModal->nama}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-reply"></i>&nbsp;Close</button>
                    <form action="msiswa/{{$deleteModal->id}}" method="post" style="display:inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger"><i class='fa fa-trash-o'></i>&nbsp;hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
  
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <a href=" {{route('msiswa.create')}}" class="btn btn-success m-1"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
            </div>
            
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class=" text-dark" style="background: linear-gradient(to left, #3366cc 0%, #66ffff 103%);">
                <tr>
                    
                    <th>No</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class=" text-dark" style="background: linear-gradient(to bottom, #ccccff 0%, #ffffff 100%);" >
            @foreach($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nisn}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->alamat}}</td>
              
                <td>
                    <a href="{{route('msiswa.show', $data -> id) }}" class="btn btn-sm btn-info btn-circle""> <i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="{{route('msiswa.edit', $data -> id) }}" class="btn btn-sm btn-warning btn-circle""> <i class="fa fa-pen" aria-hidden="true"> </i> </a>
               
                        <button data-toggle="modal" data-target="#exampleModalCenter{{$data->id}}"  class="btn btn-sm btn-danger btn-circle"> <i class='fas fa-trash'></i></button>
                    

                </td>
            </tr>


            @endforeach
           
            </tbody>
        </table>
    </div>
</div>
        </div>
    </div>
</div>



@endsection