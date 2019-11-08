<!-- KALEScan/disp2/index.php  Dec 8, 2008 -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "//www.w3.org/TR/html4/loose.dtd">
<!--
<html xmlns="//www.w3.org/1999/xhtml"  lang="en" xml:lang="en">
-->
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
 if ($page) {
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
 $sfx = "png";
 $dir="/scans/KALEScan/KALEScan" . $sfx . "/";
function output_item1($pagenum,$word) {
 output_item($word,$pagenum);
}
function output_item ($word,$pagenum) {
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

<div id="botleftdiv"> <!--class="yui-skin-sam"> -->

<ul>
<li> <span class='pagenum'></span> Preliminary material
<ul>
<?php
output_item("title page",005);
output_item("publisher",006);
output_item("Preface",007);
output_item("Table of contents",011);
output_item("Abbreviations",014);
?>
</ul></li> <!-- kale00.txt -->
<li> <span class='pagenum'>1</span> I. Alphabet
<ul> <!-- kale01.txt -->
<?php
output_item("I: Alphabet, &sect; 1.",015);
output_item("&sect; 2. Devanagari alphabet",016);
output_item("&sect; 3. Vowels",017);
output_item("&sect; 4. Consonants",018);
output_item("&sect; 5. Soft/hard consonants",019);
output_item("&sect; 6. Other Sanskrit sounds",019);
output_item("&sect; 7. Aspirates and unaspirates",020);
output_item("&sect; 8. Alphabet table",020);
output_item("&sect; 9. savarna letters",021);
output_item("&sect; 10. svara, vyanjana",021);
output_item("&sect; 11. syllable",022);
output_item("&sect; 12. vowel signs",022);
output_item("&sect; 12. compound consonants",022);
output_item("&sect; 13. punctuation",024);
output_item("&sect; 13. avagraha",024);
output_item("&sect; 14. prosodially long vowel",024);
output_item("&sect; 15. guna and vrddhi",024);
output_item("&sect; 16. semivowels",025);
output_item("&sect; 17. numerical figures",025);
?>
</ul></li> <!-- kale01.txt -->
<li> <span class='pagenum'>12</span> II. Rules of Sandhi
<ul> <!-- kale02.txt -->
<?php
output_item("II. Rules of Sandhi",026);
output_item("<span class='section'>Svara-sandhi</span>",026);
output_item("&sect; 19 similar simple vowels",026);
output_item("&sect; 20 <span class='san'>a</span> + simple vowel",027);
output_item("&sect; 21 <span class='san'>a</span> plus diphthong",029);
output_item("&sect; 22 <span class='san'>i</span> plus vowel",031);
output_item("&sect; 23 <span class='san'>i</span> plus vowel (optional) ",032);
output_item("&sect; 24 diphthong plus vowel",033);
output_item("&sect; 25 diphthong plus <span class='san'>a</span>",034);
output_item("&sect; 26 sandhi exceptions, <span class='san'>pragfhya</span>",034);
output_item("sandhi exceptions, pluta vowels",035);
output_item("&sect; 27. particle <span class='san'>u</span>",036);
output_item("<span class='section'>Hal-sandhi</span>. &sect; 28. dental",036);
output_item("&sect; 29. dental plus cerebral sibilant",037);
output_item("&sect; 30. consonant plus nasal",037);
output_item("&sect; 31. dental plus <span class='san'>l</span>",037);
output_item("&sect; 32. <span class='san'>ud</span> plus <span class='san'>sTA</span>",038);
output_item("&sect; 33. consonant plus <span class='san'>h</span>",038);
output_item("&sect; 34. consonant plus hard consonant",038);
output_item("&sect; 35. consonant plus <span class='san'>S</span>",038);
output_item("&sect; 36. <span class='san'>m</span> at end of word",038);
output_item("&sect; 37. anusvara plus consonant",039);
output_item("&sect; 38. <span class='san'>N</span> or <span class='san'>R</span> plus sibilant",039);
output_item("&sect; 38. <span class='san'>N</span> or <span class='san'>n</span> plus sibilant or vowel",040);
output_item("&sect; 40. <span class='san'>n</span> plus <span class='san'>S</span>",040);
output_item("&sect; 41. <span class='san'>n</span>  -> <span class='san'>R</span>",040);
output_item("&sect; 42. <span class='san'>s</span>  -> <span class='san'>z</span>",041);
output_item("&sect; 43. <span class='san'>m</span>",041);
output_item("&sect; 44. insert <span class='san'>c</span> before <span class='san'>C</span>",042);
output_item("<span class='section'>Visarga-sandhi</span>.  &sect; 45. <span class='san'>s</span>  -> <span class='san'>H</span>",042);
output_item("&sect; 46. <span class='san'>H</span> -> <span class='san'>s</span>",043);
output_item("&sect; 47. <span class='san'>aH</span> -> <span class='san'>o</span>",045);
output_item("&sect; 48. <span class='san'>AH</span> -> <span class='san'>A</span>",045);
output_item("&sect; 49. vowel plus <span class='san'>H</span> -> vowel plus <span class='san'>r</span>",045);
output_item("&sect; 50. <span class='san'>saH</span> -><span class='san'>sa</span>",046);
?>
</ul></li> <!-- kale02.txt -->
<li> <span class='pagenum'>32</span> III. Declension of nouns
<ul> <!-- kale03.txt -->
<?php
output_item("III. Declension of nouns",046);
output_item("&sect; 57. Normal case terminations",048);
output_item("<span class='section'>Bases ending in vowels</span>",048);
output_item("&sect; 61. Nouns in  <span class='san'>a</span>.  <span class='san'>rAma</span>  <span class='san'>jYAna</span>",049);
output_item("&sect; 63. Nouns in <span class='san'>A</span>.  <span class='san'>gopA</span>",049);
output_item("&sect; 65. <span class='san'>ramA</span>",050);
output_item("&sect; 69. Nouns in  <span class='san'>i</span> and <span class='san'>u</span>.  <span class='san'>hari</span>  <span class='san'>mati</span>  <span class='san'>guru</span>",051);
output_item("<span class='san'>Denu</span> <span class='san'>vAri</span> ",052);
output_item("<span class='san'>maDu</span> ",053);
output_item("&sect; 70. <span class='san'>Suci</span> <span class='san'>guru</span> ",053);
output_item("&sect; 72. Irregular bases. <span class='san'>saKi</span> <span class='san'>pati</span>",054);
output_item("&sect; 75. Words in  <span class='san'>I</span> and <span class='san'>U</span>. <span class='san'>nadI</span>",055);
output_item("<span class='san'>vaDU</span>",056);
output_item("&sect; 76. Mas. nouns in <span class='san'>I</span>. <span class='san'>vAtapramI</span>",056);
output_item("&sect; 77. Root nouns in <span class='san'>I</span> and <span class='san'>U</span>.  <span class='san'>DI</span> and <span class='san'>BU</span>.",057);
output_item("<span class='san'>praDI</span> and <span class='san'>KalapU</span>.",058);
output_item("<span class='san'>praDI</span>",059);
output_item("<span class='san'>suDI</span> <span class='san'>svaBU</span>",060);
output_item("<span class='san'>suDi</span>",060);
output_item("<span class='san'>varzABU</span> &sect; 78. <span class='san'>saKI</span>",061);
output_item("&sect; 79. <span class='san'>strI</span> <span class='san'>atistri</span>",062);
output_item("&sect; 80. <span class='san'>hUhU</span>",062);
output_item("&sect; 81. Nouns in  <span class='san'>f</span>.  <span class='san'>DAtf</span>",063);
output_item("&sect; 82. <span class='san'>pitf</span>  <span class='san'>mAtf</span>",064);
output_item("&sect; 83.  <span class='san'>krozwu</span>",064);
output_item("&sect; 84. Words in <span class='san'>F</span> and <span class='san'>x</span>",065);
output_item("&sect; 85. Words in <span class='san'>e</span> and <span class='san'>E</span>.  <span class='san'>se</span> and <span class='san'>rE</span> ",066);
output_item("&sect; 85. Words in <span class='san'>o</span> and <span class='san'>O</span>.  <span class='san'>go</span> and <span class='san'>glO</span> ",067);
output_item("<span class='section'>Bases ending in consonants</span",068);
output_item("&sect; 88. Bases in <span class='san'>r</span>, <span class='san'>l</span>, <span class='san'>R</span>. <span class='san'>kamal</span>",068);
output_item("&sect; 90. Bases in <span class='san'>k</span>,<span class='san'>g</span>,<span class='san'>w</span>,<span class='san'>q</span>,<span class='san'>t</span>,<span class='san'>d</span>,<span class='san'>p</span>,<span class='san'>b</span>",069);
output_item("&sect; 92. <span class='san'>samiD</span>",069);
output_item("<span class='san'>sarvak</span>, etc",070);
output_item("&sect; 93. Bases in <span class='san'>c</span>,<span class='san'>j</span>,<span class='san'>S</span>,<span class='san'>z</span>,<span class='san'>h</span>",070);
output_item("&sect; 93. <span class='san'>vAc</span> <span class='san'>rAj</span>",071);
output_item("<span class='san'>muh</span>",073);
output_item("&sect; 98. Irregular bases. <span class='san'>turAsAh</span> ",074);
output_item("&sect; 99. <span class='san'>viSvarAw</span> ",074);
output_item("&sect; 100. Root nouns in <span class='san'>vAh</span> ",074);
output_item("&sect; 101. <span class='san'>upAnah</span>",075);
output_item("&sect; 102. <span class='san'>anaquh</span>",075);
output_item("&sect; 103. <span class='san'>avayAj</span>, <span class='san'>puroqAS</span>",075);
output_item("&sect; 104. Nouns from <span class='san'>aYc</span>",076);
output_item("<span class='san'>prAYc</span>, <span class='san'>pratyaYc</span>. <span class='san'>tiryaYc</span>",077);
output_item("<span class='section'>Irregular bases</span>",079);
output_item("&sect; 105. <span class='san'>kruYc</span>",079);
output_item("&sect; 105. <span class='san'>Urj</span>",080);
output_item("&sect; 106. Nouns in <span class='san'>m</span>. <span class='san'>praSAm</span>",080);
output_item("&sect; 108. Nouns in <span class='san'>s</span>. <span class='san'>candramas</span>",080);
output_item("<span class='san'>manas</span>, <span class='san'>udarcis</span>, <span class='san'>suvas</span>",081);
output_item("&sect; 110. <span class='san'>BAs</span>. &sect; 112. Irregular bases",082);
output_item("&sect; 113. <span class='san'>puMs</span>. &sect; 113. <span class='san'>pipaWiz</span>.",083);
output_item("&sect; 115. Nouns in <span class='san'>at</span>, <span class='san'>mat</span>, and <span class='san'>vat</span>. <span class='san'>DImat</span>",084);
output_item("<span class='san'>mahatat</span>",085);
output_item("&sect; 116. Participles ending in <span class='san'>at</span>.",085);
output_item("<span class='san'>Bavat</span>, <span class='san'>dadat</span>",086);
output_item("&sect; 117. Nouns in <span class='san'>an</span> and <span class='san'>in</span>",087);
output_item("<span class='san'>brahman</span>, <span class='san'>rAjan</span>",087);
output_item("<span class='san'>nAman</span>",089);
output_item("Irregular: &sect; 118. <span class='san'>puzan</span>, <span class='san'>vftrahan</span>",089);
output_item("&sect; 119. <span class='san'>Svan</span>",090);
output_item("<span class='san'>maGavan</span>, <span class='san'>yuvan</span>",091);
output_item("&sect; 120. <span class='san'>ahan</span>",091);
output_item("&sect; 121. <span class='san'>arvan</span>",092);
output_item("&sect; 122. Words in <span class='san'>in</span>",092);
output_item("<span class='san'>karin</span>, <span class='san'>daRqin</span>",093);
output_item("&sect; 123. Irregular bases. <span class='san'>paTin</span>",093);
output_item("&sect; 124. Bases in <span class='san'>vas</span>. <span class='san'>vidvas</span>",094);
output_item("&sect; 125. Bases in <span class='san'>yas</span>, <span class='san'>Iyas</span>. <span class='san'>Sreyas</span>",095);
output_item("<span class='section'>Words of irregular declension</span>",096);
output_item("&sect; 126-8. <span class='san'>asTi</span>, <span class='san'>ap</span>, <span class='san'>jarA</span>",096);
output_item("&sect; 129. <span class='san'>dos</span>",097);
output_item("<span class='san'>niSA</span>, <span class='san'>sAnu</span>, <span class='san'>pAda</span>",098);
output_item("<span class='san'>danta</span>, <span class='san'>nAsikA</span>, <span class='san'>mAsa</span>, <span class='san'>hfdaya</span>, <span class='san'>asfj</span>",099);
output_item("<span class='san'>yUza</span>, <span class='san'>yakft</span>, <span class='san'>Sakft</span>, <span class='san'>udaka</span>, <span class='san'>Asya</span>",100);
output_item("<span class='san'>pftana</span>.",101);
output_item("&sect; 130. Suffixes <span class='san'>tas</span>, <span class='san'>tra</span>",101);
output_item("&sect; 131. Indeclineable nouns",101);
?>
</ul></li> <!-- kale03.txt -->
<li> <span class='pagenum'>87</span> IV. Pronouns and their Declension
<ul> <!-- kale04.txt -->
<?php
output_item("&sect; 132. pronouns",101);
output_item("<span class='section'>Personal Pronouns</span>",102);
output_item("&sect; 133. <span class='san'>asmad</span>, <span class='san'>yuzmad</span>",102);
output_item("&sect; 134. short forms of <span class='san'>asmad</span>, <span class='san'>yuzmad</span>",103);
output_item("<span class='section'>Demonstrative Pronouns</span>",104);
output_item("&sect; 135. <span class='san'>tad</span>",104);
output_item("<span class='san'>etad</span>",105);
output_item("<span class='san'>idam</span>, <span class='san'>adas</span>",106);
output_item("<span class='section'>Relative Pronouns</span>",107);
output_item("&sect; 138. <span class='san'>yad</span>",108);
output_item("<span class='section'>Interrogative Pronouns</span>",108);
output_item("&sect; 139. <span class='san'>kim</span>",108);
output_item("<span class='section'>Reflexive Pronouns</span>",109);
output_item("<span class='section'>Indefinite Pronouns</span>",109);
output_item("<span class='section'>Correlative Pronouns</span>",109);
output_item("<span class='section'>Reciprocal Pronouns</span>",110);
output_item("<span class='section'>Possessive Pronouns</span>",110);
output_item("&sect; 146. <span class='san'>asmat</span>, <span class='san'>yuzmat</span>",110);
output_item("<span class='section'>Pronominal Adjectives</span>",111);
output_item("&sect; 147. <span class='san'>katara</span>",111);
output_item("<span class='san'>sarva</span>",112);
output_item("<span class='section'>Pronominal Adverbs</span>",114);
?>
</ul></li> <!-- kale04.txt -->
<li> <span class='pagenum'>102</span> V. Numerals and their Declension
<ul> <!-- kale05.txt -->
<?php
output_item("&sect; 159. Cardinals/Ordinals 1-16",116);
output_item("Cardinals/Ordinals 17-41",117);
output_item("Cardinals/Ordinals 42-67",118);
output_item("Cardinals/Ordinals 68-93",119);
output_item("Cardinals/Ordinals 94-100, etc.",120);
output_item("&sect; 165. <span class='san'>tri</span>, <span class='san'>catur</span>, <span class='san'>paYcan</span>",122);
output_item("<span class='section'>Numeral Adverbs</span>",123);
?>
</ul></li> <!-- kale05.txt -->
<li> <span class='pagenum'>110</span> VI. Degree of Comparison
<ul> <!-- kale06.txt -->
<?php
output_item("&sect; 171. <span class='san'>tara</span>, <span class='san'>tama</span>",124);
output_item("&sect; 174. <span class='san'>Iyas</span>, <span class='san'>izwa</span>",125);
output_item("&sect; 177. Irregular comparatives and superlatives",126);
?>
</ul></li> <!-- kale06.txt -->
<li> <span class='pagenum'>113</span> VII. Compounds
<ul> <!-- kale07.txt -->
<?php
output_item("VII. Compounds",127);
output_item("1 Dwandwa compounds",129);
output_item("2 Tatpurusha compounds",135);
output_item("3 Karmadharaya compounds",147);
output_item("4 Upapada compounds",158);
output_item("5 Bahuvrihi compounds",165);
output_item("6 Avyayibhava compounds",177);
output_item("7 General rules for compounds",182);
output_item("8 Other changes for compounds",185);
?>
</ul></li> <!-- kale07.txt -->
<li> <span class='pagenum'>180</span> VIII. Formation of Feminine Bases
<ul> <!-- kale08.txt -->
<?php
output_item("VIII. Formation of Feminine Bases",194);
?>
</ul></li> <!-- kale08.txt -->
<li> <span class='pagenum'>194</span> IX. Secondary Nominal Bases
<ul> <!-- kale09.txt -->
<?php
output_item("<span class='san'>tadDita</span> affixes",208);
output_item("<span class='section'>miscellaneous affixes</span>",209);
output_item("<span class='section'>Affixes showing possession</span>",223);
output_item("<span class='section'>Affixes forming adverbs</span>",228);
output_item("<span class='section'>Irregular adverbs of time</span>",230);
?>
</ul></li> <!-- kale09.txt -->
<li> <span class='pagenum'>216</span> X. Gender
<ul> <!-- kale10.txt -->
<?php
output_item("X. Gender",230);
output_item("<span class='section'>Masculine words</span>",231);
output_item("<span class='section'>Feminine words</span>",233);
output_item("<span class='section'>Neuter words</span>",234);
output_item("<span class='section'>Words masculine and feminine</span>",235);
output_item("<span class='section'>Words masculine and neuter</span>",236);
output_item("<span class='section'>Words feminine and neuter</span>",237);
?>
</ul></li> <!-- kale10.txt -->
<li> <span class='pagenum'>223</span> XI. Avyayas or Indeclinables
<ul> <!-- kale11.txt -->
<?php
output_item("XI. Avyayas or Indeclinables",237);
output_item("<span class='section'>Prepositions</span>",238);
output_item("<span class='section'>Adverbs</span>",242);
output_item("<span class='section'>Particles</span>",249);
output_item("<span class='section'>Conjunctions</span>",250);
output_item("<span class='section'>Interjections</span>",251);
?>
</ul></li> <!-- kale11.txt -->
<li> <span class='pagenum'>238</span> XII. Conjugation of Verbs
<ul> <!-- kale12.txt -->
<?php
output_item("XII. Conjugation of Verbs",252);
output_item("<span class='section'>Active voice</span>",254);
output_item("<span class='section'>Classes 1,4,6,10</span>",255);
output_item("<span class='section'>Classes 1,4,6,10 (Irregular)</span>",262);
output_item("<span class='section'>Classes 2,3,5,7,8,9</span>",268);
output_item("<span class='section'>General tenses and moods</span>",309);
output_item("a. <span class='section'>First future</span>",312);
output_item("b. <span class='section'>Second future and conditional</span>",314);
output_item("c. <span class='section'>Perfect</span>",320);
output_item("c1. <span class='section'>Irregular bases</span>",337);
output_item("c2. <span class='section'>Periphrastic perfect</span>",343);
output_item("d. <span class='section'>Aorist - 1st variety</span>",346);
output_item("<span class='section'>Aorist - 2nd variety</span>",347);
output_item("<span class='section'>Aorist - 3rd variety</span>",354);
output_item("<span class='section'>Aorist - 6th variety</span>",358);
output_item("<span class='section'>Aorist - 7th variety</span>",359);
output_item("<span class='section'>Aorist - 4th variety</span>",361);
output_item("<span class='section'>Aorist - 5th variety</span>",366);
output_item("e. <span class='section'>Benedictive</span>",370);
output_item("<span class='section'>Passive voice</span>",373);
output_item("<span class='section'>Passive: conjugational tenses</span>",374);
output_item("<span class='section'>Passive: general tenses/moods</span>",378);
output_item("<span class='section'>Derivative Verbs</span>",381);
output_item("a. <span class='section'>Causals</span>",382);
output_item("b. <span class='section'>Desideratives</span>",390);
output_item("c. <span class='section'>Frequentatives</span>",398);
output_item("d. <span class='section'>Nominal Verbs</span>",406);
?>
</ul></li> <!-- kale12.txt -->
<li> <span class='pagenum'>399</span> XIII. Parasmaipada / Atmanepada
<ul> <!-- kale13.txt -->
<?php
output_item("XIII. Parasmaipada / Atmanepada",413);
?>
</ul></li> <!-- kale13.txt -->
<li> <span class='pagenum'>416</span> XIV. Verbal Derivatives
<ul> <!-- kale14.txt -->
<?php
output_item("XIV. Verbal Derivatives",430);
?>
</ul></li> <!-- kale14.txt -->
<li> <span class='pagenum'>468</span> XV. Syntax
<ul> <!-- kale15.txt -->
<?php
output_item("XV. Syntax",482);
output_item("The article",483);
output_item("Concord",488);
output_item("Government",489);
output_item("Pronouns",522);
output_item("Comparative and superlative",524);
output_item("Participles",525);
output_item("Tenses and moods",532);
output_item("Indeclineables",546);
?>
</ul></li> <!-- kale15.txt -->
<li> <span class='pagenum'>1</span> Appendix II: Dhatukosha
<ul> <!-- kaleDK.txt -->
<?php
output_item("Appendix II: Dhatukosha",551);
output_item("(end of Dhatukosha)",706);
?>
</ul></li> <!-- kaleDK.txt -->
</ul> <!-- kaletop.txt -->

<script type="text/javascript">

//global variable to allow console inspection of tree:
var tree;
tree = new YAHOO.widget.TreeView("botleftdiv");
tree.render(); 
</script>

</div> <!--botleftdiv-->
<div id="rightpane"></div>
</body>
</html>
