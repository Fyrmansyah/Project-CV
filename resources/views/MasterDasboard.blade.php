@extends('layout.admin')
@section('title','Dasboard')
@section('content')


  <!-- Content Row -->
  <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-blue text-uppercase mb-1">
                       JUMLAH SISWA</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $Hasil }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        JUMLAH PROJECT</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$Hasil2}}</div>
                </div>
                <div class="col-auto">
               
                    <i class="fas fa-fw fa-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>



</div>

<!-- Content Row -->


@endsection