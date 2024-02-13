@extends('layouts.admin')

@section('content')
    <div class="container pt-4">
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>
        <p>Type: {{ $project->type->title ?? 'None' }}</p>
        <a href="{{ route('admin.projects.index') }}" role="button" class="btn btn-primary">Projects list</a>
    </div>
@endsection
