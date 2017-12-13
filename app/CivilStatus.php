<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CivilStatus extends Model
{
    protected $table = "civil_status";

    public function students()
    {
        return $this->hasMany("App\Student");
    }
}
