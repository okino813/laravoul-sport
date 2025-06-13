<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'membres', 'id_group', 'id_user');
    }

    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'group_sport', 'id_group', 'id_sport');
    }

    public function practices()
    {
        return $this->hasMany(Practice::class, 'id_group');
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class, 'id_group');
    }
}

