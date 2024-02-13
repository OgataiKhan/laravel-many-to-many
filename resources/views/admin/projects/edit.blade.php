@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1>Edit Project</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ old('title', $project->title) }}">
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="technologies">Technologies</label>
                <input type="text" class="form-control" id="technologies" name="technologies"
                    value="{{ old('technologies', $project->technologies) }}">
            </div>
            <div class="form-group mb-3">
                <label for="url">Project URL</label>
                <input type="url" class="form-control" id="url" name="url" value="{{ old('url', $project->url) }}">
            </div>
            <div class="mb-3">
                <label for="type_id">Type</label>
                <select id="type_id" name="type_id" class="form-select">
                    <option selected>Select type...</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id', $project->type_id) == $type->id) selected @endif>{{ $type->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="image_url">Image URL</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="{{ old('image_url', $project->image_url) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
