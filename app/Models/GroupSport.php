<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSport extends Model
{

    use HasFactory;

    protected $table = 'groups_sport'; // précise le nom exact de la table
    public $timestamps = false; // désactive created_at / updated_at si la table ne les contient pas

    protected $fillable = ['group_id', 'sport_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
