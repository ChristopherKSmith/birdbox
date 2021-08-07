@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-normal m-5 text-center">Edit Your Project</h1>
    <form method="POST" action="{{ $project->path() }}" class="lg:w-1/2 lg:mx-auto bg-white py-12 px-16 rounded shadow">
        @csrf
        @method('PATCH')

        @include('projects._form', [
        'buttonText' => 'Update Project'
        ])
    </form>
@endsection
