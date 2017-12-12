<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\url;
use App\Sendinfo;
use App\Passswordph;
use App\Qset;
use DB; 
class ApplicationController extends Controller
{
    
	public function pwdset(Request $request)
    {
    	if($request['p'] != $request['n'])//兩輸入值不同
    	{
    		return 'no';
    	}
    	else
    	{
    		if(is_numeric($request['p']) || is_numeric($request['n']))//判斷是否為數字，true回傳1
    		{
    			$legthp=strlen($request['p']);//計算輸入長度
    			$legthn=strlen($request['n']);//計算輸入長度

    			if($legthp !=10 || $legthn!=10)//判斷是否為10位數
    			{
					return 'not_same';

    			}
    			else
    			{
    				$ptitle=substr($request['p'], 0,2);//判斷是否開頭是否為09
    				
					
    				if($ptitle !='09')
    				{
    					return 'not_same';
       				}
       				else
       				{
       					$passwordph = new  Passswordph();
         				$passwordph ->passwordph = $request['n'];
         				$passwordph ->save();
       					return 'sucessful' ;
       				}

    			}

    			
    		}
    		else
    		{
    			return 'not_number' ;
    		}
    	}

    }



    public function qset(Request $request)
    {
    	$qset = new  Qset();
        $qset ->questions = $request['n'];
        $qset ->answers = $request['a'];
        $qset ->save();
       	return 'sucessful' ;

    	
    }
    public function nfcset(Request $request)
    {
    	
    	$id=$request['id'];

		$passwdlateId = DB::table('passwordphs')->max('created_at'); 
    	$qsetlateId = DB::table('questionsets')->max('created_at'); 
        $videopathId = DB::table('urls')->max('created_at'); 
        
        DB::table('questionsets')->where('created_at','=',$qsetlateId)->update(['id'=>hexdec($id)]); 
   		DB::table('passwordphs')->where('created_at','=',$passwdlateId)->update(['id'=>hexdec($id)]); 
		DB::table('urls')->where('created_at','=',$videopathId)->update(['id'=>hexdec($id)]);
        $passlateId2=DB::table('passwordphs')->where('created_at','=',$passwdlateId)->first(); 
		$qsetlateId2=DB::table('questionsets')->where('created_at','=',$qsetlateId )->first(); 
        $videopathId2=DB::table('urls')->where('created_at','=',$videopathId)->first(); 
	    return var_dump($qsetlateId2->id);

    }

	public function rcpt()
    {
    	$dbid=$_SERVER['QUERY_STRING'];//得到?後的值

		$passwdlateId = DB::table('passwordphs')->where('id','=',hexdec($dbid))->first(); 
		
    	$view=$passwdlateId->passwordph;//取得password

    	//$post2=DB::table('questionsets')->where('created_at','=',$insertedId)->first(); 
    	return view('rcptph')->with('name',$view);

    }

public function Answer_question()
{
	$dbid=$_SERVER['QUERY_STRING'];
	$qlateId = DB::table('questionsets')->where('id','=',hexdec($dbid))->first(); 
	$questions=$qlateId->questions;
	$answer=$qlateId->answers;


	return $dbid;

}
  /*  public function getnfc(Request $request)
    {
    	
    	return 'sucessful';

    }*/
    
}



