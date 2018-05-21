<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicHistory extends Model
{
    public function academicLevel()
    {
        return $this->belongsTo("App\AcademicLevel");
    }

    public function country()
    {
        return $this->belongsTo("App\Country");
    }

    public function student()
    {
        return $this->belongsTo("App\Student");
    }

    protected $fillable = [
        'title',
        'institution',
        'academic_level_id',
        'student_id',
    ];
}
