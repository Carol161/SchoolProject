<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $level = $_POST['level'];
    $location = $_POST['location'];
    $no_of_students = $_POST['no_of_students'];

    $sql = "INSERT INTO school (name, level, location, no_of_students) VALUES (:name, :level, :location, :no_of_students)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':level', $level);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':no_of_students', $no_of_students);

    if ($stmt->execute()) {
        header("Location: index.php?status=success");
    } else {
        header("Location: index.php?status=error");
    }
}
?>