<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'task'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function specification()
    {
        return $this->hasOne(Specifications::class, 'task_id', 'id');
    }
}
