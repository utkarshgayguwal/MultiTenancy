<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Observers\ObservedBy; 
use App\Observers\ProjectObserver; 

#[ObservedBy(ProjectObserver::class)]
class Project extends Model
{
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // protected static function booted()
    // {
    //     static::creating(function (Project $project) {
    //         $project->user_id = auth()->id();
    //     });
    // }
}
