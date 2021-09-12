<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['poll_id', 'name', 'description'];

    public function poll() {
        return $this->belongsTo(Poll::class);
    }
}
