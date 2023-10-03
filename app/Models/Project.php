<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address'];

    //hasMany Categories

    //hasMany Locations

    public function selections()
    {
        return $this->hasMany(Selection::class);
    }
}
