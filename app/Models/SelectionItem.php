<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectionItem extends Model
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
    
    public function selection() {
        return $this->belongsTo(Selection::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
