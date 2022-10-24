@extends('layout.admin')
@section('title','show siswa')
@section('content-title','show siswa')
@section('content')
<div class="row">
   <div class="col-lg-4">
     <div class="card shadow mb-4">
     <div class="card-header " style=" background: linear-gradient(to left, #3366cc 0%, #66ffff 103%););">
     <h6 class="m-0 font-weight-bold text-dark"> <i class="fal fa-user"></i>&nbsp; PROFIL </h6>

        
    </div>
     <div class="card-body">
        <div class="text-center">
        <img src=" {{asset('/template/img/'.$siswa->foto )}}"width="200" height="200"class="rounded-circle my-4 mx-auto "> 
        </div>
     <br>
     <h6><i class="fas fa-list-ol"></i> &nbsp; {{$siswa->nisn}}</h6>
     <h6><i class="fas fa-user-circle"></i> &nbsp; {{$siswa->nama}}</h4>
     <h6>{{$siswa->jk}}</h6>
     <h6><i class="fas fa-street-view"></i> &nbsp; {{$siswa->alamat}}</h6>
  </div>
  
</div>   
<!-- Kontak -->
    <div class="card shadow mb-4">
    <div class="card-header " style=" background: linear-gradient(to left, #3366cc 0%, #66ffff 103%););">  
      <h6 class="m-0 font-weight-bold text-dark"> <i class="fal fa-id-card"></i> KONTAK </h6>
      </div>
       <div class="card-body ">
        @foreach ($kontaks as $kontak)
        <li>{{$kontak->jenis_kontak}} : {{$kontak->pivot->deskripsi}}</li>
        @endforeach
    </div>
  </div>
</div>
<!-- About -->
    <div class="col-lg-8">
       <div class="card shadow mb-4">
       <div class="card-header " style=" background: linear-gradient(to left, #3366cc 0%, #66ffff 103%););">
            <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-quote-left"> </i> ABOUT </h6>
           
           </div>
          <div class="card-body text-center">
            <blacquote class="blackquote text-center">
                <p class="m-0">{{$siswa->about}} </p>
                <footer class="blockquote-footer">DiTulis Oleh <cite title="Source Title">{{$siswa->nama}}</cite></footer>
            </blackquote>
  </div>
</div>   
     <div class="card shadow mb-4">
     <div class="card-header " style=" background: linear-gradient(to left, #3366cc 0%, #66ffff 103%););">
            <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-tasks"> </i> PROJECT </h6>
         </div>
        <div class="card-body">
      </div>
  </div>
</div>



     
 </div>



@endsection