@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1>Add New Technology</h1>
        <a href="{{ route('admin.technologies.index') }}" role="button" class="btn btn-info mb-3">Back to technologies</a>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}" placeholder="New technology">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
