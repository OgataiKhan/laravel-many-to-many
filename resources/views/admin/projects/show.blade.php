@extends('layouts.admin')

@section('content')
    <div class="container pt-4">
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>
        <p>Type: {{ $project->type->title ?? 'None' }}</p>
        <div>
            Technologies used: 
            @if ($project->technologies->isEmpty())
                not specified
            @else
                <ul>
                    @foreach ($project->technologies as $technology)
                        <li>{{ $technology->title }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div>
            <img src="{{ asset('storage/'.$project->image_path) }}" class="img-fluid" alt="{{ $project->title }}">
        </div>
        <a href="{{ route('admin.projects.index') }}" role="button" class="btn btn-primary mb-3">Projects list</a>
    </div>
@endsection
