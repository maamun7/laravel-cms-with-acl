<?php

namespace App\DB\Admin;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'article_categories';

    public function articles(){
        return $this->hasMany('App\DB\Admin\Article');
    }
}
