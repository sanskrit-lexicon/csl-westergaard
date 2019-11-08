<?php
// serveimg for Westergaard
// 12-28-2009, ejf
$pagein=$_GET['page'];
if (!$pagein) {$pagein = $argv[1];}
if (!$pagein) {$pagein='7';} // title page
$page=7;
if (preg_match('/^([0-9]+)$/',$pagein,$matches)) {
    $page=$matches[1];
}
//echo "page = $page, pagein = $pagein\n";
list ($filename,$fileprev,$filenext)=getfiles($page);
//$width0 = 978;
//$height0 = 1450;
//$width = int ($width0 / 2);
//$height = int ($height0 / 2);
//675px × 900px
$width = 978;
$height = 1450;
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
    $page1 = $pagein;
    $page = sprintf('%04d',$page1);
    while (($line)&& ($more == 1)) {
	$line = chop($line);
        if (!preg_match('/^Westergaard_([0-9]+)[.]jpg/',$line,$matches)) {
	    $line=fgets($fp);
	    continue;
	}
	$p=$matches[1];
        $ptemp = $p;
        if ($p >= 368) {$p = ($p - (370 - 344));}
//        echo "ptemp = $ptemp, p = $p, page = $page\n";
	if ($p == $page){
	    $filename=$line;
	    $line=fgets($fp);
            $more = 0;
            if($line) {
	     $line = chop($line);
	     if (preg_match('/^Westergaard_([0-9]+)[.]jpg/',$line,$matches)) {
                $p1 = $matches[1];
                if ($p1 >= 368) {$p1 = ($p1 - (370 - 344));}
		$filenext="$p1";
	     }
//	    $more = 0;
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
	//$filename = "/scans/MWScan/Westergaard/jpg/$filename";
        // Dec 14, 2014
	$filename = "../jpg/$filename";
    }

    return array($filename,$fileprev,$filenext);
}
function genDisplayFile($text,$file) {
    $href = $file;
    $a = "<a class=\"nppage\" onclick=\"displaylink('" . $href . "');\"><span class='nppage1'>$text</span></a>";
    print "$a\n";
}
function old_genDisplayFile($text,$file) {
    $href = "serveimg.php?pagein=$file";
    $a = "<a href='$href' class='nppage'><span class='nppage1'>$text</span>&nbsp;</a>";
    print "$a\n";
}
?>
