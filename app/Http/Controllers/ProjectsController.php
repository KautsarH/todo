<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project As Project;

class ProjectsController extends Controller
{
    //

    public function index()
    {
        $projects = Project::all();
        //return $projects;
        //return view('projects.index', ['projects'=> $projects]);
        return view('projects.index', compact('projects'));
    }

    public function show()
    {
    	$project = new Project;

    }

    public function create()
    {

    	return view('projects.create'); 
    }

    public function store()
    {
    	$project = new Project;
    	$project->title =request('ftitle');
    	$project->description = request('fdesc');

	    $project->save();

	    return redirect('/projects');
    }

    public function edit($id)
    {
    	$project = Project::findorfail($id);
    	return view('projects.edit', compact('project'));
    }

    public function update($id)
    {
    	$project = new Project;

    	$title = request('ftitle');
    	$desc = request('fdesc');

    	$projectID = Project::find($id);

    	$projectID->title = $title;
    	$projectID->description = $desc;
    	$projectID->save();

    	return redirect('/projects');


    }

    public function destroy($id)
    {
    	$projectID = Project::find($id);

    	$projectID->delete(); 

    	return redirect('/projects');
    }


}
