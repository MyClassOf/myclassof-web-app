window.addEventListener('error', ()=>console.log("hello"));

console.log(window);

function sendMessage(){
    console.log("send error to email")
}

let url = "http://jordon.myclassof.com/blahblah.jpg";
function UrlExists(url) {
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    if (http.status != 404)
        console.log("Great!");
    else
        console.log("Error");
}

UrlExists(url);