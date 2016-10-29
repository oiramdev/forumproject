<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Topico;
use App\Models\Notification;
use App\AppFunction;
use App\User;
use DB;
use Mail;

class MessageController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message;
        $message->body = AppFunction::BBcode($request['body']);
        $message->user_id = $request['user_id'];
        $message->topico_id = $request['topico_id'];
        $message->save();
        $topico = Topico::where('id',$request['topico_id'])->first();

        $notification = new Notification;
        $notification->ownerTopic_id = $request['ownerTopic_id'];
        $notification->message_id = $message->id;
        $notification->topico_id = $request['topico_id'];
        $notification->user_id = $request['user_id'];
        $notification->save();

        DB::table('topics')->where('id', $request['topico_id'])->increment('qtMessages');
        DB::table('subcategories')->where('id', $topico->subcategoria_id)->increment('qtMessages');

        $emailMe = Topico::where('id',$request['topico_id'])->where('emailMe',1)->first();
        if($emailMe)
        {
            $user = User::where('id', $emailMe->user_id)->first();
            $newMessageBody =  AppFunction::BBcode($request['body']);

            $data = array( 'email' => $user->email, 'first_name' => $user->name, 'from' => 'project.services.pt@gmail.com', 'from_name' => 'Project Forum' );
        

            Mail::queue('emails.newMessage', [$data, 'title' => $emailMe->name, 'originalTopic' => $emailMe->body, 'messageContent' => $newMessageBody], function ($newmessage) use($data)
            {

                $newmessage->from( $data['from'], $data['from_name']);

                $newmessage->to($data['email'],$data['first_name']);

                $newmessage->subject('New reply');

            });
        }
        return redirect()->route('topic.show', ['id' => $request['topico_id']]);
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
