@extends('layout')

@section('content')
<h1>
	{{$project->title }}
</h1>
{{ $project->description }}
<br>
<button><a href="/projects/{{$project->id}}/edit">Edit & Delete</a></button>
<br>
@if ($project->tasks->count())


<div>
	@foreach ($project->tasks as $task)
	<form method="POST" action="/tasks/{{ $task->id}}">
		@method('PATCH')
		@csrf
	<label class="checkbox {{ $task->completed ? 'is-complete' : ''}}" for="completed">
		<input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
		{{ $task->description}}
	</label>
</form>
	@endforeach
</div>

@endif
<br>
			
	<form method="POST" action="/projects/{{$project->id}}/tasks">
		@csrf
		<h1> New Task</h1>
		<input type="text" name="description">
		<button>Add Task</button>
	</form>
@endsection