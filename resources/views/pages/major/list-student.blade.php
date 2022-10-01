@extends('layouts.dashboard')
@section('content')

<table class="table table-striped table-bordered">
    <h3>jurusan {{ $data->name }} </h3>
    {{-- cara menggunakan count --}}
    <h4>Jumlah Siswa :{{ $data->students->count() }}</h4>
    <h4>Jumlah Siswa :{{ count($data->students) }}</h4>
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Student Name</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data->students as $student)
            <tr>
                <th scope="col">{{ $loop->iteration }}</th></th>
                <td>{{ $student->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
