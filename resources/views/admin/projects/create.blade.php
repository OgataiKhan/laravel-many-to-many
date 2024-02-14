@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1>Add New Project</h1>
        <a href="{{ route('admin.projects.index') }}" role="button" class="btn btn-info mb-3">Back to projects</a>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}" placeholder="New project">
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Project description...">{{ old('description') }}</textarea>
            </div>
            <div class="form-group mb-3">
                <div>
                    <label class="form-label">Technologies</label>
                </div>
                @foreach ($technologies as $technology)
                    <div class="form-check form-check-inline">
                        <input name="technologies[]" class="form-check-input" id="technology-{{ $technology->id }}" type="checkbox" value="{{ $technology->id }}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group mb-3">
                <label for="url">Project URL</label>
                <input type="url" class="form-control" id="url" name="url" value="{{ old('url') }}">
            </div>
            <div class="mb-3">
                <label for="type_id">Type</label>
                <select id="type_id" name="type_id" class="form-select">
                    <option selected>Select type...</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                            {{ $type->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="image_url">Image URL</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="{{ old('image_url') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
