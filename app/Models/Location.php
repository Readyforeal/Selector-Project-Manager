<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function selections()
    {
        // Many to many relationship
        return $this->belongsToMany(Selection::class);
    }
}
