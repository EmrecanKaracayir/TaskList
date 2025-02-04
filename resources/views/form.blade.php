@extends("layouts.app")

@section("title", isset($task) ? "Edit Task" : "Create Task")

@section("content")
  <form method="POST"
    action="{{ isset($task) ? route("tasks.update", ["task" => $task->id]) : route("tasks.store") }}">
    @csrf
    @isset($task)
      @method("PUT")
    @endisset

    <div class="mb-4">
      <label for="title">Title</label>
      <input @class(["border-red-500" => $errors->has("title")]) type="text" id="title" name="title"
        value="{{ $task->title ?? old("title") }}">
      @error("title")
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="description">Description</label>
      <textarea @class(["border-red-500" => $errors->has("description")]) id="description" name="description" rows="5">{{ $task->description ?? old("description") }}</textarea>
      @error("description")
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="long_description">Long Description</label>
      <textarea @class(["border-red-500" => $errors->has("long_description")]) id="long_description" name="long_description" rows="10">{{ $task->long_description ?? old("long_description") }}</textarea>
      @error("long_description")
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex gap-2 items-center">
      <button class="btn" type="submit">
        @isset($task)
          Update Task
        @else
          Add Task
        @endisset
      </button>
      <a class="link" href="{{ route("tasks.index") }}">Cancel</a>
    </div>
  </form>
@endsection
