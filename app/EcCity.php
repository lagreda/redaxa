<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcCity extends Model
{
    public function province()
    {
        return $this->belongsTo("App\EcProvince");
    }
}
