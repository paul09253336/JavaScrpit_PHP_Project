<!doctype html>
<html >
<head>
	<script src="https://code.jquery.com/jquery-1.12.1.js" integrity="sha256-VuhDpmsr9xiKwvTIHfYWCIQ84US9WqZsLfR4P7qF6O8=" crossorigin="anonymous"></script>
</head>
	 <body>
	 	<input type="text" id="inputword" required>
        <input type="text" id="password" value="{{ $name }}" hidden="hidden">
		
        <input type="button" id="sendwd"  value="送出" required>
    	<script type="text/javascript">
    		var password = document.getElementById("password").value;
    		
    		//$dbid=$_SERVER['QUERY_STRING'];
    		var sendwd= document.getElementById("sendwd");
    		$('#sendwd').on('click',function(){
    		console.log($("#inputword").val());
    		if(password != ($("#inputword").val()))
    		{
    			alert('輸入不正確，請重新輸入');

    		}
    		else
    		{
    			alert('輸入正確');
    			$redirt='HTTP://localhost/laravel/public/Answer_question'+ location.search;
    			window.location.replace($redirt);
    		}


    		});
    		
    		
   	</script>



	 </body>
</html>


