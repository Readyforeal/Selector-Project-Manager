<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SelectionList;
use Illuminate\Http\Request;

class SelectionListController extends Controller
{
    public function index(Project $project) {
        return view('selectionLists', compact('project'));
    }

    public function create(Project $project) {
        return view('selectionList.createSelectionList', compact('project'));
    }

    public function store(Request $request, Project $project) {
        $data = $request->validate([
            'name' => '',
        ]);

        $newSelectionList = $project->selectionLists()->create($data);
        return to_route('selectionList.view', ['project' => $project->id, 'selectionList' => $newSelectionList->id]);
    }

    public function show(Project $project, SelectionList $selectionList) {
        return view('selectionList.viewSelectionList', compact('project', 'selectionList'));
    }
}
