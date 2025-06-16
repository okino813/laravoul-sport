<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticeValue extends Model
{

    use HasFactory;

    protected $fillable = ['value', 'practice_id', 'field_id'];

    public function practice()
    {
        return $this->belongsTo(Practice::class, 'practice_id');
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }
}
