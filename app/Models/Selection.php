<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function selectionList() {
        return $this->belongsTo(SelectionList::class);
    }

    public function selectionItem() {
        return $this->hasOne(SelectionItem::class);
    }

    public function locations() {
        return $this->belongsToMany(Location::class);
    }

    public function approvals() {
        return $this->hasMany(Approval::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
