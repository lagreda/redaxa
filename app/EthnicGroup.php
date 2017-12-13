<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EthnicGroup extends Model
{
    public function students()
    {
        return $this->hasMany("App\Student");
    }
}
