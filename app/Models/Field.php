<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'unit_id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function competitionValues()
    {
        return $this->hasMany(CompetitionValue::class, 'field_id');
    }

    public function practiceValues()
    {
        return $this->hasMany(PracticeValue::class, 'field_id');
    }
}
