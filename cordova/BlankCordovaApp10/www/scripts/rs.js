$(document).ready(function () {
    $('#send-btn').click(function () {
       
        $.ajax({
            url: 'http://localhost/test/public/todo',
            type: 'POST',
            contentType: 'application/json',
            data: '{"data":"' + $('#text-input').val() + '"}'
        }).done(function () {
            console.log('Done!');
        });
    });
});
   