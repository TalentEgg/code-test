<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 
 */
class Job extends Model
{
    use SoftDeletes;

    // fillable field for mass assignment
    protected $fillable = [
        'title',
        'overview',
        'duties',
        'qualifications',
        'reports_to',
        'location',
        'compensation',
        'compensation_unit',
        'employment_type',
    ];
}
