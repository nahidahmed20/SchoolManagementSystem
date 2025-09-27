<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\backend\ClassController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\backend\ParentController;
use App\Http\Controllers\backend\SchoolController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\SubjectController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\backend\ExaminationController;
use App\Http\Controllers\backend\ClassSubjectController;
use App\Http\Controllers\backend\ClassTimetableController;
use App\Http\Controllers\backend\AssignCalssTeacherController;

Route::get('/',[HomeController::class, 'index'] )->name('home');

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class,'store'])->name('permission.store');
    Route::get('/permission/{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/permission/{permission}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('/permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');

    Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class,'store'])->name('role.store');
    Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/{role}', [RoleController::class, 'update'])->name('role.update');
    Route::get('/role/{role}', [RoleController::class, 'destroy'])->name('role.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class,'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::resource('schools',SchoolController::class);

    Route::resource('teachers',TeacherController::class);

    Route::resource('classes',ClassController::class);

    Route::resource('subjects',SubjectController::class);
    Route::get('/my-subjects/show', [SubjectController::class, 'mySubjectShow'])->name('my-subject.index');

    Route::resource('class-subjects',ClassSubjectController::class);
    Route::get('/my-classes/show', [ClassSubjectController::class, 'myClassesShow'])->name('my-classes.index');

    Route::resource('class-teachers',AssignCalssTeacherController::class);
    Route::get('/class-subject/show', [AssignCalssTeacherController::class, 'classSubjectShow'])->name('my-classes.index');
    Route::get('/my-student/show', [AssignCalssTeacherController::class, 'myStudentShow'])->name('my-student.index');
    Route::get('/teacher-timetable/{class_id}', [AssignCalssTeacherController::class, 'teacherTimetable'])->name('teacher-timeTable');

    Route::resource('class-timetables',ClassTimetableController::class);
    Route::post('get-subjects',[ClassTimetableController::class, 'getSubjects'])->name('getSubjects');
    Route::get('/get-class-timetable', [ClassTimetableController::class, 'getClassTimetable'])->name('getClassTimetable');


    Route::resource('students',StudentController::class);

    Route::resource('parents',ParentController::class);
    Route::get('/parents/mystudents/{parent}', [ParentController::class, 'myStudents'])->name('parents.mystudents');
    Route::get('/add/mystudent/{student_id}/{parent_id}', [ParentController::class, 'addMyStudent'])->name('parents.addMyStudent');
    Route::get('parents/student-timetables/{id}', [ParentController::class,'studentTimetables'])->name('parentStudents.timeTable');

    Route::resource('examinations',ExaminationController::class);
    Route::get('/examination-shedules', [ExaminationController::class, 'examinationShedules'])->name('examination.shedule');
    Route::post('/get-class-subjects', [ExaminationController::class, 'getClassSubjects'])->name('getClassSubjects');
    Route::post('/exam-timetable/store', [ExaminationController::class, 'examTimetableStore'])->name('examTimetables.store');
});

require __DIR__.'/auth.php';
