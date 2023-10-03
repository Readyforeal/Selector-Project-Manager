<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'needed',
        'name',
        'item_number',
        'supplier',
        'link',
        'image',
        'quantity',
        'dimensions',
        'finish',
        'color',
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    // public function categories() {
    //     return $this->belongsToMany(Category::class);
    // }

    // public function locations() {
    //     return $this->belongsToMany(Location::class);
    // }
}
