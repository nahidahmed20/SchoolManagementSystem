<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $guarded = ['id'];

    public function students()
    {
        return $this->hasMany(User::class, 'class_id', 'id');
    }
}
