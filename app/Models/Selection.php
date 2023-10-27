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

    public function selectionList() {
        return $this->belongsTo(SelectionList::class);
    }

    public function categories() {
        // Many to many relationship
        return $this->belongsToMany(Category::class);
    }

    public function locations() {
        // Many to many relationship
        return $this->belongsToMany(Location::class);
    }

    public function approval() {
        return $this->hasOne(Approval::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
