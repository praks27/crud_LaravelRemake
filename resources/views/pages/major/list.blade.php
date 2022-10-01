@extends('layouts.dashboard')
@section('content')

<a href="major/create" class="btn btn-success mb-2">Tambah Data</a>
{{-- untuk menghide dan memunculkan alert --}}
@if ( $message = Session::get('notif'))
    <div class="alert alert-success" role="alert">
        {{$message}}
    </div>
@endif

<table class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $list)
        <tr>
            {{-- untuk generate nomer urut otomatis --}}
            <th scope="row">{{ $loop->iteration }}</th>
            {{-- untuk memanggil data dari database dan di tampilkan --}}
            <td>{{ $list->name }}</td>
            <td>{{ $list->description }}</td>
            <td>
                <a href="{{route('major.show',['major'=>$list->id]) }}" class="btn btn-warning">Student</a>
                <a href="{{route('major.edit',['major'=>$list->id]) }}" class="btn btn-warning">Edit</a>
                {{-- untuk hapus data di table --}}
                <form action="{{route('major.destroy',['major'=>$list->id])}}" class="d-inline" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-success">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
    </tbody>
</table>
@endsection
