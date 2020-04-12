<html>
<head>
  <?php require "head.php";?>
</head>
<form action="add.php" method="POST">
  <label for="title">Title</label>
  <br>
  <input type="text" name="title" id="title" placeholder="title">

  <br>

  <label for="date">Date</label>
  <br>
  <input type="text" name="date" id="date" placeholder="date">

  <br>

  <label for="panel_color">default/primary/success/info/warning/danger</label>
  <br>
  <input type="text" value="default" name="panel_color" id="panel_color">

  <br>

  <label for="body">Announcement Text Body</label>
  <br>
  <textarea type="text" name="body" id="body" rows="30" cols="100">
  </textarea>

  <br>

  <input type="submit" name="add">
  <a href="read.php" type="btn">Go back</a>
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
</html>
