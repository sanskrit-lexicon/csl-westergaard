<!-- KALEScan/disp2/index.php  Dec 8, 2008 -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "//www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
    <title>KALE SCAN</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="kale.css">
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
 $pageua = $_GET['pageua']; // unadjusted page number
 $pageIn = $_GET['page'];
 $page = -999;
 if ($pageua) {
  $page = $pageua + 14;
 }else if ($pageIn) {
  $page = $pageIn;
 }
 if (!($page)) {
  $page = 5; // title page
 }
 if ($page == 999) {
//  $filename="/scans/KALEScan/KALEScanpng/kale_Page_$page.png";
  $src = "/cgi-bin/kale/servedisp2.pl?page=$page";
  $src = "'" . $src . "'";
  echo '<script type="text/javascript">' . "\n";
  echo 'function loadOnePage() {' . "\n";
  echo ' displaylink(' . $src . ")\n";
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
    $ref = "/cgi-bin/kale/servedisp2.pl?page=$pagenum";
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
<span class="titlediv">Kale Grammar <a href="help.html">SE</a> </span>
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
    $ref = "/cgi-bin/kale/servedisp2.pl?page=$pagenum";
    $ans = "";
    $ans = $ans . "<span class='leaf'>";
    if ($pagenum < 0) {
     $temp = 0 - $pagenum;
     $ans = $ans . "<span class='pagenum'>($temp)</span>";
    }else {
     $ans = $ans . "<span class='pagenum'>$pagenum</span>";
    }
    $ans = $ans . "&nbsp;&nbsp;";
    $ans = $ans . "<a class=\\\"lplink\\\" onclick=\\\"displaylink(\\'" . $ref .
         "\\');\\\"><span class='linkword'>$word</span></a>";
          
    $ans = $ans . "</span>";
    return ($ans);
 }
function output_item($word,$pagenum,$comma) {
 $ans = output_item_prep($word,$pagenum);
 output_html_node($ans,$comma);
}
?>
<script type="text/javascript">
<?php
//global variable to allow console inspection of tree:
echo1("var tree;");
echo1("var treeArr=");
output_array_beg();

 output_html_node("<span class='leaf'>Preliminary material</span>",TRUE);
 output_html_node_childbeg("<span class='leaf'>child node1</span>",FALSE);
 output_html_node("<span class='leaf'>Other material</span>",TRUE);
 output_item("title page",005,FALSE);
 output_html_node_childend(TRUE);
 output_html_node_childbeg("<span class='leaf'>child node2</span>",FALSE);
 output_html_node("child1",TRUE);
 output_html_node("child2",FALSE);
 output_html_node_childend(TRUE);
 output_html_node("<span class='leaf'>Tertiary material</span>",FALSE);

output_array_end();
?>

tree = new YAHOO.widget.TreeView("botleftdiv",treeArr);
tree.render(); 
</script>

</div> <!--botleftdiv-->
<div id="rightpane"></div>
