<?php

$schools = [
    ['id' => 1, 'name' => 'Trinity college nabbingo', 'level' => 'Secondary', 'location' => 'Nabbingo', 'no_of_students' => 800],
    ['id' => 2, 'name' => 'Lubiri high school', 'level' => 'Secondary', 'location' => 'Lubiri', 'no_of_students' => 300],
    ['id' => 3, 'name' => 'St. Matia Mulumba Primary school', 'level' => 'Primary', 'location' => 'Mityana', 'no_of_students' => 500],
    // Add more schools as needed
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>School List</title>
</head>
<body>
    <h1>School List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Level</th>
            <th>Location</th>
            <th>No of Students</th>
        </tr>
        <?php foreach ($schools as $school): ?>
            <tr>
                <td><?php echo $school['id'] ?? ''; ?></td>
                <td><?php echo $school['name'] ?? 'N/A'; ?></td>
                <td><?php echo $school['level'] ?? 'N/A'; ?></td>
                <td><?php echo $school['location'] ?? 'N/A'; ?></td>
                <td><?php echo $school['no_of_students'] ?? 'N/A'; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="index.php">Back to Home</a>
</body>
</html>