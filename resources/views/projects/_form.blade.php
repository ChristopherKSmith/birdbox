<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Title</label>

    <div class="control">
        <input type="text" class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full" name="title"
            required placeholder="My next awesome project" value="{{ $project->title }}">

    </div>
</div>

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="description">Description</label>

    <div class="control">
        <textarea name="description" rows="10"
            class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full" required
            placeholder="I should start learning piano.">{{ $project->description }}</textarea>
    </div>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="button">
            {{ $buttonText }}
        </button>
        <a href="{{ $project->path() }}">Cancel</a>
    </div>
</div>


@if ($errors->any())
    <div class="field mt-6">
        @foreach ($errors->all() as $error)
            <li class="text-sm text-red">{{ $error }}</li>
        @endforeach

    </div>
@endif
