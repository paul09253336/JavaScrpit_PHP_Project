<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Save;
use App\url;
use  DB;
class UrlController extends Controller
{



    public function videostr()

    {

  		//$id=$request['id'];
    	$dbid=$_SERVER['QUERY_STRING'];//得到?後的值
	   	$videopath = DB::table('urls')->where('id','=',hexdec($dbid))->first(); 
	   	$view=$videopath->videopath;//取得videopath
	   	$ytid = 'https://www.youtube.com/embed/';
      $pathurl = $ytid.$view;
//    return $pathurl ;
      $thePrinceThatWasPromised = compact(["view", "ytid",  "pathurl"]);
      return view('reciver',compact("view","pathurl"));
          //->with('text',$pathurl)
                //->with('view',$view) ;
    	              //view('reciver')->with('text',$pathurl);
    }
}


