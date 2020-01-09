<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        // model + optional parametres -> linking table, foreign key, other key
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
}
