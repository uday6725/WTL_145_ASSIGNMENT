<?php
$con = mysqli_connect("localhost", "root", "", "testing");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$action = $_POST["action"] ?? null;

// CREATE
if ($action === "create") {
    $sname = $_POST["sname"] ?? null;
    $smarks = $_POST["smarks"] ?? null;

    if ($sname && $smarks) {
        $smarks = (int)$smarks;
        $sql = $con->prepare("INSERT INTO student1 (name, marks) VALUES (?, ?)");
        $sql->bind_param("si", $sname, $smarks);
        $sql->execute();
    }
}

// DELETE
if ($action === "delete") {
    $id = $_POST["id"] ?? null;
    if ($id) {
        $id = (int)$id;
        $sql = $con->prepare("DELETE FROM student1 WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
    }
}

// UPDATE
if ($action === "update") {
    $id = $_POST["id"] ?? null;
    $marks = $_POST["marks"] ?? null;
    if ($id && $marks) {
        $id = (int)$id;
        $marks = (int)$marks;
        $sql = $con->prepare("UPDATE student1 SET marks = ? WHERE id = ?");
        $sql->bind_param("ii", $marks, $id);
        $sql->execute();
    }
}

// READ (show all)
$result = mysqli_query($con, "SELECT * FROM student1");

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Marks</th><th>Actions</th></tr>";
    while ($rows = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $rows['id'] . "</td>";
        echo "<td>" . $rows['name'] . "</td>";
        echo "<td>" . $rows['marks'] . "</td>";
        echo "<td>
                <button onclick='updatedata(".$rows['id'].")'>Update</button>
                <button onclick='deletedata(".$rows['id'].")'>Delete</button>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}
?>
