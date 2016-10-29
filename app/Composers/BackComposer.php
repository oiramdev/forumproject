<?php 

namespace App\Composers;


use Activity;
use DB;
use Auth;
use App\Models\Categoria;
use App\Models\SubCategoria;
use App\Models\Topico;

class BackComposer
{

    public function compose($view)
    {
    	$activities = Activity::users()->get();
    	$allCategorias = Categoria::All(); dd($allCategorias);
    	$allSubcategorias = SubCategoria::All();
    	$allTopics = Topico::All();


        $view->with('activities', $activities)
        	 ->with('allCategorias', $allCategorias)
        	 ->with('allSubcategorias', $allSubcategorias)
        	 ->with('allTopics', $allTopics);
            
    }
}