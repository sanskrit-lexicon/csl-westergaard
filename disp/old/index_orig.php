<!-- KALEScan/disp2/index.php  Dec 8, 2008 -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "//www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
    <title>KALE SCAN</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="main.css">
    <!--<link rel="stylesheet" href="kale.css"> -->
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
 if ($pageua) {
  $page = $pageua + 14;
 }else if ($pageIn) {
  $page = $pageIn;
 }
 if (!($page)) {
  $page = 5; // title page
 }
 if ($page) {
//  $filename="/scans/KALEScan/KALEScanpng/kale_Page_$page.png";
//  $src = "/cgi-bin/kale/servedisp2.pl?page=$page";
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
//    $ref = "/cgi-bin/kale/servedisp2.pl?page=$pagenum";
    $ref = $pagenum;
    $ans = "";
    $ans = $ans . "<span class='leaf'>";
    $disppage = "";
    if ($pagenum <=5) {$pagenum = 5;}
  
    if ($pagenum < 15) {
    }else if ($pagenum <= 550)  {
     $disppage = $pagenum - 14;
    }else if ($pagenum <= 706) {
      $disppage = $pagenum - 550;
    }
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
function output_section($word,$page) {
// $ans = "<span class='pagenum'>$page</span>&nbsp;&nbsp;<span class='section'>$word</span>";
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
output_item("title page",5,TRUE);
output_item("publisher",6,TRUE);
output_item("Preface",7,TRUE);
output_item("Table of contents",11,TRUE);
output_item("Abbreviations",14,FALSE);
output_html_node_childend(TRUE);
output_section(" I. Alphabet",1);
output_item("I: Alphabet, &sect; 1.",15,TRUE);
output_item("&sect; 2. Devanagari alphabet",16,TRUE);
output_item("&sect; 3. Vowels",17,TRUE);
output_item("&sect; 4. Consonants",18,TRUE);
output_item("&sect; 5. Soft/hard consonants",19,TRUE);
output_item("&sect; 6. Other Sanskrit sounds",19,TRUE);
output_item("&sect; 7. Aspirates and unaspirates",20,TRUE);
output_item("&sect; 8. Alphabet table",20,TRUE);
output_item("&sect; 9. savarna letters",21,TRUE);
output_item("&sect; 10. svara, vyanjana",21,TRUE);
output_item("&sect; 11. syllable",22,TRUE);
output_item("&sect; 12. vowel signs",22,TRUE);
output_item("&sect; 12. compound consonants",22,TRUE);
output_item("&sect; 13. punctuation",24,TRUE);
output_item("&sect; 13. avagraha",24,TRUE);
output_item("&sect; 14. prosodially long vowel",24,TRUE);
output_item("&sect; 15. guna and vrddhi",24,TRUE);
output_item("&sect; 16. semivowels",25,TRUE);
output_item("&sect; 17. numerical figures",25,FALSE);
output_html_node_childend(TRUE);

output_section(" II. Rules of Sandhi",12);
output_item("II. Rules of Sandhi",26,TRUE);
output_item("<span class='section'>Svara-sandhi</span>",26,TRUE);
output_item("&sect; 19 similar simple vowels",26,TRUE);
output_item("&sect; 20 <span class='san'>a</span> + simple vowel",27,TRUE);
output_item("&sect; 21 <span class='san'>a</span> plus diphthong",29,TRUE);
output_item("&sect; 22 <span class='san'>i</span> plus vowel",31,TRUE);
output_item("&sect; 23 <span class='san'>i</span> plus vowel (optional); ",32,TRUE);
output_item("&sect; 24 diphthong plus vowel",33,TRUE);
output_item("&sect; 25 diphthong plus <span class='san'>a</span>",34,TRUE);
output_item("&sect; 26 sandhi exceptions, <span class='san'>pragfhya</span>",34,TRUE);
output_item("sandhi exceptions, pluta vowels",35,TRUE);
output_item("&sect; 27. particle <span class='san'>u</span>",36,TRUE);
output_item("<span class='section'>Hal-sandhi</span>. &sect; 28. dental",36,TRUE);
output_item("&sect; 29. dental plus cerebral sibilant",37,TRUE);
output_item("&sect; 30. consonant plus nasal",37,TRUE);
output_item("&sect; 31. dental plus <span class='san'>l</span>",37,TRUE);
output_item("&sect; 32. <span class='san'>ud</span> plus <span class='san'>sTA</span>",38,TRUE);
output_item("&sect; 33. consonant plus <span class='san'>h</span>",38,TRUE);
output_item("&sect; 34. consonant plus hard consonant",38,TRUE);
output_item("&sect; 35. consonant plus <span class='san'>S</span>",38,TRUE);
output_item("&sect; 36. <span class='san'>m</span> at end of word",38,TRUE);
output_item("&sect; 37. anusvara plus consonant",39,TRUE);
output_item("&sect; 38. <span class='san'>N</span> or <span class='san'>R</span> plus sibilant",39,TRUE);
output_item("&sect; 38. <span class='san'>N</span> or <span class='san'>n</span> plus sibilant or vowel",40,TRUE);
output_item("&sect; 40. <span class='san'>n</span> plus <span class='san'>S</span>",40,TRUE);
output_item("&sect; 41. <span class='san'>n</span>  -> <span class='san'>R</span>",40,TRUE);
output_item("&sect; 42. <span class='san'>s</span>  -> <span class='san'>z</span>",41,TRUE);
output_item("&sect; 43. <span class='san'>m</span>",41,TRUE);
output_item("&sect; 44. insert <span class='san'>c</span> before <span class='san'>C</span>",42,TRUE);
output_item("<span class='section'>Visarga-sandhi</span>.  &sect; 45. <span class='san'>s</span>  -> <span class='san'>H</span>",42,TRUE);
output_item("&sect; 46. <span class='san'>H</span> -> <span class='san'>s</span>",43,TRUE);
output_item("&sect; 47. <span class='san'>aH</span> -> <span class='san'>o</span>",45,TRUE);
output_item("&sect; 48. <span class='san'>AH</span> -> <span class='san'>A</span>",45,TRUE);
output_item("&sect; 49. vowel plus <span class='san'>H</span> -> vowel plus <span class='san'>r</span>",45,TRUE);
output_item("&sect; 50. <span class='san'>saH</span> -><span class='san'>sa</span>",46,FALSE);
output_html_node_childend(TRUE);

output_section(" III. Declension of nouns",32);
output_item("III. Declension of nouns",46,TRUE);
output_item("&sect; 57. Normal case terminations",48,TRUE);
output_section("Bases ending in vowels",48,TRUE);
//output_item("<span class='section'>Bases ending in vowels</span>",48,TRUE);
output_item("&sect; 61. Nouns in  <span class='san'>a</span>.  <span class='san'>rAma</span>  <span class='san'>jYAna</span>",49,TRUE);
output_item("&sect; 63. Nouns in <span class='san'>A</span>.  <span class='san'>gopA</span>",49,TRUE);
output_item("&sect; 65. <span class='san'>ramA</span>",50,TRUE);
output_item("&sect; 69. Nouns in  <span class='san'>i</span> and <span class='san'>u</span>.  <span class='san'>hari</span>  <span class='san'>mati</span>  <span class='san'>guru</span>",51,TRUE);
output_item("<span class='san'>Denu</span> <span class='san'>vAri</span> ",52,TRUE);
output_item("<span class='san'>maDu</span> ",53,TRUE);
output_item("&sect; 70. <span class='san'>Suci</span> <span class='san'>guru</span> ",53,TRUE);
output_item("&sect; 72. Irregular bases. <span class='san'>saKi</span> <span class='san'>pati</span>",54,TRUE);
output_item("&sect; 75. Words in  <span class='san'>I</span> and <span class='san'>U</span>. <span class='san'>nadI</span>",55,TRUE);
output_item("<span class='san'>vaDU</span>",56,TRUE);
output_item("&sect; 76. Mas. nouns in <span class='san'>I</span>. <span class='san'>vAtapramI</span>",56,TRUE);
output_item("&sect; 77. Root nouns in <span class='san'>I</span> and <span class='san'>U</span>.  <span class='san'>DI</span> and <span class='san'>BU</span>.",57,TRUE);
output_item("<span class='san'>praDI</span> and <span class='san'>KalapU</span>.",58,TRUE);
output_item("<span class='san'>praDI</span>",59,TRUE);
output_item("<span class='san'>suDI</span> <span class='san'>svaBU</span>",60,TRUE);
output_item("<span class='san'>suDi</span>",60,TRUE);
output_item("<span class='san'>varzABU</span> &sect; 78. <span class='san'>saKI</span>",61,TRUE);
output_item("&sect; 79. <span class='san'>strI</span> <span class='san'>atistri</span>",62,TRUE);
output_item("&sect; 80. <span class='san'>hUhU</span>",62,TRUE);
output_item("&sect; 81. Nouns in  <span class='san'>f</span>.  <span class='san'>DAtf</span>",63,TRUE);
output_item("&sect; 82. <span class='san'>pitf</span>  <span class='san'>mAtf</span>",64,TRUE);
output_item("&sect; 83.  <span class='san'>krozwu</span>",64,TRUE);
output_item("&sect; 84. Words in <span class='san'>F</span> and <span class='san'>x</span>",65,TRUE);
output_item("&sect; 85. Words in <span class='san'>e</span> and <span class='san'>E</span>.  <span class='san'>se</span> and <span class='san'>rE</span> ",66,TRUE);
output_item("&sect; 85. Words in <span class='san'>o</span> and <span class='san'>O</span>.  <span class='san'>go</span> and <span class='san'>glO</span> ",67,FALSE);
output_html_node_childend(TRUE);
output_section("Bases ending in consonants",68);
output_item("&sect; 88. Bases in <span class='san'>r</span>, <span class='san'>l</span>, <span class='san'>R</span>. <span class='san'>kamal</span>",68,TRUE);
output_item("&sect; 90. Bases in <span class='san'>k</span>,<span class='san'>g</span>,<span class='san'>w</span>,<span class='san'>q</span>,<span class='san'>t</span>,<span class='san'>d</span>,<span class='san'>p</span>,<span class='san'>b</span>",69,TRUE);
output_item("&sect; 92. <span class='san'>samiD</span>",69,TRUE);
output_item("<span class='san'>sarvak</span>, etc",70,TRUE);
output_item("&sect; 93. Bases in <span class='san'>c</span>,<span class='san'>j</span>,<span class='san'>S</span>,<span class='san'>z</span>,<span class='san'>h</span>",70,TRUE);
output_item("&sect; 93. <span class='san'>vAc</span> <span class='san'>rAj</span>",71,TRUE);
output_item("<span class='san'>muh</span>",73,TRUE);
output_item("&sect; 98. Irregular bases. <span class='san'>turAsAh</span> ",74,TRUE);
output_item("&sect; 99. <span class='san'>viSvarAw</span> ",74,TRUE);
output_item("&sect; 100. Root nouns in <span class='san'>vAh</span> ",74,TRUE);
output_item("&sect; 101. <span class='san'>upAnah</span>",75,TRUE);
output_item("&sect; 102. <span class='san'>anaquh</span>",75,TRUE);
output_item("&sect; 103. <span class='san'>avayAj</span>, <span class='san'>puroqAS</span>",75,TRUE);
output_item("&sect; 104. Nouns from <span class='san'>aYc</span>",76,TRUE);
output_item("<span class='san'>prAYc</span>, <span class='san'>pratyaYc</span>. <span class='san'>tiryaYc</span>",77,FALSE);
output_html_node_childend(TRUE);
output_section("Irregular bases",1);
output_item("&sect; 105. <span class='san'>kruYc</span>",79,TRUE);
output_item("&sect; 105. <span class='san'>Urj</span>",80,TRUE);
output_item("&sect; 106. Nouns in <span class='san'>m</span>. <span class='san'>praSAm</span>",80,TRUE);
output_item("&sect; 108. Nouns in <span class='san'>s</span>. <span class='san'>candramas</span>",80,TRUE);
output_item("<span class='san'>manas</span>, <span class='san'>udarcis</span>, <span class='san'>suvas</span>",81,TRUE);
output_item("&sect; 110. <span class='san'>BAs</span>. &sect; 112. Irregular bases",82,TRUE);
output_item("&sect; 113. <span class='san'>puMs</span>. &sect; 113. <span class='san'>pipaWiz</span>.",83,TRUE);
output_item("&sect; 115. Nouns in <span class='san'>at</span>, <span class='san'>mat</span>, and <span class='san'>vat</span>. <span class='san'>DImat</span>",84,TRUE);
output_item("<span class='san'>mahatat</span>",85,TRUE);
output_item("&sect; 116. Participles ending in <span class='san'>at</span>.",85,TRUE);
output_item("<span class='san'>Bavat</span>, <span class='san'>dadat</span>",86,TRUE);
output_item("&sect; 117. Nouns in <span class='san'>an</span> and <span class='san'>in</span>",87,TRUE);
output_item("<span class='san'>brahman</span>, <span class='san'>rAjan</span>",87,TRUE);
output_item("<span class='san'>nAman</span>",89,TRUE);
output_item("Irregular: &sect; 118. <span class='san'>puzan</span>, <span class='san'>vftrahan</span>",89,TRUE);
output_item("&sect; 119. <span class='san'>Svan</span>",90,TRUE);
output_item("<span class='san'>maGavan</span>, <span class='san'>yuvan</span>",91,TRUE);
output_item("&sect; 120. <span class='san'>ahan</span>",91,TRUE);
output_item("&sect; 121. <span class='san'>arvan</span>",92,TRUE);
output_item("&sect; 122. Words in <span class='san'>in</span>",92,TRUE);
output_item("<span class='san'>karin</span>, <span class='san'>daRqin</span>",93,TRUE);
output_item("&sect; 123. Irregular bases. <span class='san'>paTin</span>",93,TRUE);
output_item("&sect; 124. Bases in <span class='san'>vas</span>. <span class='san'>vidvas</span>",94,TRUE);
output_item("&sect; 125. Bases in <span class='san'>yas</span>, <span class='san'>Iyas</span>. <span class='san'>Sreyas</span>",95,TRUE);
output_html_node_childend(TRUE);
output_section("Words of irregular declension",1);
output_item("&sect; 126-8. <span class='san'>asTi</span>, <span class='san'>ap</span>, <span class='san'>jarA</span>",96,TRUE);
output_item("&sect; 129. <span class='san'>dos</span>",97,TRUE);
output_item("<span class='san'>niSA</span>, <span class='san'>sAnu</span>, <span class='san'>pAda</span>",98,TRUE);
output_item("<span class='san'>danta</span>, <span class='san'>nAsikA</span>, <span class='san'>mAsa</span>, <span class='san'>hfdaya</span>, <span class='san'>asfj</span>",99,TRUE);
output_item("<span class='san'>yUza</span>, <span class='san'>yakft</span>, <span class='san'>Sakft</span>, <span class='san'>udaka</span>, <span class='san'>Asya</span>",100,TRUE);
output_item("<span class='san'>pftana</span>.",101,TRUE);
output_item("&sect; 130. Suffixes <span class='san'>tas</span>, <span class='san'>tra</span>",101,TRUE);
output_html_node_childend(TRUE);
output_item("&sect; 131. Indeclineable nouns",101,FALSE);
output_html_node_childend(TRUE);

output_section(" IV. Pronouns and their Declension",87);
output_item("&sect; 132. pronouns",101,TRUE);
output_item("<span class='section'>Personal Pronouns</span>",102,TRUE);
output_item("&sect; 133. <span class='san'>asmad</span>, <span class='san'>yuzmad</span>",102,TRUE);
output_item("&sect; 134. short forms of <span class='san'>asmad</span>, <span class='san'>yuzmad</span>",103,TRUE);
output_item("<span class='section'>Demonstrative Pronouns</span>",104,TRUE);
output_item("&sect; 135. <span class='san'>tad</span>",104,TRUE);
output_item("<span class='san'>etad</span>",105,TRUE);
output_item("<span class='san'>idam</span>, <span class='san'>adas</span>",106,TRUE);
output_item("<span class='section'>Relative Pronouns</span>",107,TRUE);
output_item("&sect; 138. <span class='san'>yad</span>",108,TRUE);
output_item("<span class='section'>Interrogative Pronouns</span>",108,TRUE);
output_item("&sect; 139. <span class='san'>kim</span>",108,TRUE);
output_item("<span class='section'>Reflexive Pronouns</span>",109,TRUE);
output_item("<span class='section'>Indefinite Pronouns</span>",109,TRUE);
output_item("<span class='section'>Correlative Pronouns</span>",109,TRUE);
output_item("<span class='section'>Reciprocal Pronouns</span>",110,TRUE);
output_item("<span class='section'>Possessive Pronouns</span>",110,TRUE);
output_item("&sect; 146. <span class='san'>asmat</span>, <span class='san'>yuzmat</span>",110,TRUE);
output_item("<span class='section'>Pronominal Adjectives</span>",111,TRUE);
output_item("&sect; 147. <span class='san'>katara</span>",111,TRUE);
output_item("<span class='san'>sarva</span>",112,TRUE);
output_item("<span class='section'>Pronominal Adverbs</span>",114,FALSE);
output_html_node_childend(TRUE);

output_section(" V. Numerals and their Declension",102);
output_item("&sect; 159. Cardinals/Ordinals 1-16",116,TRUE);
output_item("Cardinals/Ordinals 17-41",117,TRUE);
output_item("Cardinals/Ordinals 42-67",118,TRUE);
output_item("Cardinals/Ordinals 68-93",119,TRUE);
output_item("Cardinals/Ordinals 94-100, etc.",120,TRUE);
output_item("&sect; 165. <span class='san'>tri</span>, <span class='san'>catur</span>, <span class='san'>paYcan</span>",122,TRUE);
output_item("<span class='section'>Numeral Adverbs</span>",123,FALSE);
output_html_node_childend(TRUE);

output_section(" VI. Degree of Comparison",110);
output_item("&sect; 171. <span class='san'>tara</span>, <span class='san'>tama</span>",124,TRUE);
output_item("&sect; 174. <span class='san'>Iyas</span>, <span class='san'>izwa</span>",125,TRUE);
output_item("&sect; 177. Irregular comparatives and superlatives",126,FALSE);
output_html_node_childend(TRUE);

output_section(" VII. Compounds",113);
output_item("VII. Compounds",127,TRUE);
output_item("1 Dwandwa compounds",129,TRUE);
output_item("2 Tatpurusha compounds",135,TRUE);
output_item("3 Karmadharaya compounds",147,TRUE);
output_item("4 Upapada compounds",158,TRUE);
output_item("5 Bahuvrihi compounds",165,TRUE);
output_item("6 Avyayibhava compounds",177,TRUE);
output_item("7 General rules for compounds",182,TRUE);
output_item("8 Other changes for compounds",185,FALSE);
output_html_node_childend(TRUE);

output_section(" VIII. Formation of Feminine Bases",180);
output_item("VIII. Formation of Feminine Bases",194,FALSE);
output_html_node_childend(TRUE);

output_section(" IX. Secondary Nominal Bases",194);
output_item("<span class='san'>tadDita</span> affixes",208,TRUE);
output_item("<span class='section'>miscellaneous affixes</span>",209,TRUE);
output_item("<span class='section'>Affixes showing possession</span>",223,TRUE);
output_item("<span class='section'>Affixes forming adverbs</span>",228,TRUE);
output_item("<span class='section'>Irregular adverbs of time</span>",230,FALSE);
output_html_node_childend(TRUE);

output_section(" X. Gender",216);
output_item("X. Gender",230,TRUE);
output_item("<span class='section'>Masculine words</span>",231,TRUE);
output_item("<span class='section'>Feminine words</span>",233,TRUE);
output_item("<span class='section'>Neuter words</span>",234,TRUE);
output_item("<span class='section'>Words masculine and feminine</span>",235,TRUE);
output_item("<span class='section'>Words masculine and neuter</span>",236,TRUE);
output_item("<span class='section'>Words feminine and neuter</span>",237,FALSE);
output_html_node_childend(TRUE);

output_section(" XI. Avyayas or Indeclinables",223);
output_item("XI. Avyayas or Indeclinables",237,TRUE);
output_item("<span class='section'>Prepositions</span>",238,TRUE);
output_item("<span class='section'>Adverbs</span>",242,TRUE);
output_item("<span class='section'>Particles</span>",249,TRUE);
output_item("<span class='section'>Conjunctions</span>",250,TRUE);
output_item("<span class='section'>Interjections</span>",251,FALSE);
output_html_node_childend(TRUE);

output_section(" XII. Conjugation of Verbs",238);
output_item("XII. Conjugation of Verbs",252,TRUE);
output_item("<span class='section'>Active voice</span>",254,TRUE);
output_item("<span class='section'>Classes 1,4,6,10</span>",255,TRUE);
output_item("<span class='section'>Classes 1,4,6,10 (Irregular);</span>",262,TRUE);
output_item("<span class='section'>Classes 2,3,5,7,8,9</span>",268,TRUE);
output_item("<span class='section'>General tenses and moods</span>",309,TRUE);
output_item("a. <span class='section'>First future</span>",312,TRUE);
output_item("b. <span class='section'>Second future and conditional</span>",314,TRUE);
output_item("c. <span class='section'>Perfect</span>",320,TRUE);
output_item("c1. <span class='section'>Irregular bases</span>",337,TRUE);
output_item("c2. <span class='section'>Periphrastic perfect</span>",343,TRUE);
output_item("d. <span class='section'>Aorist - 1st variety</span>",346,TRUE);
output_item("<span class='section'>Aorist - 2nd variety</span>",347,TRUE);
output_item("<span class='section'>Aorist - 3rd variety</span>",354,TRUE);
output_item("<span class='section'>Aorist - 6th variety</span>",358,TRUE);
output_item("<span class='section'>Aorist - 7th variety</span>",359,TRUE);
output_item("<span class='section'>Aorist - 4th variety</span>",361,TRUE);
output_item("<span class='section'>Aorist - 5th variety</span>",366,TRUE);
output_item("e. <span class='section'>Benedictive</span>",370,TRUE);
output_item("<span class='section'>Passive voice</span>",373,TRUE);
output_item("<span class='section'>Passive: conjugational tenses</span>",374,TRUE);
output_item("<span class='section'>Passive: general tenses/moods</span>",378,TRUE);
output_item("<span class='section'>Derivative Verbs</span>",381,TRUE);
output_item("a. <span class='section'>Causals</span>",382,TRUE);
output_item("b. <span class='section'>Desideratives</span>",390,TRUE);
output_item("c. <span class='section'>Frequentatives</span>",398,TRUE);
output_item("d. <span class='section'>Nominal Verbs</span>",406,FALSE);
output_html_node_childend(TRUE);

output_section(" XIII. Parasmaipada / Atmanepada",399);
output_item("XIII. Parasmaipada / Atmanepada",413,TRUE);
output_html_node_childend(TRUE);

output_section(" XIV. Verbal Derivatives",416);
output_item("XIV. Verbal Derivatives",430,FALSE);
output_html_node_childend(TRUE);

output_section(" XV. Syntax",468);
output_item("XV. Syntax",482,TRUE);
output_item("The article",483,TRUE);
output_item("Concord",488,TRUE);
output_item("Government",489,TRUE);
output_item("Pronouns",522,TRUE);
output_item("Comparative and superlative",524,TRUE);
output_item("Participles",525,TRUE);
output_item("Tenses and moods",532,TRUE);
output_item("Indeclineables",546,FALSE);
output_html_node_childend(TRUE);

output_section(" Appendix II: Dhatukosha",1);
output_section("a",1);
output_item("aMS",551,TRUE);
output_item("ag",552,TRUE);
output_item("aYc",553,TRUE);
output_item("aww",554,TRUE);
output_item("am",555,TRUE);
output_item("ard",556,TRUE);
output_item("aS",557,FALSE);
output_html_node_childend(TRUE);
output_section("i",1);
output_item("i",558,TRUE);
output_item("iz",559,TRUE);
output_item("Ir",560,TRUE);
output_item("ucC",561,TRUE);
output_item("Un",562,TRUE);
output_item("fc",563,TRUE);
output_item("F",564,FALSE);
output_html_node_childend(TRUE);
output_section("k",1);
output_item("kak",565,TRUE);
output_item("katT",566,TRUE);
output_item("kal",567,TRUE);
output_item("kit",568,TRUE);
output_item("kuR",569,TRUE);
output_item("kuh",570,TRUE);
output_item("kfS",571,TRUE);
output_item("knaT",572,TRUE);
output_item("kruS",573,TRUE);
output_item("klIv",574,TRUE);
output_item("kzam",575,TRUE);
output_item("kzI",576,TRUE);
output_item("kzE",577,TRUE);
output_item("Kad",578,TRUE);
output_item("Kaz",579,FALSE);
output_html_node_childend(TRUE);
output_section("g",1);
output_item("gaYj",580,TRUE);
output_item("garv",581,TRUE);
output_item("gu",582,TRUE);
output_item("gup",583,TRUE);
output_item("gfj",584,TRUE);
output_item("granT",585,TRUE);
output_item("glep",586,TRUE);
output_item("Gu",587,TRUE);
output_item("Gf",588,FALSE);
output_html_node_childend(TRUE);
output_section("c",1);
output_item("cakz",589,TRUE);
output_item("cap",590,TRUE);
output_item("cal",591,TRUE);
output_item("cil",592,TRUE);
output_item("cumb",593,TRUE);
output_item("Cad",594,TRUE);
output_item("Ced",595,FALSE);
output_html_node_childend(TRUE);
output_section("j",1);
output_item("jamB",596,TRUE);
output_item("jim",597,TRUE);
output_item("jF",598,TRUE);
output_item("jvar",599,TRUE);
output_item("wIk",600,FALSE);
output_html_node_childend(TRUE);
output_section("t",1);
output_item("takz",601,TRUE);
output_item("tap",602,TRUE);
output_item("tik",603,TRUE);
output_item("tu",604,TRUE);
output_item("tump",605,TRUE);
output_item("tfd",606,TRUE);
output_item("tfMh",607,TRUE);
output_item("tras",608,TRUE);
output_item("tvaNg",609,FALSE);
output_html_node_childend(TRUE);
output_section("d",1);
output_item("daG",610,TRUE);
output_item("das",611,TRUE);
output_item("div",612,TRUE);
output_item("du",613,TRUE);
output_item("dfp",614,TRUE);
output_item("dev",615,TRUE);
output_item("druR",616,FALSE);
output_html_node_childend(TRUE);
output_section("D",1);
output_item("Danv",617,TRUE);
output_item("DU",618,TRUE);
output_item("Dfj",619,TRUE);
output_item("DraR",620,TRUE);
output_item("Dvan",621,TRUE);
output_item("nal",622,TRUE);
output_item("nid",623,TRUE);
output_item("nft",624,FALSE);
output_html_node_childend(TRUE);
output_section("p",1);
output_item("paW",625,TRUE);
output_item("pad",626,TRUE);
output_item("pAl",627,TRUE);
output_item("pis",628,TRUE);
output_item("pur",629,TRUE);
output_item("pUrR",630,TRUE);
output_item("pfYj",631,TRUE);
output_item("praT",632,TRUE);
output_item("proT",633,TRUE);
output_item("Pull",634,FALSE);
output_html_node_childend(TRUE);
output_section("b",1);
output_item("bal",635,TRUE);
output_item("bust",636,TRUE);
output_item("Baj",637,TRUE);
output_item("Baz",638,TRUE);
output_item("Buj",639,TRUE);
output_item("Bf",640,TRUE);
output_item("Braz",641,FALSE);
output_html_node_childend(TRUE);
output_section("m",1);
output_item("maMh",642,TRUE);
output_item("maW",643,TRUE);
output_item("man",644,TRUE);
output_item("marv",645,TRUE);
output_item("mA",646,TRUE);
output_item("mid",647,TRUE);
output_item("mI",648,TRUE);
output_item("muRt",649,TRUE);
output_item("mus",650,TRUE);
output_item("mfkz",651,TRUE);
output_item("mfz",652,TRUE);
output_item("mnA",653,TRUE);
output_item("mlO",654,FALSE);
output_html_node_childend(TRUE);
output_section("y",1);
output_item("yam",655,TRUE);
output_item("yuj",656,TRUE);
output_item("rakz",657,TRUE);
output_item("raD",658,TRUE);
output_item("ras",659,TRUE);
output_item("riK",660,TRUE);
output_item("ru",661,TRUE);
output_item("ruD",662,TRUE);
output_item("rUz",663,FALSE);
output_html_node_childend(TRUE);
output_section("l",1);
output_item("laNg",664,TRUE);
output_item("lamb",665,TRUE);
output_item("lAK",666,TRUE);
output_item("lI",667,TRUE);
output_item("luq",668,TRUE);
output_item("lUz",669,FALSE);
output_html_node_childend(TRUE);
output_section("v",1);
output_item("vac",670,TRUE);
output_item("van",671,TRUE);
output_item("val",672,TRUE);
output_item("vah",673,TRUE);
output_item("vicC",674,TRUE);
output_item("viD",675,TRUE);
output_item("vfj",676,TRUE);
output_item("vfz",677,TRUE);
output_item("vyac",678,TRUE);
output_item("vrI",679,FALSE);
output_html_node_childend(TRUE);
output_section("S",1);
output_item("SaW",680,TRUE);
output_item("Saz",681,TRUE);
output_item("Siz",682,TRUE);
output_item("SuW",683,TRUE);
output_item("SUr",684,TRUE);
output_item("Scyut",685,TRUE);
output_item("Sri",686,TRUE);
output_item("Slok",687,TRUE);
output_item("Svind",688,FALSE);
output_html_node_childend(TRUE);
output_section("s",1);
output_item("satr",689,TRUE);
output_item("sarv",690,TRUE);
output_item("siw",691,TRUE);
output_item("suK",692,TRUE);
output_item("sfj",693,TRUE);
output_item("skund",694,TRUE);
output_item("stu",695,TRUE);
output_item("sTag",696,TRUE);
output_item("snE",697,TRUE);
output_item("sPuw",698,TRUE);
output_item("smf",699,TRUE);
output_item("sru",700,TRUE);
output_item("svask",701,FALSE);
output_html_node_childend(TRUE);
output_section("h",1);
output_item("hamm",702,TRUE);
output_item("hikk",703,TRUE);
output_item("hf",704,TRUE);
output_item("has",705,TRUE);
output_item("hlAd",706,FALSE);
output_html_node_childend(FALSE);
output_html_node_childend(FALSE);

output_array_end();
?>

tree = new YAHOO.widget.TreeView("botleftdiv",treeArr);
tree.render(); 
</script>

<div id="rightpane"></div>
</body>
</html>
