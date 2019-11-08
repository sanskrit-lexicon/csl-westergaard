
<?php
function output_items ($filenamein) {
 $filename= "../disp1/files1/" . $filenamein;
 $file=fopen($filename,"r") or exit("Unable to open file $filename");
 $n = 0;
 $m = 9999; // make smaller for testing
 $pattern='/^(kale_Page_)([0-9]+)([ ]+)(.*?)$/';
 $pattern1='/^&sect; (.*?)$/';
 echo "<?php\n";
 while(((!feof($file)) && ($n < $m))) {
   $n++;
   $line = fgets($file);
   if (preg_match($pattern,$line,$matches)) {
    $reffile=$matches[1];
    $pagenum= $matches[2];
    $reffile = $reffile . $pagenum;
    $code = $matches[3];
    $word = $matches[4];
    if ($word == "") { // don't output un-annotated pages
     $word = "->";
    }else {
     if (preg_match($pattern1,$word,$matches)) {
#      $word = $matches[1];
     }
     $disppage = "";
     if (($pagenum > 14)&& ($pagenum <= 550)) {
      $disppage = $pagenum - 14;
     }else if (($pagenum > 550) && ($pagenum <= 706)) {
      $disppage = $pagenum - 550;
     }
     echo "output_item(\"$word\",$pagenum);\n";
    }
   }
  }
  echo "?>\n";
 fclose($file);
}
function output_item ($filenamein,$word,$pagenum,$disppage,$code) {
#    if ($disppage != "") {
      echo "<li> <span class='pagenum'>$disppage</span> $word</li>\n";
      echo "<ul> <!-- $filenamein -->\n";
      output_items($filenamein);
      echo "</ul> <!-- $filenamein -->\n";
#    }
 }
function output_top (){
 $outfile = "kaletop.txt";
 $filename="../disp1/files1/$outfile";
 $file=fopen($filename,"r") or exit("Unable to open file $filename");
 $n = 0;
 $m = 9999; // make smaller for testing
 $pattern='/^(kale_Page_)([0-9]+)[ ]+([^ ]+)[ ]+(.*?)$/';
 echo "<ul> <!-- $outfile -->\n";
 while(((!feof($file)) && ($n < $m))) {
   $n++;
   $line = fgets($file);
   if (preg_match($pattern,$line,$matches)) {
    $reffile=$matches[1];
    $pagenum= $matches[2];
    $reffile = $reffile . $pagenum;
    $code = $matches[3];
    $word = $matches[4];
    if ($word != ""){
     $disppage = "";
     if (($pagenum > 14)&& ($pagenum <= 550)) {
      $disppage = $pagenum - 14;
     }else if (($pagenum > 550) && ($pagenum <= 706)) {
      $disppage = $pagenum - 550;
     }
     $filename="kale" . $code . ".txt";
     output_item($filename,$word,$pagenum,$disppage,$code);
    }
   }
  }
   echo "</ul> <!-- $outfile -->\n";

 fclose($file);
}
output_top();
?>
