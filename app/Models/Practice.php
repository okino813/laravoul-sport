<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $fillable = ['date_', 'id_group', 'id_user'];

    public function group()
    {
        return $this->belongsTo(Group::class, 'id_group');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function values()
    {
        return $this->hasMany(PracticeValue::class, 'id_practice');
    }
}

