@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-grey text-sm font-normal">
                <a href="/projects">My Projects</a> / {{ $project->title }}
            </p>

            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">

                {{-- tasks --}}
                <div class="mb-8">

                    <h2 class="text-lg text-grey font-normal mb-3">Tasks</h2>

                    <div class="card mb-3">Loren ipsum.</div>
                    <div class="card mb-3">Loren ipsum.</div>
                    <div class="card mb-3">Loren ipsum.</div>
                    <div class="card">Loren ipsum.</div>
                </div>

                {{-- general notes --}}
                <div>
                    <h2 class="text-lg text-grey font-normal mb-3">General Notes</h2>

                    <textarea class="card w-full" style="min-height: 200px;">Loren ipsum.</textarea>
                </div>

            </div>

            <div class="lg:w-1/4 px-3">
                @include('projects._card')
            </div>
        </div>
    </main>
@endsection
