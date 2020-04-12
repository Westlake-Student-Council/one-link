<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $get_file = file_get_contents('announcements.json');
    $json_file = json_decode($get_file, true);
    $json_file = $json_file["announcements"];
    $json_file = $json_file[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $get_file = file_get_contents('announcements.json');
    $all = json_decode($get_file, true);
    $json_file = $all["announcements"];
    $json_file = $json_file[$id];

    $post["title"] = isset($_POST["title"]) ? $_POST["title"] : "";
    $post["date"] = isset($_POST["date"]) ? $_POST["date"] : "";
    $post["panel_color"] = isset($_POST["panel_color"]) ? $_POST["panel_color"] : "";
    $post["body"] = isset($_POST["body"]) ? $_POST["body"] : "";

    if ($json_file) {
        unset($all["announcements"][$id]);
        $all["announcements"][$id] = $post;
        $all["announcements"] = array_values($all["announcements"]);
        file_put_contents("announcements.json", json_encode($all));
    }
    header("Location: read.php");
}
?>

<html>
<head>
  <?php require "head.php";?>
</head>
<body>

<?php if (isset($_GET["id"])): ?>
    <form action="edit.php" method="POST">

        <input type="hidden" value="<?php echo $id ?>" name="id">

        <br>

        <label for="title">Title</label>
        <br>
        <input type="text" value="<?php echo $json_file["title"] ?>" name="title" id="title">

        <br>

        <label for="date">Date</label>
        <br>
        <input type="text" value="<?php echo $json_file["date"] ?>" name="date" id="date">

        <br>

        <label for="panel_color">default/primary/success/info/warning/danger</label>
        <br>
        <input type="text" value="<?php echo $json_file["panel_color"] ?>" name="panel_color" id="panel_color">

        <br>

        <label for="body">Announcement Text Body</label>
        <br>
        <textarea type="text" name="body" id="body" rows="30" cols="100"><?php echo $json_file["body"] ?></textarea>

        <br>

        <input type="submit">
    </form>
<?php endif; ?>
</body>
</html>
