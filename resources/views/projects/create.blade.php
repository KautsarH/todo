<!DOCTYPE html>
<html>
<head>
	<title>Create Project</title>
</head>
<body>
	<form method="POST" action="/projects">		
		{{ csrf_field() }}
		<table>
			<tr>
				<td>Title :</td>
				<td><input type="text" name="title"
				 placeholder="Project Title" class="input {{ $errors->has('title') ? 'is-danger' : ''}}" value="{{ old('title')}}"></td>
			</tr>
			<tr>
				<td>Description :</td>
				<td><textarea name="description" placeholder="Description" class="input {{ $errors->has('description') ? 'is-danger' : ''}}" >{{ old('description')}}</textarea></td>
			</tr>
		
		<tr>
			<td><button type="submit">Create Project</button></td>
		</tr>
		</table>

	@if ($errors->any())
	<div class="notification is-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	</form>	
</body>
</html>