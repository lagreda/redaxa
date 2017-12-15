<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramAfterEspae extends Model
{
    protected $table = "programs_after_espae";

    public function student()
    {
        return $this->belongsTo("App\Student");
    }
}
