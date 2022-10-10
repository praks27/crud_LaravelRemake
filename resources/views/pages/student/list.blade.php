@extends('layouts.dashboard')
@section('content')

<a href="student/create" class="btn btn-success mb-2">Tambah Data</a>
<form action="{{ route("student.index") }}" method="GET">
<div class="row g-3 align-items-center pb-2">
    <div class="col-auto">
      <input type="text" id="search" name="search" value="{{ request("search") }}" class="form-control" placeholder="search Here" aria-describedby="passwordHelpInline" autocomplete="off">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-outline-success">search</button>
    </div>
    <div class="col-auto">
        <select name="filter" id="filter" class="form-select">
            <option selected value="">All</option>
            @foreach ($majors as $major)
                <option value="{{ $major->id }}" {{ request('filter') == $major->id ? 'selected' : '' }}>{{ $major->name }}</option>
            @endforeach
        </select>
    </div>
</div>

</form>
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
        <th scope="row">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</th>
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
  {{ $data->withQueryString()->links() }}
@endsection
