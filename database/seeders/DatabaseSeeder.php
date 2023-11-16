<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CatalogedSelectionItem;
use App\Models\Category;
use App\Models\Location;
use App\Models\Project;
use App\Models\Selection;
use App\Models\SelectionItem;
use App\Models\SelectionList;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@test.com',
        // ]);

        Category::factory()->count(50)->sequence(fn ($sequence) => ['order' => $sequence->index + 1])->create();
        Project::factory(1)->create();
        CatalogedSelectionItem::factory(50);
        Location::factory(10)->create();
        SelectionList::factory(1)->create();
        Selection::factory(50)->create();
        SelectionItem::factory()->count(50)->sequence(fn ($sequence) => ['selection_id' => $sequence->index + 1])->create();
    }
}
