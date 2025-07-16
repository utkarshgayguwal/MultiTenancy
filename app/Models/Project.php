<?php

namespace App\Models;

use App\FilterByTenant;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Observers\ObservedBy; 
use App\Observers\ProjectObserver; 
use Illuminate\Database\Eloquent\Builder;
use App\FilterByUser;

// #[ObservedBy(ProjectObserver::class)]
class Project extends Model
{
    use FilterByTenant;
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // protected static function booted()
    // {
    //     static::creating(function (Project $project) {
    //         $project->user_id = auth()->id();
    //     });

    //     static::addGlobalScope(function (Builder $builder){
    //         $builder->where('user_id', auth()->id());
    //     });
    // }
}
