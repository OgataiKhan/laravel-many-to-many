@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1>Edit Type</h1>
        <a href="{{ route('admin.types.index') }}" role="button" class="btn btn-info mb-3">Back to types</a>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.types.update', $type->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ old('title', $type->title) }}" placeholder="New type">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection