<?php

namespace App\DB\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * @var string
     */
    protected $table = 'courses';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lectures(){
        return $this->hasMany('App\DB\Admin\Lecture');
    }
}
