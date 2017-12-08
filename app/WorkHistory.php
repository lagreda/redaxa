<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{
    public function businessArea()
    {
        return $this->belongsTo("App\BusinessArea");
    }

    public function jobPosition()
    {
        return $this->belongsTo("App\JobPosition");
    }

    public function monthlyIncome()
    {
        return $this->belongsTo("App\MonthlyIncome");
    }

    public function country()
    {
        return $this->belongsTo("App\Country");
    }

    public function student()
    {
        return $this->belongsTo("App\Student");
    }
}
