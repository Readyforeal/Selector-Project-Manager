<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        
        $authenticatedUserTeam = Auth::user()->currentTeam;

        // Get the highest order value from this teams global categories
        $categories = $authenticatedUserTeam->categories()->get();
        
        if(empty($categories))
        {
            $authenticatedUserTeam->categories()->create([
                'name' => $data['name'],
                'order' => 1
            ]);
        }
        else
        {
            $highest = $categories->max('order');
            $authenticatedUserTeam->categories()->create([
                'name' => $data['name'],
                'order' => $highest + 1
            ]);
        }

        return to_route('settings');

    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => '',
            'order' => 'integer',
        ]);
        
        $categories = Auth::user()->currentTeam->categories()->get();

        if($data['order'] != 0 && $data['order'] != $category->order && $data['order'] <= count($categories))
        {
            if($data['order'] > $category->order)
            {
                for($i = $category->order; $i < $data['order'] + 1; $i++)
                {
                    $categoryToChange = $categories->where('order', $i)->first();
                    $categoryToChange->order = $categoryToChange->order - 1;
                    $categoryToChange->save();
                }
                $category->update([
                    'order' => $data['order']
                ]);
            }
            else if($data['order'] < $category->order)
            {
                for($i = $category->order - 1; $i >= $data['order']; $i--)
                {
                    $categoryToChange = $categories->where('order', $i)->first();
                    $categoryToChange->order = $categoryToChange->order + 1;
                    $categoryToChange->save();
                }
                $category->update([
                    'order' => $data['order']
                ]);
            }
        }
        
        if($data['name'] != $category->name)
        {
            $category->update([
                'name' => $data['name']
            ]);
        }

        return to_route('settings');

    }

    public function destroy()
    {

    }
}
