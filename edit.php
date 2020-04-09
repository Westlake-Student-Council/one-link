<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $get_file = file_get_contents('announcements.json');
    $json_file = json_decode($get_file, true);
    $json_file = $jsonfile["announcements"];
    $json_file = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $get_file = file_get_contents('announcements.json');
    $all = json_decode($get_file, true);
    $json_file = $all["announcements"];
    $json_file = $json_file[$id];

    $post["title"] = isset($_POST["title"]) ? $_POST["title"] : "";
    $post["date"] = isset($_POST["date"]) ? $_POST["date"] : "";
    $post["panel_color"] = isset($_POST["panel_color"]) ? $_POST["link"] : "";
    $post["description"] = isset($_POST["description"]) ? $_POST["description"] : "";

    if ($json_file) {
        unset($all["announcements"][$id]);
        $all["announcements"][$id] = $post;
        $all["announcements"] = array_values($all["announcements"]);
        file_put_contents("announcements.json", json_encode($all));
    }
    header("Location: read.php");
}
?>
<?php if (isset($_GET["id"])): ?>
    <form action="edit.php" method="POST">
        <input type="hidden" value="<?php echo $id ?>" name="id"/>
        <input type="text" value="<?php echo $json_file["title"] ?>" name="title"/>
        <input type="text" value="<?php echo $json_file["date"] ?>" name="date"/>
        <input type="text" value="<?php echo $json_file["panel_color"] ?>" name="panel_color"/>
        <input type="text" value="<?php echo $json_file["body"] ?>" name="body"/>
        <input type="submit"/>
    </form>
<?php endif; ?>
