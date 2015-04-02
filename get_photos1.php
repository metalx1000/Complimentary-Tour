<?php
$pid = $_GET['pid'];
$dir = 'uploader/uploads/';
$img_dir = $dir . $pid;
if ($handle = opendir($img_dir)) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
            echo "<figure>";
            echo "<img src='$img_dir/$entry'  width='100%'/>";
            echo "<figcaption></figcaption>";
            echo "</figure>";

        }
    }

    closedir($handle);
}
?>
