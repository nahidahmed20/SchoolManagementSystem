<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by'); 
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
