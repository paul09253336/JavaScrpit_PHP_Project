<!doctype html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-1.12.1.js" integrity="sha256-VuhDpmsr9xiKwvTIHfYWCIQ84US9WqZsLfR4P7qF6O8=" crossorigin="anonymous"></script>
</head>
    <body>



<div>
  <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.youtube.com%2Fembed%2F{{$view}}&layout=button&size=large&mobile_iframe=true&width=65&height=28&appId" width="65" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</div>

   <div>
        <p>{{$view}},{{$pathurl}}</p>
         <iframe  width="500" height="420" src="{{$pathurl}}"></frame>

 
       
   </body>

   </html>
