@extends('layouts.dashboard')
@section('content')
<h3>{{ $student->id ? 'Form Edit Data' : 'Form Input Data'}}</h3>
@if ($student->id)
    <form action="{{ route('student.update',['student'=>$student->id]) }}" method="post">
        @method('PUT')
@else
    <form action="{{ route('student.store')}}" method="post">
@endif
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="enter your name here" value="{{ $student->name }}">
    </div>
    @error('name') <div class="text-muted">{{$message}}</div> @enderror
    <div class="mb-3">
      <label for="date" class="form-label">Date birth</label>
      <input type="date" class="form-control" id="date_birth" name="date_birth" value="{{ $student->date_birth }}">
    </div>
    @error('date_birth') <div class="text-muted">{{$message}}</div> @enderror
    <div class="mb-3">
      <label for="gender" class="form-label">Gender</label>
        <select name="gender" class="form-control" id="gender">
            <option disabled selected>--choose your gender--</option>
            <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>male</option>
            <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>female</option>
        </select>
    </div>
    @error('gender') <div class="text-muted">{{$message}}</div> @enderror
    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <textarea name="address" class="form-control" id="address" rows="10" cols="20">{{$student->address}}</textarea>
    </div>
    @error('address') <div class="text-muted">{{$message}}</div> @enderror
    <div class="mb-3">
      <label for="major" class="form-label">Major</label>
        <select name="major_id" class="form-control" id="major">
            <option selected disabled>--choose your major--</option>
            @foreach ($majors as $major)
                <option value="{{ $major->id }}">{{ $major->name }}</option>
            @endforeach
        </select>
    </div>
    @error('major') <div class="text-muted">{{$message}}</div> @enderror
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-outline-success">Submit</button>
  </form>
@endsection
