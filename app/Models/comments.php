<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    protected $fillable = ['comment','article_id','user_id']; 
    protected $primaryKey = 'id';
    protected $table = 'comments';


    public function articles()
    {
        return $this->belongsTo('App\Models\articles','article_id','id');
    }
    
    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
