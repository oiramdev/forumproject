<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
	use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = [
    						'name','description','isActive','isPrivate'];

    protected $dates = ['deleted_at'];

    public function subcategorias()
    {
        return $this->hasMany('App\Models\SubCategoria');
    }

    public function topicos()
    {
    	return $this->hasMany('App\Models\Topico');
    }
    
}
