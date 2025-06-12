<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetitionValue extends Model
{
    use HasFactory;

    protected $fillable = ['value_', 'id_competition', 'id_field'];

    public function competition()
    {
        return $this->belongsTo(Competition::class, 'id_competition');
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'id_field');
    }
}
