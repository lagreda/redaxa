<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    protected $table = "job_status";

    public function students()
    {
        return $this->hasMany("App\Student");
    }
}
