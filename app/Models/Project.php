<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function user(){
        $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function (Project $project) {
            $project->user_id = auth()->id();
        });
    }
}
