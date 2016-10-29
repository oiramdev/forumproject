<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Topico;
use DB;


class AppFunction extends Model
{
    
	public static function BBCode($string) {
	     $BBcode = array(
	         '/\[b\](.*?)\[\/b\]/is',
	         '/\[quote\](.*?)\[\/quote\]/is'
	     );
	     $HTML = array(
	         '<b><span class="original">Original Posted by - $1 </span>',
	         '<blockquote>$1</blockquote>'
	     );
	     return nl2br(preg_replace($BBcode,$HTML,$string));

	 }

	 public static function dayByCarbon($datetime)
	 {
	 	$created_at = \Carbon\Carbon::parse($datetime);
	 	return $created_at->format('d');
	 }

	 public static function monthByCarbon($datetime)
	 {
	 	$created_at = \Carbon\Carbon::parse($datetime);
	 	return $created_at->format('F');
	 }

	 public static function yearByCarbon($datetime)
	 {
	 	$created_at = \Carbon\Carbon::parse($datetime);
	 	return $created_at->format('Y');
	 }

	 public static function diffData($datetime)
	 {
	 	$created_at = \Carbon\Carbon::parse($datetime);
	 	$now = \Carbon\Carbon::now();
	 	return str_replace('before', '', $created_at->diffForHumans($now));	
	 }

	 public static function dateToString($datetime)
	 {
	 	$created_at = \Carbon\Carbon::parse($datetime);
	 	return $created_at->toDayDateTimeString(); 
	 }

	 public static function userLastActivity($id)
	 {
	 	$activity = DB::table('sessions')->where('user_id',$id)->max('last_activity');
	 	$now = \Carbon\Carbon::now();
	 	$carbonDate = \Carbon\Carbon::parse(date('d-m-Y H:i:s',$activity));
	 	return str_replace('before', '', $carbonDate->diffForHumans($now));
	 }

	 public static function userLastIpAddress($id)
	 {
	 	$lastIp = DB::table('sessions')->where('user_id',$id)->orderBy('last_activity','desc')->first();
	 	return ($lastIp) ? $lastIp->ip_address : 'N/A';
	 }

	 public static function userRole($role)
	 {
	 	switch ($role) {
	 		case '0':
	 			return 'Basic User';
	 			break;
	 		case '1':
	 			return 'Moderator';
	 		case '2':
	 			return 'Administrator';
	 		default:
	 			return 'ERROR';
	 			break;
	 	}
	 }

	 public static function userInfo($id)
	 {	
	 	$user = DB::table('users')->where('id', $id)->first();
	 	return $user;
	 }

	 public static function lastTopicByCategoria($id)
	 {
	 	$topic = DB::table('topics')->where('categoria_id', $id)->orderBy('created_at','desc')->first();
	 	return $topic;
	 }

	 public static function lastTopicBySubcategoria($id)
	 {
	 	$topic = DB::table('topics')->where('subcategoria_id',$id)->orderBy('created_at','desc')->first();
	 	return $topic;
	 }

	 public static function topicsByCategoriaId($id)
	 {
	 	$topics = Topico::where('categoria_id',$id)->where('isOpen',1)->orderBy('created_at','desc')->get();
	 	return $topics;
	 }

    
}
