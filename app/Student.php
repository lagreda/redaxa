<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function program()
    {
        return $this->belongsTo("App\Program");
    }

    public function countryBirth()
    {
        return $this->belongsTo("App\Country", "country_id_birth");
    }

    public function countryResidence()
    {
        return $this->belongsTo("App\Country", "country_id_residence");
    }

    public function cityBirth()
    {
        return $this->belongsTo("App\EcCity", "ec_city_id_birth");
    }

    public function cityResidence()
    {
        return $this->belongsTo("App\EcCity", "ec_city_id_residence");
    }

    public function civilStatus()
    {
        return $this->belongsTo("App\CivilStatus");
    }

    public function bloodType()
    {
        return $this->belongsTo("App\BloodType");
    }

    public function gender()
    {
        return $this->belongsTo("App\Gender");
    }

    public function ethnicGroup()
    {
        return $this->belongsTo("App\EthnicGroup");
    }

    public function jobStatus()
    {
        return $this->belongsTo("App\JobStatus");
    }
}
