<?php

namespace App\Http\Controllers;

use App\Models\SelectionItem;
use App\Http\Requests\StoreSelectionItemRequest;
use App\Http\Requests\UpdateSelectionItemRequest;

class SelectionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSelectionItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SelectionItem $selectionItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SelectionItem $selectionItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSelectionItemRequest $request, SelectionItem $selectionItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SelectionItem $selectionItem)
    {
        //
    }
}
