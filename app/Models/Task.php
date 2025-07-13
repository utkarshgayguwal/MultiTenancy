<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\FilterByUser;

class Task extends Model
{
    use FilterByUser;
    protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    // public static function booted(){
    //     static::creating(function(Task $task){
    //         $task->user_id = auth()->id();
    //     });

    //     static::addGlobalScope(function (Builder $builder){
    //         $builder->where('user_id', auth()->id());
    //     });
    // }
}
