<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $fillable = ['class_id','subject_id','status','created_by'];

    public function classRelation()
    {
        return $this->belongsTo(Classes::class, 'class_id','id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class,'class_id','id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

}
