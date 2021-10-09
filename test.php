<?php
$id = $_GET['id'];
$html = file_get_contents("https://vieon.vn/truyen-hinh-truc-tuyen/vie-giai-tri-hd/".$id);

preg_match_all(
    '/(http.*m3u8)/',

    $html,
    $things, // will contain the article data
    PREG_SET_ORDER // formats data into an array of posts
);

foreach ($things as $thing) {
    $link = $thing[1];

// clear out the output buffer
while (ob_get_status())
{
    ob_end_clean();
}

// no redirect
header("Location: $link");

}
?>
