<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Topico;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Activity;
use DB;
use View;
use Session;
use Auth;

class FrontController extends Controller
{

    public function __construct(){

        View::composers([
            'App\Composers\FrontComposer'  => ['front.index',
                                               'front.categoriaPage',
                                               'front.subcategoriaPage',
                                               'front.sidebar',
                                               'front.searchResults',
                                               'front.topicpage',
                                               'front.newtopic'] 
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $topics      = Topico::where('isOpen',1)->orderBy('created_at','desc')->paginate(10);
        $guestTopics = Topico::where('isPrivate',0)->where('isOpen',1)->orderBy('created_at','desc')->paginate(10);

        if($request->input('topicsByCategoria'))
        {
            if($request['topicsByCategoria'] == 'all')
            {
                return view('front.index', compact('guestTopics','topics'));
            }

            $guestTopics = Topico::where('isPrivate',0)->where('isOpen',1)->where('categoria_id',$request['topicsByCategoria'])->orderBy('created_at','desc')->paginate(10);
            $topics      = Topico::where('isOpen',1)->where('categoria_id',$request['topicsByCategoria'])->orderBy('created_at','desc')->paginate(10);
            return view('front.index', compact('guestTopics','topics'));
        }else
            {
                return view('front.index', compact('guestTopics','topics'));
            }

        if($request->input('topicsPerPage'))
        {
            $topics      = Topico::where('isOpen',1)->orderBy('created_at','desc')->paginate($request['topicsPerPage']);
            $guestTopics = Topico::where('isPrivate',0)->where('isOpen',1)->orderBy('created_at','desc')->paginate($request['topicsPerPage']);
            return view('front.index', compact('guestTopics','topics'));
        }else
            {
                return view('front.index', compact('guestTopics','topics'));
            }
    
    }



    public function showCategoria($id)
    {
        $subcategorias = SubCategoria::where('categoria_id',$id)->orderBy('name','asc')->get();

        $categoriaInfo = Categoria::find($id);
        return view('front.categoriaPage',compact('subcategorias','categoriaInfo'));
    }

    public function showSubCategoria($id)
    {
        $topicsBySubCategoria = Topico::where('subcategoria_id',$id)->where('isOpen',1)->orderBy('name','asc')->paginate(20);
        $guestTopicsBySubCategoria = Topico::where('subcategoria_id',$id)->where('isPrivate',0)->where('isOpen',1)->orderBy('name','asc')->paginate(20);
        $subcategoriaInfo = SubCategoria::find($id);
        return view('front.subcategoriaPage',compact('topicsBySubCategoria','subcategoriaInfo','guestTopicsBySubCategoria'));
    }

    public function searchTopics(Request $request)
    {
        $search = \Request::get('search');
        
        $topics = Topico::where('isOpen',1)
                             ->where('name','like','%'.$search.'%')
                             ->where('body','like','%'.$search.'%')
                             ->orderBy('name')
                             ->paginate(20);

        $guestTopics = Topico::where('isOpen',1)
                             ->where('name','like','%'.$search.'%')
                             ->where('body','like','%'.$search.'%')
                             ->where('isPrivate',0)
                             ->orderBy('name')
                             ->paginate(20);

        
        if(Auth::check())
        {
          
            if($topics->count() == 0)
            {
                Session::flash('error','Sorry, but nothing matched your search terms. Please try again with some different keywords.');
                return view('front.searchResults',compact('guestTopics','topics'));
            }

        }
        else
        {
            
            
            if($guestTopics->count() == 0)
            {
                Session::flash('error','Sorry, but nothing matched your search terms. Please try again with some different keywords.');
                return view('front.searchResults',compact('guestTopics','topics'));
            }

            

        }

        return view('front.searchResults',compact('guestTopics','topics'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
