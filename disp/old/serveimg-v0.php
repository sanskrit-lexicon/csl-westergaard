<?php
// serveimg for Westergaard
// 12-28-2009, ejf
$pagein=$_GET['pagein'];
if (!$pagein) {$pagein='7';} // title page
$page=7;
if (preg_match('/^([0-9]+)$/',$pagein,$matches)) {
    $page=$matches[1];
}
//echo "page = $page, pagein = $pagein\n";
list ($filename,$fileprev,$filenext)=getfiles($page);
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
function getfiles($pagein) {
    $filelist="../wgfiles.txt";
    $fp = fopen($filelist,"r");
    if (!$fp) {
	return array(0,0,0);
    } 
    $fileprev=0;
    $filenext=0;
    $filename=0;
    $line=fgets($fp);
    $more = 1;
//    if ($pagein <= 24) {
//     $page1 = $pagein;
//    }else {
//     $page1 = $pagein + (370 - 344);
//    }
    $page1 = $pagein;
    $page = sprintf('%04d',$page1);
    while (($line)&& ($more == 1)) {
	$line = chop($line);
        if (!preg_match('/^Westergaard_([0-9]+)[.]jpg/',$line,$matches)) {
	    $line=fgets($fp);
	    continue;
	}
	$p=$matches[1];
        if ($p >= 368) {$p = ($p - (370 - 344));}
	if ($p == $page){
	    $filename=$line;
	    $line=fgets($fp);
            if($line) {
	     $line = chop($line);
	     if (preg_match('/^Westergaard_([0-9]+)[.]jpg/',$line,$matches)) {
                $p1 = $matches[1];
                if ($p1 >= 368) {$p1 = ($p1 - (370 - 344));}
		$filenext="$p1";
	     }
	    $more = 0;
           }
	} else {
	    $fileprev="$p";
	    $line=fgets($fp);
	}
    }
    fclose($fp);
    if ($more == 1) {
	return array(0,0,0);
    }
    if ($filename) {
	$filename = "/scans/MWScan/Westergaard/jpg/$filename";
    }

    return array($filename,$fileprev,$filenext);
}
function genDisplayFile($text,$file) {
    $href = "serveimg.php?pagein=$file";
    $a = "<a href='$href' class='nppage'><span class='nppage1'>$text</span>&nbsp;</a>";
    print "$a\n";
}
?>
