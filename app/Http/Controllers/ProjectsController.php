<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

const PROJECTS_LIST_ENDPOINT = '/console/projects/list';

class ProjectsController extends Controller
{
    // List all projects
    public function list()
    {
        return view('projects.list', [
            'projects' => Project::all()
        ]);
    }

    // Delete a project
    public function delete(Project $project)
    {
        $project->delete();
        return redirect(PROJECTS_LIST_ENDPOINT)
            ->with('success', "Project '$project->title' has been deleted.");
    }

    // Create a project
    public function create()
    {
        return view('projects.create');
    }

    // Store a project
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'type_id' => 'required|exists:types,id',
            'url' => 'required|url',
            'slug' => 'required|min:3|max:255|unique:projects,slug',
            'image' => 'url',
            'content' => 'required|min:3|max:65535',
            'user_id' => 'required|exists:users,id'
        ]);

        $project = new Project();

        $project->title = $request->input('title');
        $project->type_id = $request->input('type_id');
        $project->url = $request->input('url');
        $project->slug = $request->input('slug');
        $project->image = $request->input('image');
        $project->content = $request->input('content');
        $project->user_id = $request->input('user_id');

        $project->save();

        return redirect(PROJECTS_LIST_ENDPOINT)
            ->with('success', "Project '$project->title' has been created.");
    }
  
    // Edit a project
    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    // Update a project
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'type_id' => 'required|exists:types,id',
            'url' => 'required|url',
            'slug' => 'required|min:3|max:255|unique:projects,slug,'. $project->id,
            'image' => 'url|nullable',
            'content' => 'required|min:3|max:65535',
            'user_id' => 'required|exists:users,id'
        ]);

        $project->title = $request->input('title');
        $project->type_id = $request->input('type_id');
        $project->url = $request->input('url');
        $project->slug = $request->input('slug');
        $project->image = $request->input('image');
        $project->content = $request->input('content');
        $project->user_id = $request->input('user_id');

        $project->save();

        return redirect(PROJECTS_LIST_ENDPOINT)
            ->with('success', "Project '$project->title' has been updated.");
    }
}
