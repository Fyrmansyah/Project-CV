@extends('layout.admin')
@section('title','kontak')
@section('content-title','kontak siswa')
@section('content')

<div class="row">
    <div class="col-lg-12">    
        <div class="card shadow mb-4"> 
            <div class="card-header bg-brown">  
                <h6 class="m-0 font-weight-bold text-primary"> 
                    <a onclick="$('.formData').slideToggle();">
                        <i class="fa fa-plus " aria-hidden="true"></i>
                    </a> &nbsp;Jenis Kontak   
                </h6> 
            </div> 
       
            <!-- FORM CREATE TABLE -->
            <div class="panel-body formData p-3">
                <form class="form">
                    @csrf
                    <input type="hidden" id="id" name="id" value="">
                    <div class="form-group ">
                        <label>Jenis Kontak</label>
                        <input type="text" class="form-control" id="jenisKontak" name="jenisKontak"/>
                    </div>
                    <a class="btn btn-warning" onclick="cancel()"><i class="fa fa-reply"></i>&nbsp;Cancel</a>
                    <button class="btn btn-primary" onclick="reqKontak()"><i class="fa fa-save"></i>&nbsp;simpan Jenis</button>
                </form>
                
            </div>
            
            <div class="card-body"> 
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class=" " style= background: linear-gradient(to top left, #3366ff 0%, #cc00ff 100%););>
                            <tr>
                                <th width="2%" class="pl-3">#</th>
                                <th width="96%">Jenis Kontak</th>
                                <th width="2%" >action</th>
                            </tr>
                        </thead>
                        @foreach ($jenis as $data)
                        <tbody>
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <th>{{$data->jenis_kontak}}</th>
                                <th class="d-flex justify-content-center">
                                    {{-- <form action="/masterkontak/create" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <button type="submit" class="btn btn-circle btn-sm">
                                            <i class="fa fa-pen "></i>
                                        </button>
                                    </form> --}}
                                    <a onclick="updateJenis({{ $data->id }})" class="btn btn-circle btn-sm">
                                        <i class="fa fa-pen "></i>
                                    </a>
                                    <a onclick="deleteJenis({{ $data->id }})" class="btn btn-circle btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    
                                    <!-- <button data-toggle="modal" data-target=".bd-example-modal-centered-update{{$data->id}}" class="btn btn-circle btn-sm">
                                        <i class="fa fa-pen "></i>
                                    </button>    -->
                                </th>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div> 
        </div> 
    </div>
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
    
    window.onload = function() {+
        $('.formData').slideUp();
    }

    function cancel(){
        $('.formData').slideUp();
        $("#jenisKontak").val('')
        $(":hidden#id").val('')
    }

    function updateJenis(id){
        $.ajax({
            url: "/updatejenis",
            type:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{ id },
            success: res => {
                // console.log(res.data)
                    if(res.success){
                        $('.formData').slideDown();
                        $("#jenisKontak").val(res.data.jenis_kontak)
                        $("#id").val(res.data.id)
                    } 
            },
            error: error => {
                console.log(error)
            }
        });
    }

    function deleteJenis(id){
        if(confirm('hapus jenis ini?')){
            $.ajax({
                url: "/deletejenis/" + id,
                type:"POST",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: res =>{
                    // console.log(res)
                      if(res.success){
                        alert(res.messagge)
                        location.reload();
                      } 
                },
                error: error => {
                    console.log(error)
                }
            });
        }
    }
    function reqKontak(){
        event.preventDefault()

        let jenis = $("#jenisKontak").val()
        let id = $(":hidden#id").val();
        // console.log()

        if(jenis == "") {
            alert("jenis tidak boleh kosong")
        } else {
            $.ajax({
                url: "/addjenis",
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{ jenis, id},
                success: res =>{
                  console.log(res)
                if(res.success){
                    alert(res.messagge)
                    location.reload();
                } 
                },
                error: error => {
                console.log(error)
                }
            });
        } 
        
        
        
    }
     function show(id){
        $.get('mkontak/'+id,function(data){
            $('#project').html(data);
        })
     }
</script>
@endsection