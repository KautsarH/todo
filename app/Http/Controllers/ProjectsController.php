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

    public function show(Project $project)
    {
    	
    	return view('projects.show', compact('project'));

    }

    public function create()
    {

    	return view('projects.create'); 
    }

    public function store()
    {
    	
    	Project::create(request()->validate([
    	    		'title' => ['required','min:3', 'max:255'],
    	    		'description' => ['required','min:3','max:255']
    	    	]));


    	
    	//Project::create(request(['title','description']));


    	// Project::create([
    	// 	'title' => request('title'),
    	// 	'description' =>request('description')
    	// ]);

    	// $project = new Project;
    	// $project->title =request('title');
    	// $project->description = request('description');
	    // $project->save();

	    return redirect('/projects');
    }

    public function edit(Project $project)
    {
    	//$project = Project::findorfail($id);
    	return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
    	

    	$title = request('title');
    	$desc = request('description');

    	//$project = Project::find($id);

    	$project->title = $title;
    	$project->description = $desc;
    	$project->save();

    	return redirect('/projects');


    }

    public function destroy(Project $project)
    {
    	//$project = Project::find($id);

    	$project->delete(); 

    	return redirect('/projects');
    }


}
