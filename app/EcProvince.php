<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcProvince extends Model
{
    public function cities()
    {
        return $this->hasMany("App\EcCity");
    }
}
