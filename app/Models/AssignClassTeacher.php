<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignClassTeacher extends Model
{
    protected $guarded = ['id'];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id','id');
    }

    public function subject()
    {
        return $this->hasMany(Subject::class,'subject_id','id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id')->where('is_admin',4)->where('status',1);
    }

    public function classSubject()
    {
        return $this->belongsTo(ClassSubject::class,'class_id','id');
    }
}
