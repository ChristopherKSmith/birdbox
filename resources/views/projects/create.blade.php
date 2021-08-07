@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-normal m-5 text-center">Let's start something new</h1>
    <form method="POST" action="/projects" class="lg:w-1/2 lg:mx-auto bg-white py-12 px-16 rounded shadow">
        @csrf

        @include('projects._form', [
        'project' => new App\Project,
        'buttonText' => 'Create Project'
        ])
    </form>
@endsection
