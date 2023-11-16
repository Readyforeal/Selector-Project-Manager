<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order'];

    public function team() {
        return $this->belongsTo(Team::class);
    }

    public function catalogedSelectionItems() {
        return $this->belongsToMany(CatalogedSelectionItem::class);
    }

    public function selectionItems() {
        return $this->belongsToMany(SelectionItem::class);
    }
}
