@extends('layout')

@section('content')

	<h1>Edit Project</h1>

	<form method="POST" action="/projects/{{$project->id}}">

		{{ method_field('PATCH')}}
		{{ csrf_field() }}
		<table>
			<tr>
				<td>Title :</td>
				<td><input type="text" name="title" value="{{ $project->title }}"></td>
			</tr>
			<tr>
				<td>Description :</td>
				<td><textarea name="description">{{ $project->description }}</textarea></td>
			</tr>
			<tr>
				<td><button type="submit">Update Project</button></td>
			</tr>
		</table>
	</form>
	<form method="POST" action="/projects/{{ $project->id}}">
		<!-- {{ method_field('DELETE')}}
		{{ csrf_field() }} -->

		@method('DELETE')
		@csrf

		<button type="submit">Delete Project</button>
	</form>

@endsection