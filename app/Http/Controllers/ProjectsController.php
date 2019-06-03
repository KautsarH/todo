<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project As Project;
use \App\Mail\ProjectCreated;

class ProjectsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$projects = auth()->user()->projects;
        //$projects = Project::where('owner_id',auth()->id())->get();

        cache()->rememberForever('stats',function(){
            return ['lessons'=>1300, 'hours'=>50000,'series' => 100];
        });

       
        //dump($projects);
        //return $projects;
        //return view('projects.index', ['projects'=> $projects]);
        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);
    }

    public function show(Project $project)
    {

       // $twitter = app('twitter');
        //dd($twitter);
    	//abort_unless(auth()->user()->owns($project),403);
        //abort_if($project->owner_id !== auth()->id(), 403);
       //if (\Gate::denies('view', $project)){abort(443);}
        $this->authorize('view',$project);
        return view('projects.show', compact('project'));

    }

    public function create()
    {

    	return view('projects.create'); 
    }

    public function store()
    {
    	
    	$attributes = $this->validateProject();

        $attributes['owner_id'] = auth()->id();
        $project = Project::create($attributes);

         event(new ProjectCreated($project));
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
    	
     //    $this->authorize('view',$project);
    	// $title = request('title');
    	// $desc = request('description');

    	// //$project = Project::find($id);

    	// $project->title = $title;
    	// $project->description = $desc;
    	// $project->save();

        $project->update($this->validateProject());
    	return redirect('/projects');


    }

    public function destroy(Project $project)
    {
    	//$project = Project::find($id);
         $this->authorize('view',$project);
    	$project->delete(); 

    	return redirect('/projects');
    }

    function validateProject()
    {
        return request()->validate([
                    'title' => ['required','min:3', 'max:255'],
                    'description' => ['required','min:3','max:255']
                ]);

    }
}
