@extends('layouts.dashboard')
@section('content')
    <div class="container">
    <h3>{{ $major->id ? 'Form Edit Data' : 'Form Input Data'}}</h3>
    @if ($major->id)
        <form action="{{ route('major.update',['major'=>$major->id]) }}" method="post">
            @method('PUT')
    @else
        <form action="{{ route('major.store')}}" method="post">
    @endif
        @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="enter your name here" value="{{ $major->name }}">
            </div>
            @error('name') <div class="text-muted">{{$message}}</div> @enderror
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" cols="10" rows="5">{{ $major->description }}</textarea>
            </div>
            @error('description') <div class="text-muted">{{$message}}</div> @enderror
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </div>
    </form>
@endsection
