<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = [
    					'body',
    					'topico_id',
    					'user_id'	];

     protected $dates = ['deleted_at'];

     public function topico()
    {
        return $this->belongsTo('App\Models\Topico');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\notification');
    }

}
