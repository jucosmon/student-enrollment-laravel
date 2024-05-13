<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'sex',
        'year_level',
        'birthday',
        'program_id'

    ];
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function enrollments(): BelongsToMany
    {
        return $this->belongsToMany(Enrollment::class);
    }

    public function offers(): BelongsToMany

    {
        return $this->belongsToMany(Offer::class, 'enrollments', 'student_id', 'offer_id')
            ->withTimestamps();
    }
}
