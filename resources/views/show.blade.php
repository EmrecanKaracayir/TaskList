@extends("layouts.app")

@section("title", $task->title)

@section("content")
  <nav class="mb-4">
    <a class="link" href="{{ route("tasks.index") }}">← Go back</a>
  </nav>

  <p class="mb-4 text-slate-700">{{ $task->description }}</p>

  @if ($task->long_description)
    <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
  @endif

  <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} ・ Updated
    {{ $task->updated_at->diffForHumans() }}</p>

  <p @class([
      "mb-4 font-medium",
      "text-green-500" => $task->completed,
      "text-red-500" => !$task->completed,
  ])><span>{{ $task->completed ? "Completed" : "Not Completed" }}</span>
  </p>

  <div class="flex gap-2">
    <a class="btn" href="{{ route("tasks.edit", ["task" => $task->id]) }}">Edit</a>

    <form method="POST" action="{{ route("tasks.complete", ["task" => $task->id]) }}">
      @csrf
      @method("PUT")
      <button class="btn" type="submit">Mark as
        {{ $task->completed ? "not completed" : "completed" }}</button>
    </form>

    <form method="POST" action="{{ route("tasks.destroy", ["task" => $task->id]) }}">
      @csrf
      @method("DELETE")
      <button class="btn" type="submit">Delete Task</button>
    </form>
  </div>
@endsection
