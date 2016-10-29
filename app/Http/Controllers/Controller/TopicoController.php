<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\SubCategoria;
use App\Models\Topico;
use App\Models\Message;
use DB;
use Activity;
use View;

class TopicoController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){

        View::composers([
            'App\Composers\FrontComposer'  => ['front.topicpage','front.newtopic'] 
        ]);

    }
    
    
    public function getSubcategorias(Request $request, $id)
    {
        if($request->ajax())
        {
            $subcategorias = SubCategoria::subcategorias($id);
            return response()->json($subcategorias);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $activities = Activity::users()->get();
        $categorias = Categoria::pluck('name','id');
        $categoriasList = Categoria::All();
        return view('front.newtopic', compact('categorias','activities','categoriasList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic                  = new Topico;
        $topic->name            = $request['name'];
        $topic->body            = $request['body'];
        $topic->categoria_id    = $request['categoria'];
        $topic->subcategoria_id = $request['subcategoria'];
        $topic->user_id         = $request['user_id'];
        $topic->isPrivate       = $request['isPrivate'];
        $topic->emailMe         = $request['emailMe'];
        $topic->save();

        $newTopicId = $topic->id;
        DB::table('categories')->where('id', $request['categoria'])->increment('qtTopics');
        DB::table('subcategories')->where('id', $request['subcategoria'])->increment('qtTopics');

        return redirect()->route('topic.show', ['id' => $newTopicId]); 
    }


    public static function paginateItems($id,$qt)
    {
        return Message::where('topico_id', $id)->paginate($qt);
    }

    public static function messagePerPage(Request $request)
    {   
        if($request->input('messagePerPage'))
        {
            $messages = paginateItems($request['messagePerPage']);
        }
        return view('front.topicpage', compact('topic','messages'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {   
        $topic = Topico::find($id);
        DB::table('topics')->where('id', $id)->increment('qtViews');
        $categoriasList = Categoria::All();
        $activities = Activity::users()->get();
        $qtMessages = Message::where('topico_id', $id)->count();
        $topicsList = Topico::where('isOpen',1)->orderBy('created_at','desc')->take(5)->get();
        $topicsListGuest = Topico::where('isPrivate',0)->orderBy('created_at','desc')->take(5)->get();
        $topics      = Topico::where('isOpen',1)->orderBy('created_at','desc')->get();
        if($qtMessages <= 10)
        {
            $showSelectMessageByPage = false;
        }
        else
        {
            $showSelectMessageByPage = true;
        }

        if($request->input('selectMessageByPage'))
        {

            if($request['selectMessageByPage'] == 00)
            {
                $messages   = Message::where('topico_id', $id)
                                ->orderBy('created_at','desc')
                                ->paginate($qtMessages);
                return view('front.topicpage', compact('topic','messages','categoriasList','activities','showSelectMessageByPage','topicsList','topicsListGuest','topics'));
            }

            $messages = Message::where('topico_id', $id)
                                ->orderBy('created_at','desc')
                                ->paginate($request['selectMessageByPage']);
            return view('front.topicpage', compact('topic','messages','categoriasList','activities','showSelectMessageByPage','topicsList','topicsListGuest','topics'));
        }
        else{
             $messages = Message::where('topico_id', $id)->orderBy('created_at','desc')->paginate(10); 
             return view('front.topicpage', compact('topic','messages','categoriasList','activities','showSelectMessageByPage','topicsList','topicsListGuest','topics'));  
        }

        
        
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
