<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['message_id','topico_id','user_id','ownerTopic_id'];

    protected $dates = ['deleted_at'];	


    public function topico()
    {
        return $this->belongsTo('App\Models\Topico');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function message()
    {
        return $this->belongsTo('App\Models\Message');
    }

}
