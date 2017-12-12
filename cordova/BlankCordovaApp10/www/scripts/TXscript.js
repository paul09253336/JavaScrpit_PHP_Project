//choice phone file
$(function () {

    function format_float(num, pos) {
        var size = Math.pow(10, pos);
        return Math.round(num * size) / size;
    }

    function preview(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.preview').attr('src', e.target.result);
                var KB = format_float(e.total / 1024, 2);
                $('.size').text("檔案大小：" + KB + " KB");
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("body").on("change", ".upl", function () {
        preview(this);
    })

})



//choice phone video

$(document).on("change", ".file_multi_video", function (evt) {
    var $source = $('#video_here');
    $source[0].src = URL.createObjectURL(this.files[0]);
    $source.parent()[0].load();
});



//choice phone audio
function playFile(obj) {
    var url = document.getElementById("audio").url;
    document.getElementById("sound").src = url;
    document.getElementById("sound").play()
}


input.onchange = function () {
    var sound = document.getElementById('sound');
    var reader = new FileReader();
    reader.onload = function (e) {
        sound.src = this.result;
        sound.controls = true;
        sound.play();
    };
    reader.readAsDataURL(this.files[0]);
}




