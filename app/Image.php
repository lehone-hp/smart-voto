<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['path', 'thumbnail'];
    /**
     * Get the parent imageable model (user or post or person, etc).
     */
    public function imageable()
    {
        return $this->morphTo();
    }


    // events

    protected static function boot()
    {
        parent::boot();

        static::created(function ($image) {
            try {
                $picture = \Intervention\Image\Facades\Image::make(storage_path('app/public/'.$image->path));
                $picture->resize(null, 100, function($constraint){
                    $constraint->aspectRatio();   
                });

                $filename = 'thumb_'.time().'_'.basename($image->path);
                $picture->save(storage_path('app/public/thumbnail/' .$filename));

                $image->update(['thumbnail' => 'thumbnail/'.$filename]);
            } catch (\Exception $e) { }
        });

        static::deleting(function ($image) {
            Storage::delete([$image->path, $image->thumbnail]);
        });
    }

    public function getUrl($mode = 'thumbnail') {
        return asset('storage/'. (($mode == 'thumbnail' && $this->thumbnail) ? $this->thumbnail : $this->path));
    }
}
