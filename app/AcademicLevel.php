<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicLevel extends Model
{
    public function academicHistories()
    {
        return $this->hasMany("App\AcademicHistory");
    }
}
