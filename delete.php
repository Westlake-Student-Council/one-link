<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('announcements.json');
    $all = json_decode($all, true);
    $json_file = $all["announcements"];
    $json_file = $json_file[$id];

    if ($jsonfile) {
        unset($all["announcements"][$id]);
        $all["announcements"] = array_values($all["announcements"]);
        file_put_contents("announcements.json", json_encode($all));
    }
    header("Location: read.php");
}
?>
