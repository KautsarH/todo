<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
class ProjectTasksController extends Controller
{
    //
    public function update(Task $task)
    {
    	//dd(request()->all());

    	$task->update([
    		'completed' => request()->has('completed')
    	]);
    	return back();
    }

    public function store(Project $project)
    {
    	//$project->addTask(request('description'));
    	// Task::create([
    	// 	'project_id' => $project->id,
    	// 	'description' => request('description')
    	// ]);
    dd($project->id);
    	return back();
    }
}
