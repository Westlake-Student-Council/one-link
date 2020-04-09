<form action="add.php" method="POST">
    <input type="text" name="title" placeholder="title"/>
    <input type="text" name="date" placeholder="date"/>
    <input type="text" name="panel_color" placeholder="panel_color"/>
    <input type="text" name="body" placeholder="body"/>
    <input type="submit" name="add"/>
</form>
<?php
if (isset($_POST["add"])) {
    $file = file_get_contents('announcements.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["announcements"] = array_values($data["announcements"]);
    array_push($data["announcements"], $_POST);
    file_put_contents("announcements.json", json_encode($data));
    header("Location: read.php");
}
?>
