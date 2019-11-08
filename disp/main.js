//  Westergaard/disp/index.php  Dec 28, 2009
var requestActive=false;
function loadFcn() {
 document.getElementById("rightpane").innerHTML = "";
}
function displaylink (page) {
  var url="serveimg.php?page=" + page;
  request.open("GET", url, true);
  request.onreadystatechange = updatePage;
  request.send(null);
  requestActive=true;
  document.getElementById("rightpane").innerHTML =    '' ;
}
function updatePage() {
  if (request.readyState == 4) {
   requestActive=false;
   if (request.status == 200) {
    var response = request.responseText;
    var ansEl = document.getElementById("rightpane");
    ansEl.innerHTML = response;
    return;
  } else {
    alert("Error! Request status is " + request.status);
  }
 }
}
