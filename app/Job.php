<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    //

    // Relationship function for to get the user who posted the job
    public function user(){

        return $this->belongsTo('App\User','user_id');
    }
}
