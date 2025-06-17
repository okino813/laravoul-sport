<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'user_id', 'sport_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'members', 'group_id', 'user_id');
    }

    public function sports()
{
    return $this->belongsToMany(Sport::class, 'groups_sport', 'group_id', 'sport_id');
}

    public function practices()
    {
        return $this->hasMany(Practice::class, 'group_id');
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class, 'group_id');
    }
}

