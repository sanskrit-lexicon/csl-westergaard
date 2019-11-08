<?php
// serveimg for tltab
// 11-27-2009, ejf
$filepfx=$_GET['filepfx'];
if (!$filepfx) {$filepfx='1-0002';}
$vol=1;
$page=1;
if (preg_match('/^([1-7])-([0-9]+)$/',$filepfx,$matches)) {
    $vol=$matches[1];
    $page=$matches[2];
}
list ($filename,$fileprev,$filenext)=getfiles($vol,$page);
//print $cgi->header(-type => 'text/html', -charset => 'UTF-8');
$HEADER='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
$HEADER .= 
  '<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">';
$HEADER .= '<head>';
$HEADER .= '<title>Cologne Scan</title>';
 
$HEADER .= "<link rel='stylesheet' type='text/css' href=\"/css/monier_serveimg.css\" />";
$HEADER .= "</head><body>\n";
print $HEADER ;
//$width0 = 3137;
//$height0 = 4465;
//$width = int ($width0 / 2);
//$height = int ($height0 / 2);
//675px × 900px
$width = 675;
$height = 900;
$widthpx = "$width" . "px";
$heightpx = "$height" . "px";
print "<img src=\"$filename\" width=\"$width\" height=\"$height\" />";
print "<div id='pagenav'>\n";
genDisplayFile("&lt;",$fileprev);
genDisplayFile("&gt;",$filenext);
print "</div>\n";
echo "</body></html>";
exit;
function getfiles($vol,$page) {
    $filelist="../../tlfiles.txt";
    $fp = fopen($filelist,"r");
    if (!$fp) {
	return array(0,0,0);
    } 
    $fileprev=0;
    $filenext=0;
    $filename=0;
    $line=fgets($fp);
    $more = 1;
    while (($line)&& ($more == 1)) {
	$line = chop($line);
        if (!preg_match('/^tl([1-7])-([0-9]+)--/',$line,$matches)) {
	    $line=fgets($fp);
	    continue;
	}
	$v=$matches[1];
	$p=$matches[2];
	if (($v == $vol) and ($p == $page)){
	    $filename=$line;
	    $line=fgets($fp);
            if($line) {
	     $line = chop($line);
	     if (preg_match('/^tl([1-7])-([0-9]+)--/',$line,$matches)) {
                $v1 = $matches[1];
                $p1 = $matches[2];
		$filenext="$v1-$p1";
	     }
	    $more = 0;
           }
	} else {
	    $fileprev="$v-$p";
	    $line=fgets($fp);
	}
    }
    fclose($fp);
    if ($more == 1) {
	return array(0,0,0);
    }
    if ($filename) {
	$filename = "/scans/TLScan/TLScanpng1/$filename.png";
    }

    return array($filename,$fileprev,$filenext);
    
}
function genDisplayFile($text,$file) {
    $href = "serveimg.php?filepfx=$file";
    $a = "<a href='$href' class='nppage'><span class='nppage1'>$text</span>&nbsp;</a>";
    print "$a\n";
}
?>
