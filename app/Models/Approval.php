<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'signature'];

    public function selection()
    {
        return $this->belongsTo(Selection::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
