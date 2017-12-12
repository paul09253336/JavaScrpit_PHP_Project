/**
 * / handle take photo
 */
var pic = document.getElementById("record");
if (pic)
{
    pic.addEventListener("click", function () {
        navigator.camera.getPicture(uploadfile, onFail, {
            quality: 100,
            destinationType: Camera.DestinationType.FILE_URI
        });

    });


        console.log("sucess");
}


function onSuccess(imageURI) {
    var image = document.getElementById("largeImage");
    console.log(imageURI);//photo_save_URI
    image.src = imageURI;
}

function onFail(message) {
    alert('Failed : ' + message);
    console.log("Failed : " + message);
}

function win(r) {
    console.log("Code = " + r.responseCode);
    console.log("Response = " + r.response);
    console.log("Sent = " + r.bytesSent);
}

function fail(error) {
    alert("An error has occurred: Code = " + error.code);
    console.log("upload error source " + error.source);
    console.log("upload error target " + error.target);
}


function uploadfile(imageURI) {
    
    console.log("1233654");
  
    var options = new FileUploadOptions();
    options.filekey = "file";
    options.filename = imageURI.substr(imageURI.lastIndexOf('/') + 1);
    options.mimeType = "image/jpeg";

  //  var headers = { 'headerParam': 'headerValue' };
    var params = {};
    params.value1 = "test";
    params.value2 = "param";
    options.params = params;
   // options.headers = headers;
    var ft = new FileTransfer();
   /* ft.onprogress = function (progressEvent) {
        if (progressEvent.lengthComputable) {
            loadingStatus.setPercentage(progressEvent.loaded / progressEvent.total);
        } else {
            loadingStatus.increment();
        }


    };*/
   
//   var fpath = imageURI;
 //   window.plugs.gdrive.uploadFile(fpath, function (sucess) { console.log("sucess") }, function (error) { console.log("error") });
}



/** handle record video
 */
var videoOption = { limit: 3 };
var captureSuccess = function (mediaFiles) {
    var i, path, len;
   // 
    len = mediaFiles.length;
    if (len > 0) {
        for (i = 0, len; i < len; i++) {
            path = mediaFiles[i].fullPath;
        }
        console.log(path);//video_save_URI or Audio_save_URI 

    }
    else
    {
        alert("Error:No files returned.");

    }
};

var captureError = function (error) {
    navigator.notification.alert('Error code: ' + error.code, null, 'Capture Error');
    alert("cancel");
};


    var video = document.getElementById("videotest");
    if (video) {

     console.log("sucess_test2");
        video.addEventListener("click", function () {
           
        navigator.device.capture.captureVideo(captureSuccess, captureError, videoOption);
        
    });

}
else
{
    console.log("fail_test2");
}


/* handle Audio
*/
    var audio = document.getElementById("audiorecord");
    if (audio)
    {
        var audiooptions = { limit: 2 };
        audio.addEventListener("click", function () {

            navigator.device.capture.captureAudio(captureSuccess, audioError, audiooptions);


        });

    }
    else
    {
        console.log("audio_button_fail");
    }
    var audioError = function (error) {
        if (error === CaptureError.CAPTURE_NO_MEDIA_FILES)
        {
            history.go(-1);

        }
        navigator.notification.alert('Error code: ' + error.code, null, 'Capture Error');
        alert("cancel");
    };






