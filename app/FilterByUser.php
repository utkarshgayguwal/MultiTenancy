<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait FilterByUser
{
    public static function booted(){
        static::creating(function($model){
            $model->user_id = auth()->id();
        });

        static::addGlobalScope(function (Builder $builder){
            $builder->where('user_id', auth()->id());
        });
    }
}
