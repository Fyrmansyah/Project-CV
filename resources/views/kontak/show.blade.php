
@if ($kontak->isEmpty())
<h6> Siswa Belum Memiliki Kontak</h6>
@else
@foreach($kontak as $item)
 <div class="card">
    <div class="card-header">
        <strong>{{$item->jenis_kontak}}</strong>
    </div>

    <div class="card-body"> 
        <strong> Deskripsi : </strong>
        <p>{{$item->pivot->deskripsi}}</p>

    </div>

    <div class="card-footer d-flex">
    <a href="{{route('mkontak.edit', $item->pivot->id)}}" class="btn btn-sm btn-warning btn-circle mr-3"><i class="fas fa-edit"></i></a>
    <form action="{{ route('mkontak.destroy', $item->pivot->id )}}" method="post" >
        @csrf      
        @method('DELETE')
        <button class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></button>
    </form>
    {{-- <a href="{{route ('mkontak.destroy', $item->id)}}"><i class="fas fa-trash"></i></a> --}}
    </div>
 </div>
@endforeach
@endif
