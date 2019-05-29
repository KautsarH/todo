<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>My Projects</h1>
<table border="1">
    <tr>
        <td>Title</td>
        <td>Description</td>
        <td colspan="2">Further action</td>
        
    </tr>
    @foreach($projects as $project)
    <tr>
        <td>{{ $project->title}}</td>
        <td>{{ $project->description}}</td>
        <td><button><a href="/projects/{{$project->id}}">View</button></td>
        <td><button><a href="/projects/{{$project->id}}/edit">Further Action</button></td>
    </tr>
    @endforeach
</table>    
</body>
</html>