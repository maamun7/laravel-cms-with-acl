<?php

namespace App\DB\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article_category(){
        return $this->belongsTo('App\DB\Admin\ArticleCategory','article_category_id');
    }
}
