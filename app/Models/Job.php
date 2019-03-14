<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Faker\Factory as Faker;

/**
 * Class Job
 * @package App\Models
 */
class Job extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'description',
        'address',
    ];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $faker = Faker::create();
            $model->public_id = $faker->uuid;
        });
    }
}
