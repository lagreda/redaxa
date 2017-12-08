<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function studentLanguages()
    {
        return $this->hasMany("App\StudentLanguage");
    }
}
