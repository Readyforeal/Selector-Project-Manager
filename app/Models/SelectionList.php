<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectionList extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function selections() {
        return $this->hasMany(Selection::class);
    }
}
