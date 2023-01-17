<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    use HasFactory;

    protected $fillable = ['content_title','content_image','content_description','content','user_id','slug','metatags']; 
    protected $primaryKey = 'id';
    protected $table = 'articles';

    public function comments()
    {
         return $this->hasMany('App\Models\comments', 'article_id','id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function article_categories()
    {
        return $this->hasMany('App\Models\article_categories','article_id','id');
    }

}
