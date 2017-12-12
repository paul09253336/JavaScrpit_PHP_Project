<?php

use Illuminate\Http\Request;
use App\Save;
use App\url;
use App\Sendinfo;
use App\Passswordph;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => config('youtube.routes.prefix')], function() {

    /**
     * Authentication
     */
    Route::get(config('youtube.routes.authentication_uri'), function()
    {
        return redirect()->to(Youtube::createAuthUrl());
    });

    /**
     * Redirect
     */
    Route::get(config('youtube.routes.redirect_uri'), function(Illuminate\Http\Request $request)
    {
        if(!$request->has('code')) {
            throw new Exception('$_GET[\'code\'] is not set. Please re-authenticate.');
        }

        $token = Youtube::authenticate($request->get('code'));

        Youtube::saveAccessTokenToDB($token);

        return redirect(config('youtube.routes.redirect_back_uri', '/'));
    });

	Route::POST(config('youtube.routes.upload_uri'), function(Request $request)
    {


            $file = $request->file('user_icon_file');
            $extension=$file->getClientOriginalExtension();
            $filename=strval(time()).str_random(5).'.'.$extension;
            if($extension=='mp4' || $extension=='avi' || $extension=='wmv' ||$extension=='flv')
            {
             $path = $request->user_icon_file->storeAs('video', $filename);
             $fullPathToVideo = storage_path().'\app\video\\'.$filename;
		        $video = Youtube::upload($fullPathToVideo, [
		         'title'       => $filename,
		         'description' => 'You can also specify your video description here.',
		          'tags'	      => ['foo', 'bar', 'baz'],
		          'category_id' => 10]);
              
              $todo = new Save();
              $todo ->videopath = $video->getVideoId();
              $todo ->save();
              return 'sucessful' ; //$video->getVideoId();

                
              }

          else if($extension =='mp3'|| $extension == 'm4a' ||$extension == 'wav')
            {
               $path = $request->user_icon_file->storeAs('audio',$filename);
               $fullPathToAudio = storage_path().'\app\audio\\'.$filename;
               $audio = Youtube::upload($fullPathToAudio, [
               'title'       => $filename,
               'description' => 'You can also specify your video description here.',
               'tags'        => ['foo', 'bar', 'baz'],
               'category_id' => 10]);
              
              $todo = id;
              $todo ->audiopath = $audio->getVideoId();
              $todo ->save();

              return  'sucessful'; //$video->getVideoId();
              
            }

             else if($extension == 'jpg'|| $extension == 'bmp' ||$extension == 'wav')
            {
               $path = $request->user_icon_file->storeAs('image', $filename);
               $fullPathToImage = storage_path().'\app\image\\'.$filename;
               $image = Youtube::upload($fullPathToAudio, [
                'title'       => $filename,
                'description' => 'You can also specify your video description here.',
                'tags'        => ['foo', 'bar', 'baz'],
                'category_id' => 10]);
                 $todo = new Save();
                 $todo ->imagepath = $image->getVideoId();
                 $todo ->save();
                 return  'sucessful'; //$video->getVideoId();
            }
		
          
		 else
             {
                echo  'false'  ; 
            }

      

    });

      
            

});


    Route::post('/pwdset','ApplicationController@pwdset');
    Route::post('/qset','ApplicationController@qset');
    Route::post('/nfc','ApplicationController@nfcset');
    //Route::get('/rcpt','ApplicationController@rcpt');
    Route::get('/rcpt2','ApplicationController@rcpt');
    Route::get('/Answer_question','ApplicationController@Answer_question');
    Route::get('/upload','UrlController@videostr');



