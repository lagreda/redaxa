<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingArea extends Model
{
    protected $table = "working_areas";

    public function workHistories()
    {
        return $this->hasMany("App\WorkHistory");
    }
}
