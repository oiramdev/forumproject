<?php 

namespace App\Composers;

use App\Models\Topico;
use App\Models\Categoria;
use App\Models\SubCategoria;
use App\Models\Notification;
use Activity;
use DB;
use Auth;

class FrontComposer
{

    public function compose($view)
    {
    	$activities         = Activity::users()->get();
    	$categoriasList     = DB::table('categories')->where('isActive', 1)->orderBy('name','asc')->get();
        $topicsList         = Topico::where('isOpen',1)->orderBy('created_at','desc')->take(5)->get();
        $topicsListGuest    = Topico::where('isPrivate',0)->orderBy('created_at','desc')->take(5)->get();
        $topicsForSidebar   = Topico::All();
        (Auth::guest()) ? $notificationsCount = 0 : $notificationsCount = Notification::where('ownerTopic_id', Auth::user()->id)->count();
        //Add your variables
        $view->with('activities', $activities)
        	 ->with('categoriasList', $categoriasList)
        	 ->with('topicsList', $topicsList)
        	 ->with('topicsListGuest', $topicsListGuest)
             ->with('topicsForSidebar', $topicsForSidebar)
             ->with('notificationsCount', $notificationsCount);
            
    }
}