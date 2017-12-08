<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function programType()
    {
        return $this->belongsTo("App\ProgramType");
    }

    public function students()
    {
        return $this->hasMany("App\Student");
    }
}
