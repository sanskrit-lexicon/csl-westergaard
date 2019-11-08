//  Westergaard/disp/index.php  Dec 28, 2009
var requestActive=false;
function loadFcn() {
 document.getElementById("rightpane").innerHTML = "";
}
function displaylink (page) {
  document.getElementById("rightpane").innerHTML = 
   'NOT FUNCTIONAL ' + page ;
  return;
  var url="/cgi-bin/kale/servedisp2.pl?page=" + page;
//  alert('url = ' + url);
  request.open("GET", url, true);
  request.onreadystatechange = updatePage;
  request.send(null);
  requestActive=true;
  document.getElementById("rightpane").innerHTML = 
   '' ;
}
function updatePage() {
  if (request.readyState == 4) {
   requestActive=false;
   if (request.status == 200) {
    var response = request.responseText;
    var ansEl = document.getElementById("rightpane");
//    alert('response = ' + response);
    ansEl.innerHTML = response;
    return;
  } else {
    alert("Error! Request status is " + request.status);
  }
 }
}

function updatePage_version1() {
  if (request.readyState == 4) {
   requestActive=false;
   if (request.status == 200) {
    var response = request.responseText;
    var ans1,ans2;
    var i,x,n;
    var arr;
    arr =eval( "(" + response + ")");
    n=arr.length;
    if (!(n)) {updatePageProb();return;}
    if ((n == 2) && (arr[0] == "ERR")) {updatePageERR(arr);return;}
    updatePageSingle(response,arr);
    return;
  } else {
    alert("Error! Request status is " + request.status);
  }
 }
}
function updatePageProb() {
    var ansEl = document.getElementById("rightpane");
    ansEl.innerHTML = "<p>Problem(1)</p>";
}
function updatePageERR(arr) {
    var ansEl = document.getElementById("rightpane");
    ansEl.innerHTML = "<p>Problem(2)</p>";
}
function updatePageSingle(response,arr) {
 obj = arr[0];
 updatePageImgPrep(obj);
}
function updatePageImgPrep (obj) {
// obj = {"fileprev":"wil-365-tantuka","filename":"wil-365-tantuka","filenext":"wil-365-tantuka"}
 var divid = "rightpane";
 var ansEl = document.getElementById(divid);
 var filename = obj.filename;
 var body;
 var imgurl = "/scans/KALEScan/WRScan/WRScanjpg/" + filename + ".jpg";
 imgurl = filename;
 onload="";
 var imgelt = '<img src="' + imgurl + '" '+ onload +' / >';
  body = imgelt;
  body = body + "<div id='hilitediv'></div>\n";
  var pagenav = compute_pagenav(obj);
  body = body + "<div id='pagenav'>\n" + pagenav + "</div>\n";
  ansEl.innerHTML = body;

}
function updatePageImgProb() {
    var ansEl = document.getElementById("botleftdiv");
    ansEl.innerHTML = "<p>Problem with image.</p>";
    ansEl =  document.getElementById("rightpane");
    ansEl.style.zIndex="1";
}
function compute_pagenav(obj) {
 var fileprev = obj.fileprev;
 var filenext = obj.filenext;
 var ans1 = compute_pagenav_helper("&lt;",fileprev);
 var ans2 = compute_pagenav_helper("&gt;",filenext);
 return (ans1 + ans2);
}
function compute_pagenav_helper(text,filein) {
 var a;
 if (!(filein)||(filein == "")||(filein == "0")) {
  a="<!-- " + text + "  file unavailable -->\n";
  return (a);
 }
 word = filein;
 a = "<a onclick=\"displaylink('" + word + "');\"" +
     " class='nppage'><span class='nppage1'>" + text + "</span>&nbsp;</a>";
 return (a);
}
function compute_pagenav_helper_version1(text,filein) {
 var a;
 if (!(filein)||(filein == "")||(filein == "0")) {
  a="<!-- " + text + "  file unavailable -->\n";
  return (a);
 }
 // filein is like wil-284-gargIya. Use regexp to extract 'gargIya'
// var patt = new RegExp("[a-zA-Z]+$"); // $ is end of string
// var patt = new RegExp("[0-9]+")
// var word = patt.exec(filein);
 var word=filein; 
 var url = "/cgi-bin/work/whitroot/serveimg.pl?page="+word;
 a = "<a onclick=\"displaylink('" + url + "');\"" +
     " class='nppage'><span class='nppage1'>" + text + "</span>&nbsp;</a>";
 return (a);
}
function displaylink_version1 (url) {
//  alert('url = ' + url);
  request.open("GET", url, true);
  request.onreadystatechange = updatePage;
  request.send(null);
  requestActive=true;
  document.getElementById("rightpane").innerHTML = 
   '' ;
}
