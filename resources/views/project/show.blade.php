
@if ($project->isEmpty())
<h6>Siswa Belum Memiliki Project</h6>
@else
@foreach($project as $item)
 <div class="card">
    <div class="card-header">
        <strong>{{$item->nama_project}}</strong>
    </div>

    <div class="card-body"> 
        
        <strong>Tanggal Project : </strong>
        <p>{{$item->tanggal}}</p>
        <strong> Deskripsi : </strong>
        <p>{{$item->deskripsi}}</p>

    </div>

    <div class="card-footer d-flex">

    <a href="{{route('mproject.edit', $item ->id)}}" class="btn btn-sm btn-warning btn-circle mr-3"><i class="fas fa-edit"></i>
    </a>
    <form action="/mproject/{{$item->id}}" method="post" >
        @csrf      
        @method('DELETE')
        <button class="btn btn-sm btn-danger btn-circle"><i class="fa fa-edit"></i></button>
    </form>
    <!-- <a href="{{route ('mproject.destroy', $item ->id)}}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a> -->
    </div>
 </div>
@endforeach
@endif
