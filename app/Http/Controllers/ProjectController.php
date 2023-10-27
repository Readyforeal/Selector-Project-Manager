<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->currentTeam->projects()->get();
        return view('projects', compact('projects'));
    }

    public function create()
    {
        return view('project.createProject');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => '',
        ]);

        $authenticatedUser = Auth::user();

        $project = $authenticatedUser->currentTeam->projects()->create($data);
        return to_route('project.view', ['project' => $project]);
    }

    public function show(Project $project)
    {
        return view('project.viewProject', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('project.editProject', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => '',
            'address' => '',
            'description' => ''
        ]);

        $data['name'] = ucwords(strtolower($data['name']));
        $data['description'] = ucwords(strtolower($data['description']));

        $project->update($data);
        
        return to_route('project.edit', ['project' => $project]);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('projects.index');
    }
}
