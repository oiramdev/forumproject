<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use SoftDeletes;

    protected $table = 'subcategories';
    protected $fillable = [
    					'name',
    					'description',
    					'categoria_id',
    					'isPrivate',
    					'isActive',
    					'qtTopics',
    					'qtMessages'];

    protected $dates = ['deleted_at'];	

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function topicos()
    {
        return $this->hasMany('App\Models\Topico');
    }

    public static function subcategorias($id)
    {
        return SubCategoria::where('categoria_id','=', $id)->get();

    }				
}
