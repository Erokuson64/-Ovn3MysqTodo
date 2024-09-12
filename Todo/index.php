<?php include 'header.php'; ?>
<?php include 'ConnectorDB.php'; ?>

<div class="container">
    <h2>Task List</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['priority']) . "</td>";
                    echo "<td>" . ($row['completed'] ? 'Completed' : 'Pending') . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='delete-btn'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Error fetching tasks: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>