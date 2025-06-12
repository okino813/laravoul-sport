<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['name', 'value_', 'id_unit'];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit');
    }

    public function competitionValues()
    {
        return $this->hasMany(CompetitionValue::class, 'id_field');
    }

    public function practiceValues()
    {
        return $this->hasMany(PracticeValue::class, 'id_field');
    }
}
