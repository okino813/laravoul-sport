<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PracticeValue extends Model
{
    use HasFactory;

    protected $fillable = ['value_', 'id_practice', 'id_field'];

    public function practice()
    {
        return $this->belongsTo(Practice::class, 'id_practice');
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'id_field');
    }
}
