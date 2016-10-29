<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topico extends Model
{
    protected $table = 'topics';
    protected $fillable = [
    					'name',
    					'body',
                        'categoria_id',
    					'subcategoria_id',
    					'user_id',
    					'isOpen',
    					'isPrivate',
    					'qtViews',
    					'qtMessages',
    					'lastUser',
                        'emailMe'];

    protected $dates = ['deleted_at'];

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function subcategoria()
    {
        return $this->belongsTo('App\Models\SubCategoria');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

}


