@extends('layout.admin')
@section('title','kontak')
@section('content-title','kontak siswa')
@section('content')

<div class="row">

    <div class="col-md-7">
        
         <div class="card shadow mb-6 ">
        
            <div class="card-header " style=" background: linear-gradient(to top left, #3366ff 0%, #cc00ff 100%););">               
                <h6 class="m-0 font-weight-bold text-white">  Data Siswa</h6>   
                </div>
                

             <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nisn</th>
                                <th>Nama Siswa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->nisn}}</td>
                                <td>{{$data->nama}}</td>
                                <td>
                    <a class="btn btn-sm btn-info btn-circle" onclick="show({{ $data->id }})"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
                    <a href=" {{url('mkontak/create', $data->id )}}" class="btn btn-sm btn-success btn-circle "><i class="fa fa-plus" aria-hidden="true"></i></a>
<!--                
                        <button data-toggle="modal" data-target="#exampleModalCenter{{$data->id}}"  class="btn btn-sm btn-danger btn-circle"> <i class='fas fa-trash'></i></button>
                     -->

                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
                
            </div>
            <div class="card-footer">
                
            {{ $datas->links() }}
            </div>  
        </div>
    </div>
    <div class="col-md-5">

        <div class="card shadow mb-6">
                <div class="card-header " style="  background: linear-gradient(to top right, #3366ff 0%, #cc00ff 100%););">
                    <h6 class="m-0 font-weight-bold text-white"> <i class="fas fa-tasks"> </i> KONTAK SISWA </h6>
                    </div>
                    <div  id="project" class="card-body">
                </div>
        </div>
    </div>
    
          
    
</div>

<script>
     function show(id){
        $.get('mkontak/'+id,function(data){
            $('#project').html(data);
        })
     }
</script>
@endsection