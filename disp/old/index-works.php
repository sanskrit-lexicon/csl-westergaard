<!-- Westergaard/disp/index.php  Dec 28, 2009 -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "//www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
    <title>WDP SCAN</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="main.css">
  <script type="text/javascript" src="/mwquery/ajax.js"> </script>
  <script type="text/javascript" src="main.js"> </script>
<style type="text/css">
/*margin and padding on body element
  can introduce errors in determining
  element position and are not recommended;
  we turn them off as a foundation for YUI
  CSS treatments. */
body {
	margin:0;
	padding:0;
}
</style>
<!-- Required CSS -->
<link type="text/css" rel="stylesheet" href="/js/yui_2.6.0/build/fonts/fonts-min.css">
<link type="text/css" rel="stylesheet" href="/js/yui_2.6.0/build/treeview/assets/skins/sam/treeview.css">

<!-- Dependency source file --> 
<script type="text/javascript" src = "/js/yui_2.6.0/build/yahoo-dom-event/yahoo-dom-event.js" ></script>

<!-- TreeView source file --> 
<script type="text/javascript"src = "/js/yui_2.6.0/build/treeview/treeview-min.js" ></script>

<!--begin custom header content for this example-->
<!--end custom header content for this example-->
<!-- end <head> and start <body> -->
<?php
include('/afs/rrz.uni-koeln.de/vol/www/projekt/sanskrit-lexicon/http/docs/php/transcoder/transcoder.php');
 $pageua = $_GET['pageua']; // unadjusted page number
 $pageIn = $_GET['page'];
 if ($pageua) {
  $page = $pageua + (370 - 340);
 }else if ($pageIn) {
  $page = $pageIn;
 }
 if (!($page)) {
  $page = 7; // title page
 }
 if ($page) {
  $src = $page;
  $src = "'" . $src . "'";
  echo '<script type="text/javascript">' . "\n";
  echo 'function loadOnePage() {' . "\n";
  echo ' displaylink(' . $src . ");\n";
  echo "}\n";
  echo '</script>' . "\n";
  echo "</head>\n";
  echo '<body onload = "loadOnePage();">'  . "\n";
 } else {
  echo "</head>\n";
  echo "<body>\n";
 }
?>
<?php
function output_item_dummy ($word,$pagenum) {
 echo "<li>$pagenum</li>\n";
}
function orig_output_item ($word,$pagenum) {
//    $ref = "/cgi-bin/kale/servedisp2.pl?page=$pagenum";
    $ref = $pagenum;
    echo "<li><span class='leaf'>";
    if ($pagenum < 0) {
     $temp = 0 - $pagenum;
     echo "<span class='pagenum'>($temp)</span>";
    }else {
     echo "<span class='pagenum'>$pagenum</span>";
    }
    echo "&nbsp;&nbsp;";
    echo "<a class=\"lplink\" onclick=\"displaylink('" . $ref .
         "');\"><span class=\"linkword\">$word</span></a>";
          
    echo "</span></li>";
    echo "\n";
 }
?>

<div id="titlediv">
<table width="100%"><tr>
<td>
  <img id="unilogo" src="/images/unilogo.gif"
   alt="University of Cologne" width="52" height="52">
</td>
<td align="center">
<span class="titlediv">Westergaard Dhatupatha <a href="help.html">Info</a> </span>
</td>
</tr></table>
</div>

<div id="botleftdiv" class="yui-skin-sam"></div>
<?php
function echo1 ($s) {echo("$s\n");}
function output_array_beg () {echo1("[");}
function output_array_end () {echo1("];");}
function addslashes1 ($s) {
 $s = '"' . $s . '"';
// return addslashes($s);
 return $s;
}
function output_html_node ($h,$comma) {
 $h = addslashes1($h);
 if($comma) {
  echo1("{type:'HTML',html:$h},");
 }else {
  echo1("{type:'HTML',html:$h}");
 }
}
function output_html_node_childbeg ($h,$expanded) {
 $h = addslashes1($h);
 if ($expanded) {
  echo1("{type:'HTML',html:$h,expanded:true,children:\n[");
 }else {
  echo1("{type:'HTML',html:$h,expanded:false,children:\n[");
 }
}
function output_html_node_childend ($comma) {
 if ($comma) {
  echo1("]},");
 }else {
  echo1("]}");
 }
}
?>
<?php
function output_item_prep ($word,$pagenum) {
    $ref = $pagenum;
    $ans = "";
    $ans = $ans . "<span class='leaf'>";
    $disppage = "";

    if ($disppage != "") {
     $ans = $ans . "<span class='pagenum'>$disppage</span>";
     $ans = $ans . "&nbsp;&nbsp;";
    }
    $ans = $ans . "<a class=\\\"lplink\\\" onclick=\\\"displaylink(\\'" . $ref .
         "\\');\\\"><span class='linkword'>$word</span></a>";
          
    $ans = $ans . "</span>";
    return ($ans);
 }
function output_item($word,$pagenum,$comma) {
 $ans = output_item_prep($word,$pagenum);
 output_html_node($ans,$comma);
}
function output_item_dpsection($word1,$pagenum,$comma) {
// transcode 'word1'
 $word = transcoder_processElements($word1,'slp1','deva','SA');
//transcoder_processElements($line,$from,$to,$tagname)
 $ans = output_item_prep($word,$pagenum);
 output_html_node($ans,$comma);
}
function output_section($word,$page) {
 $ans = "<span class='section'>$word</span>";
 output_html_node_childbeg($ans,FALSE);
}
?>
<script type="text/javascript">
<?php
//global variable to allow console inspection of tree:
echo1("var tree;");
echo1("var treeArr=");
output_array_beg();
output_section(" Preliminary material",1);
output_item("title page",7,TRUE);
output_item("Abbreviations",24,FALSE);
output_html_node_childend(TRUE);
output_section(" Dhatupatha",1);
output_item("Introduction",342,TRUE);
output_item_dpsection("&sect; 1. <SA>parasmEBAzaH</SA>",344,TRUE);
output_item_dpsection("&sect; 2. <SA>tavargIyAntA anudAttetaH</SA>",344,TRUE);
output_item_dpsection("&sect; 3. <SA>tavargIyAntA udAttetaH</SA>",344,TRUE);
output_item_dpsection("&sect; 4. <SA>kavargIyAntA anudAttetaH</SA>",345,TRUE);
output_item_dpsection("&sect; 5. <SA>kavargIyAntA udAttetaH</SA>",346,TRUE);
output_item_dpsection("&sect; 6. <SA>cavargIyAntA anudAttetaH</SA>",346,TRUE);
output_item_dpsection("&sect; 7. <SA>cavargIyAntA udAttetaH</SA>",347,TRUE);
output_item_dpsection("&sect; 8. <SA>wavargIyAntA anudAttetaH</SA>",348,TRUE);
output_item_dpsection("&sect; 9. <SA>wavargIyAntA udAttetaH</SA>",348,TRUE);
output_item_dpsection("&sect; 10. <SA>pavargIyAntA anudAttetaH</SA>",350,TRUE);
output_item_dpsection("&sect; 11. <SA>pavargIyAntA udAttetaH</SA>",350,TRUE);
output_item_dpsection("&sect; 12. <SA>anunAsikAntA anudAttetaH</SA>",350,TRUE);
output_item_dpsection("&sect; 13. <SA>anunAsikAntA udAttetaH</SA>",351,TRUE);
output_item_dpsection("&sect; 14. <SA>yaralavAntA anudAttetaH</SA>",351,TRUE);
output_item_dpsection("&sect; 15. <SA>yaralavAntA udAttetaH</SA>",351,TRUE);
output_item_dpsection("&sect; 16. <SA>uzmAntA anudAttetaH</SA>",352,TRUE);
output_item_dpsection("&sect; 17. <SA>uzmAntA udAttetaH</SA>",353,TRUE);
output_item_dpsection("&sect; 18. <SA>dyutAdayo 'nudAttetaH</SA>",354,TRUE);
output_item_dpsection("&sect; 19. <SA>GawAdayaH</SA>",355,TRUE);
output_item_dpsection("&sect; 20. <SA>jvalAdayaH</SA>",357,TRUE);
output_item_dpsection("&sect; 21. <SA>svaritetaH</SA>",357,TRUE);
output_item_dpsection("&sect; 22. <SA>ajYantAH</SA>",358,TRUE);
output_item_dpsection("&sect; 23. <SA>halantAH</SA>",359,TRUE);
output_item_dpsection("&sect; 32. <SA>parasmEpadinaH</SA>",371,TRUE);
output_item_dpsection("&sect; 34. <SA>ADfzAdvA</SA>",376,TRUE);
output_item_dpsection("&sect; 35. <SA>adantAH</SA>",377,FALSE);
output_html_node_childend(TRUE);

//output_html_node_childend(FALSE);

output_array_end();
?>

tree = new YAHOO.widget.TreeView("botleftdiv",treeArr);
tree.render(); 
</script>

<div id="rightpane"></div>
</body>
</html>