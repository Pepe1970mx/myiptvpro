<? php
/*!
* (C) vietdesigner.net
*
*/

header("Content-Type: text/plain"); // display as plain text

$url = "https://vieon.vn/truyen-hinh-truc-tuyen/vie-giai-tri-hd/"; // site url
$content = file_get_contents($url); // get page content html

preg_match('/<input id="link-live" type="hidden" value="(.*?)"/is', $content, $match); // regular expression match

if (isset($match[1])) { // a match was found
    $playlist = explode("/", $match[1]); // split url by slash
    $playlist = end($playlist); // get filename + query (playlist.m3u8?t=...&e=...)

    $urlStream = str_replace($playlist, "", $match[1]); // remove filename + query
    $urlStream = substr($urlStream, -1) == "/" ? $urlStream : $urlStream."/"; // forced add trailing slash onto the end of url

    $contentStream = file_get_contents($match[1]); // get content file m3u8
    $contentStream = str_replace("chunklist_", $urlStream."chunklist_", $contentStream); // add full url

    // force file download
    $filename = "vds.".time().".m3u8";// downloaded filename
    header("Content-Description: File Transfer");
    // header("Content-Type: application/octet-stream");
    header("Content-Type: audio/x-mpegurl"); // important
    header("Content-Disposition: attachment; filename=".$filename);
    header("Content-Transfer-Encoding: binary");
    header("Connection: Keep-Alive");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: public");
    header("Content-Length: ".strlen($contentStream));

    echo $contentStream; // print to screen
} else echo "URL stream not found"; // a match was not found
?>




#https://sgn-fpt-001-livecdn-vthn-vnd.vieon.vn/124efe00043e850ef341a5453c6a2c55/1633148563069/vtvcab/live/hd_vtvcab_1_test/playlist.m3u8

#https://hni-vtt-001-livecdn-vthcm-vnd.vieon.vn/b42a3d29445f723dabc3b961000522c3/1633154173310/htv_drm/live/viechannel/playlist.m3u8
#https://hni-vtt-001-livecdn-vthn-vnd.vieon.vn/302495b817e45c532b0e1321846a9fb1/1633154179315/vtvcab/live/hd_vtvcab_1_test/playlist.m3u8
#https://hni-vtt-001-livecdn-vthn-vnd.vieon.vn/20e6d79a53b688c966d48182658b1e0e/1633154181227/vtvcab/live/hd_vtvcab_1_test/playlist.m3u8
#https://hni-vtt-001-livecdn-vthcm-vnd.vieon.vn/b42a3d29445f723dabc3b961000522c3/1633154173310/htv_drm/live/viechannel/TV_HD/viechannel_1080p/chunks.m3u8
#https://hni-vtt-001-livecdn-vthn-vnd.vieon.vn/302495b817e45c532b0e1321846a9fb1/1633154179315/vtvcab/live/hd_vtvcab_1_test/TV_HD/hd_vtvcab_1_test_1080p/chunks.m3u8
#https://hni-vtt-001-livecdn-vthn-vnd.vieon.vn/20e6d79a53b688c966d48182658b1e0e/1633154181227/vtvcab/live/hd_vtvcab_1_test/TV_HD/hd_vtvcab_1_test_1080p/chunks.m3u8




      


                                                                                                         
