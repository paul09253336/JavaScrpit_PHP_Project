
// Dectect NET work

document.addEventListener("online", onOnline, false);
document.addEventListener("offline", onOffline, false);

function onOnline() {
    console.log(22222);
    alert('裝置連線了');
}

function onOffline() {
    console.log(111111);
    alert('裝置離線了');
}
