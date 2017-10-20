<?php

namespace App\DB\Admin;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    /**
     * @var string
     */
    protected $table = 'lectures';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(){
        return $this->belongsTo('App\DB\Admin\Course','course_id');
    }
}
