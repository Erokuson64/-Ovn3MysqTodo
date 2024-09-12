<?php include 'header.php'; ?>
<?php include 'ConnectorDB.php'; ?>

<div class="container">
    <h2>Edit Task</h2>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        $task = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if (isset($_POST['update'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
        $completed = isset($_POST['completed']) ? 1 : 0;

        $sql = "UPDATE tasks SET title = ?, description = ?, priority = ?, completed = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $description, $priority, $completed, $id]);

        header("Location: index.php");
        exit;
    }
    ?>

    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required>

        <label for="description">Description</label>
        <textarea id="description" name="description"><?php echo htmlspecialchars($task['description']); ?></textarea>

        <label for="priority">Priority</label>
        <select name="priority" id="priority">
            <option value="Low" <?php if ($task['priority'] == 'Low') echo 'selected'; ?>>Low</option>
            <option value="Medium" <?php if ($task['priority'] == 'Medium') echo 'selected'; ?>>Medium</option>
            <option value="High" <?php if ($task['priority'] == 'High') echo 'selected'; ?>>High</option>
        </select>

        <label for="completed">
            <input type="checkbox" id="completed" name="completed" <?php if ($task['completed']) echo 'checked'; ?>>
            Completed
        </label>

        <button type="submit" name="update">Update Task</button>
    </form>
</div>

<?php include 'footer.php'; ?>