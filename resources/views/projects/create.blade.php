@extends('layouts.app')

@section('content')
<h1>Create a Project</h1>
<form method="POST" action="/projects" class="container">
    @csrf
    <input type="text" name="title">
    <input type="text" name="description">
    <button type="submit">Create Project</button>
    <a href="/projects">Cancel</a>
</form>
@endsection
