#!/usr/bin/perl -w
# Dec 9, 2008 ejf
#kale/servedisp2.pl
# for KALEScan/disp2/index.php
use CGI;
#use Image::Magick;
use CGI::Carp qw( fatalsToBrowser );
$| = 1;

my $cgi = new CGI;
my $pageIn = $cgi->param('page') ;
my $nextfile;
my $prevfile;
my $pagenum;
$pagenum = $pageIn;
if (!($pagenum)) {
    $pagenum = 5;
}
my $pagemin = 5;
my $pagemax = 706;
my $page;
$page = int($pagenum);
print $cgi->header(-type => 'text/html', -charset => 'UTF-8');
#$HEADER .= "</head>\n";
#$HEADER .= "<body>\n";

#print $HEADER ;
#print "<p>page = $page</p>\n";
#exit;
print "<div class=\"prevpage\">\n";
if ($pagenum > $pagemin) {
    genDisplayFile("&lt;",$pagenum - 1);
}
if ($pagenum < $pagemax) {
    genDisplayFile("&gt;",$pagenum + 1);
}
print "</div>\n";
my $dir = "/scans/KALEScan/KALEScanpng/";
my $file = genFilename(int($page));
my $url = $dir . $file;
print "<img src=\"$url\" />";

#print $cgi->end_html;
exit;
sub genFilename {
    my $page = shift;
    my $page1 =  sprintf("%03d",$page);
    return "kale_Page_$page1.png";
}
sub genDisplayFile {
    my ($text,$page) = @_;
    my $file = genFilename($page);
    my $href = "/cgi-bin/kale/servedisp2.pl?file=$file";
    $href = $page;
    my $a = "<a class=\"nppage\" onclick=\"displaylink('" . $href . "');\"><span class='nppage1'>$text</span></a>";
    print "$a\n";
    print "&nbsp;";
}
sub tempsub_old {
if ($pagenum > $pagemin) {
    $page = $pagenum - 1;
    $page = sprintf("%03d",$page);
    $nextfile = $filename;
    $nextfile =~ s/Page_[0-9][0-9][0-9]/Page_$page/;
    genDisplayFile("&lt;",$nextfile);
}
if ($pagenum < $pagemax) {
    $page = $pagenum + 1;
    $page = sprintf("%03d",$page);
    $nextfile = $filename;
    $nextfile =~ s/Page_[0-9][0-9][0-9]/Page_$page/;
    genDisplayFile("&gt;",$nextfile);
}
}
sub genDisplayFile_old {
    my ($text,$file) = @_;
    my $href = "/cgi-bin/kale/serveimg1.pl?file=$file";
    my $a = "<a class=\"nppage\" onclick=\"displaylink('" . $href . "');\"><span class='nppage1'>$text</span></a>";
    print "$a\n";
    print "&nbsp;";
}
