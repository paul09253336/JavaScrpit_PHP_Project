var nfcreader = document.getElementById("nfcreader");
if (nfcreader) {

        nfcreader.addEventListener("click", function () {
        nfc.removeNdefListener(nfcwriter, onSuccess, onFailure);
        nfc.addNdefListener(nfcread, ronSuccess, ronFailure);
        //nfc.removeNdefListener(callback, onSuccess, onFailure);


    });

    }
else {
    console.log("nfcreaderbutton fail");

}
function nfcread(nfcEvent) {

    var tag = nfcEvent.tag;
    ndefMessage = tag.ndefMessage;

    alert("http://" + nfc.bytesToString(ndefMessage[0].payload));

}

function ronSuccess() {
    console.log("read sucess");
}
function ronFailure() {

    console.log("read fail");
}



/*handle nfc writer*/
var nfcwriter = document.getElementById("nfcwriter");

if (nfcwriter) {
   console.log("nfcwriter");
    //var message = [ndef.uriRecord("https://youtu.be/c_-y5Ad9XY4")];
    nfcwriter.addEventListener("click", function () {

        nfc.removeNdefListener(nfcread, onSuccess, onFailure);
        nfc.addNdefListener(nfcwrite, onSuccess, onFailure);

    });

}
else {
    console.log("nfcbutton fail");

}
function nfcwrite(message) {

    message = [ndef.uriRecord("https://youtu.be/c_-y5Ad9XY4")];
    nfc.write(message, wonSuccess, wonFailure);
}
function onSuccess() {
    console.log("sucess");
}
function wonSuccess() {
    console.log("writer sucess");
   }
function onFailure() {
    console.log(" fail");
}
function wonFailure() {
        console.log("writer fail");
}