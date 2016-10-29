<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use View;
use Activity;
use DB;
use App\Models\Topico;
use App\Mail\UserUpdateStatus;
use Mail;


class BackofficeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

         View::composers([
            'App\Composers\BackComposer'  => ['backoffice.userList',
                                                'backoffice.index',
                                                'backoffice.topics'] 
        ]);

         
    }

    public function allUsers()
    {
        $users = User::All();
        
        return view('backoffice.userList', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers         = User::All()->count();
        $activeUsers      = Activity::users()->count();
        $guestUsers       = Activity::guests()->count();
        $usersLastMonth   = DB::table('users')->whereMonth('created_at', date('m'))->count();
        $top5UsersByTopics = DB::table('topics')->selectRaw('user_id, COUNT(*) as count')->groupBy('user_id')->orderBy('count', 'desc')->limit(5)->get();
        $top5UsersByReplies = DB::table('messages')->selectRaw('user_id, COUNT(*) as count')->groupBy('user_id')->orderBy('count', 'desc')->limit(5)->get();
        $lastestSignUps = DB::table('users')->orderBy('created_at','desc')->take(5)->get();
        $topCategoriasByTopics = DB::table('categories')->orderBy('qtTopics','desc')->take(5)->get();
        $topSubcategoriasByTopics = DB::table('subcategories')->orderBy('qtTopics','desc')->take(5)->get();
        $topTopicsByViews = Topico::where('isOpen',1)->orderBy('qtViews','desc')->take(5)->get();

        return view('backoffice.index', compact('allUsers',
                                                'activeUsers',
                                                'guestUsers',
                                                'usersLastMonth',
                                                'top5UsersByTopics',
                                                'top5UsersByReplies',
                                                'lastestSignUps',
                                                'topCategoriasByTopics',
                                                'topSubcategoriasByTopics',
                                                'topTopicsByViews'));


    }


    public function updateUserStatus (Request $request)
    {
        $user = User::find($request['user_id']);
        $user->status = $request['updateUserStatus'];
        $user->save();
        $users = User::All();
        Mail::to($user->email)->send(new UserUpdateStatus($user));
        return redirect()->action('Controller\BackofficeController@allUsers');
    }


    public function updateTopicStatus (Request $request)
    {
        $topic = Topico::find($request['topic_id']);
        $topic->isOpen = $request['updateTopicStatus'];
        $topic->save();

        return redirect()->action('Controller\BackofficeController@allTopics');
    }


    public function allTopics()
    {
        return view('backoffice.topics');
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
