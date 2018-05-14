<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use BrianFaust\Commentable\Traits\HasComments;
use CyrildeWit\PageViewCounter\Traits\HasPageViewCounter;

class Article extends Model
{
    use HasPageViewCounter;
    use HasComments;

    protected $fillable = ['name', 'decription'];
    protected $appends = ['page_views'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getPageViewsAttribute()
    {
        return $this->getPageViews();
    }


    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
