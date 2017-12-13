<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyIncome extends Model
{
    public function workHistories() 
    {
        return $this->hasMany("App\WorkHistory", "business_area_id");
    }
}
