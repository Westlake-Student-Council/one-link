<?php
$get_file = file_get_contents('announcements.json');
$json_file = json_decode($get_file);
?>
<a href="add.php">Add</a>
<table align="center">
    <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Panel Color</th>
        <th>Body</th>
        <th></th>
    </tr>
    <tbody>
        <?php foreach ($json_file->announcements as $index => $obj): ?>
            <tr>
                <td><?php echo $obj->title; ?></td>
                <td><?php echo $obj->date; ?></td>
                <td><?php echo $obj->panel_color; ?></td>
                <td><?php echo $obj->body; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $index; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $index; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
