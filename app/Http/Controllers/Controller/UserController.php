<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Image;
use App\Models\Notification;
use App\Models\Message;
use App\Models\Topico;

class UserController extends Controller
{

	public function __construct()
	{
	    $this->middleware('auth');
	}

	public function profile()
	{
		$notifications = Notification::where('ownerTopic_id', Auth::user()->id)->take(5)->get(); 
		$messages = Message::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->take(5)->get();
		$topics = Topico::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->take(5)->get();
		return view('backoffice.profilepage', array('user' => Auth::user(), 
													'notifications' => $notifications,
													'messages' => $messages,
													'topics' => $topics));
	}

	public function updateAvatar(Request $request){

		if($request->hasFile('avatar'))
		{
			$avatar = $request['avatar'];
			$filename = Auth::user()->name . '.' . $avatar->getClientOriginalExtension();
			\Image::make($avatar)->resize(250,250)->save( public_path('uploads/avatars/' . $filename ));

			$user = Auth::user();
			$user->avatar = $filename;
			$user->save();

		}

		return view('backoffice.profilepage', array('user' => Auth::user()));

	}

	public function showNotifications($id)
	{

	}

	public function updateProfile(Request $request)
	{
		if($request)
		{
			$user = Auth::user();
			$user->name = $request['name'];
			$user->address = $request['address'];
			$user->ocupation = $request['ocupation'];
			$user->url = $request['url'];
			$user->save();
		}

		return redirect()->action('Controller\UserController@profile');
	}

	
}
