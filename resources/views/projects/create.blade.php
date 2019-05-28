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
				<td><input type="text" name="ftitle"
				 placeholder="Project Title"></td>
			</tr>
			<tr>
				<td>Description :</td>
				<td><textarea name="fdesc" placeholder="Description"></textarea></td>
			</tr>
		</table>
		<tr>
			<td><button type="submit">Create Project</button></td>
		</tr>
	</form>	
</body>
</html>