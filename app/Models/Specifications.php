<?php

namespace App\Models;

use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specifications extends Model
{
    use HasFactory;

    protected $fillable = ['completed', 'task_id'];
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }
}
