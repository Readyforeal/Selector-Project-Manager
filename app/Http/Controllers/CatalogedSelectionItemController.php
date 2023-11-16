<?php

namespace App\Http\Controllers;

use App\Models\CatalogedSelectionItem;
use App\Http\Requests\StoreCatalogedSelectionItemRequest;
use App\Http\Requests\UpdateCatalogedSelectionItemRequest;

class CatalogedSelectionItemController extends Controller
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
    public function store(StoreCatalogedSelectionItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CatalogedSelectionItem $catalogedSelectionItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatalogedSelectionItem $catalogedSelectionItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatalogedSelectionItemRequest $request, CatalogedSelectionItem $catalogedSelectionItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatalogedSelectionItem $catalogedSelectionItem)
    {
        //
    }
}
