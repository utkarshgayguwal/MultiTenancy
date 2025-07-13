<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    public function creating(Project $project)
    {
        $project->user_id = auth()->id();
    }
}