<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Project;
use App\Models\Selection;
use App\Models\SelectionList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SelectionController extends Controller
{
    public function index(Project $project, SelectionList $selectionList)
    {
        $selections = $selectionList->selections();
        return view('selections', compact('project', 'selections'));
    }

    public function show(Project $project, SelectionList $selectionList, Selection $selection)
    {
        return view('selection.viewSelection', compact('project', 'selectionList', 'selection'));
    }

    public function create(Project $project, SelectionList $selectionList)
    {
        return view('selection.createSelection', compact('project', 'selectionList'));
    }

    public function store(Request $request, Project $project, SelectionList $selectionList)
    {
        $data = $request->validate([
            'title' => 'required',
            'name' => '',
            'notes' => '',
            'item_number' => '',
            'supplier' => '',
            'link' => '',
            'image' => 'file|mimes:jpg,png,webp',
            'quantity' => '',
            'dimensions' => '',
            'finish' => '',
            'color' => '',
            'categories' => '',
            'locations' => '',
        ]);

        // Upload selection image
        $imagePath = '';
        if($request->hasFile('image'))
        {
            $imagePath = $data['image']->store(Auth::user()->currentTeam->name . "/selection-photos/uploads", "public");
            Image::make(public_path("storage/{$imagePath}"))->fit(500, 500)->save(public_path("storage/{$imagePath}"));
        }

        // Decode the selected categories and locations
        $data['categories'] = json_decode($data['categories'], true);
        $data['locations'] = json_decode($data['locations'], true);

        // Save the selection
        $newSelection = $selectionList->selections()->create([
            'title' => ucwords(strtolower($data['title'])),
            'name' => $data['name'],
            'notes' => $data['notes'],
            'item_number' => $data['item_number'],
            'supplier' => $data['supplier'],
            'link' => $data['link'],
            'image' => $imagePath,
            'quantity' => $data['quantity'],
            'dimensions' => $data['dimensions'],
            'finish' => $data['finish'],
            'color' => $data['color'],
        ]);

        // Sync categories to pivot
        foreach($data['categories'] as $categoryId)
        {
            $newSelection->categories()->sync($categoryId, false);
        }

        // Sync locations to pivot
        foreach($data['locations'] as $locationId)
        {
            $newSelection->locations()->sync($locationId, false);
        }

        return to_route('selectionList.view', ['project' => $project, 'selectionList' => $selectionList]);
    }

    public function edit(Project $project, SelectionList $selectionList, Selection $selection)
    {
        return view('selection.editSelection', ['project' => $project, 'selectionList' => $selectionList, 'selection' => $selection]);
    }

    public function update(Request $request, Project $project, SelectionList $selectionList, Selection $selection)
    {
        $data = $request->validate([
            'title' => 'required',
            'name' => '',
            'notes' => '',
            'item_number' => '',
            'supplier' => '',
            'link' => '',
            'image' => 'file|mimes:jpg,png,webp',
            'quantity' => '',
            'dimensions' => '',
            'finish' => '',
            'color' => '',
            'categories' => '',
            'locations' => ''
        ]);

        // Upload selection image
        $imagePath = $selection->selectionItem->image;
        if($request->hasFile('image'))
        {
            if($selection->selectionItem->image != '')
            {
                Storage::delete('public/' . $imagePath);
            }
            $imagePath = $data['image']->store(Auth::user()->currentTeam->name . "/selection-photos/uploads", "public");
            Image::make(public_path("storage/{$imagePath}"))->fit(500, 500)->save(public_path("storage/{$imagePath}"));
        }

        // Update the selection
        $selection->update([
            'title' => $data['title'],
        ]);

        // Update the selection item
        $selection->selectionItem->update([
            'name' => $data['name'],
            'notes' => $data['notes'],
            'item_number' => $data['item_number'],
            'supplier' => $data['supplier'],
            'link' => $data['link'],
            'image' => $imagePath,
            'quantity' => $data['quantity'],
            'dimensions' => $data['dimensions'],
            'finish' => $data['finish'],
            'color' => $data['color'],
        ]);
        
        // Decode selected categories and sync to pivot
        $data['categories'] = json_decode($data['categories'], true);
        $selectedCategoryIds = $data['categories'];
        $selection->selectionItem->categories()->sync($selectedCategoryIds);

        // Decode selected locations and sync to pivot
        $data['locations'] = json_decode($data['locations'], true);
        $selectedLocationIds = $data['locations'];
        $selection->locations()->sync($selectedLocationIds);

        return to_route('selection.view', ['project' => $project, 'selectionList' => $selectionList, 'selection' => $selection]);
    }

    public function approve(Request $request, Project $project, SelectionList $selectionList, Selection $selection)
    {
        $selection->approvals()->create([
            'user_id' => Auth::user()->id,
            'signature' => Auth::user()->name,
        ]);

        return to_route('selection.view', ['project' => $project, 'selectionList' => $selectionList, 'selection' => $selection]);
    }

    public function deleteApproval(Request $request, Project $project, SelectionList $selectionList, Selection $selection)
    {
        $selection->approval->delete();
        return to_route('selection.view', ['project' => $project, 'selectionList' => $selectionList, 'selection' => $selection]);
    }

    public function comment(Request $request, Project $project, SelectionList $selectionList, Selection $selection)
    {
        $data = $request->validate([
            'comment' => '',
        ]);

        Auth::user()->comments()->create([
            'selection_id' => $selection->id,
            'comment' => $data['comment'],
        ]);

        return to_route('selection.view', ['project' => $project, 'selectionList' => $selectionList, 'selection' => $selection]);
    }
}
