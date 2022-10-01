@extends('layouts.dashboard')
@section('content')

<a href="student/create" class="btn btn-success mb-2">Tambah Data</a>
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
        <th scope="col">Date Birth</th>
        <th scope="col">Gender</th>
        <th scope="col">Address</th>
        <th scope="col">Major</th>
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
        <td>{{ $list->date_birth }}</td>
        <td>{{ $list->gender }}</td>
        <td>{{ $list->address }}</td>
        {{-- ditambahkan name karna untuk memanggil name dari table major yang sebabnya sudah ada belongsto --}}
        <td>{{ $list->major->name }}</td>
        <td>
            <a href="{{route('student.edit',['student'=>$list->id]) }}" class="btn btn-warning">Edit</a>
            {{-- untuk hapus data di table --}}
            <form action="{{route('student.destroy',['student'=>$list->id])}}" class="d-inline" method="POST">
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
