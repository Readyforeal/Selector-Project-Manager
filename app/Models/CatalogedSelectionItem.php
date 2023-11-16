<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogedSelectionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'notes',
        'item_number',
        'supplier',
        'link',
        'image',
        'quantity',
        'dimensions',
        'finish',
        'color',
    ];

    public function team() {
        return $this->belongsTo(Team::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function selections() {
        return $this->belongsToMany(Selection::class);
    }
}
