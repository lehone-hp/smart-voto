<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{

    protected $fillable = ['user_id', 'name', 'slug', 'description', 'start_date', 'end_date', 'max_vote'];
    protected $dates = ['start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function voters()
    {
        return $this->hasMany(Voter::class);
    }

    public function image()
    {
        return $this->morphTo(Image::class);
    }

    public function statusBadge()
    {
        if (Carbon::now() > $this->start_date && Carbon::now() < $this->end_date) {
            return '<span class="badge badge-info">On Going</span>';
        }
        if (Carbon::now() <= $this->start_date) {
            return '<span class="badge badge-warning">Not Started</span>';
        }
        if (Carbon::now() >= $this->start_date) {
            return '<span class="badge badge-secondary">Closed</span>';
        }

        return null;
    }

    public function getStatus()
    {
        if (Carbon::now() > $this->start_date && Carbon::now() < $this->end_date) {
            return 'on_going';
        }
        if (Carbon::now() <= $this->start_date) {
            return 'not_started';
        }
        if (Carbon::now() >= $this->start_date) {
            return 'closed';
        }

        return null;
    }
}
