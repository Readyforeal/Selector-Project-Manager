<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function selections()
    {
        // Many to many relationship
        return $this->belongsToMany(Selection::class);
    }
}
