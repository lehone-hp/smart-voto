<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    public function poll() {
        return $this->belongsTo(Poll::class);
    }
}
