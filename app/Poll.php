<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function candidates() {
        return $this->hasMany(Candidate::class);
    }

    public function voters() {
        return $this->hasMany(Voter::class);
    }
}
