@extends('layouts.admin')

@section('content')
    <div class="container pt-4">
        <header class="mb-2">
            <h1>Technologies</h1>
            <a rel="stylesheet" href="{{ route('admin.technologies.create') }}" role="button" class="btn btn-primary">Add new technology</a>
        </header>
        @if (session('message'))
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Notification</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">slug</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->id }}</td>
                        <td>{{ $technology->title }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td class="text-end">
                            <a rel="stylesheet" href="{{ route('admin.technologies.edit', $technology) }}" role="button" class="btn btn-primary btn-sm">edit</a>
                            <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
