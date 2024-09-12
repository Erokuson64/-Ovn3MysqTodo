<?php include 'header.php'; ?>
<?php include 'ConnectorDB.php'; ?>

<div class="container">
    <h2>Add New Task</h2>
    <form action="create.php" method="POST">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description</label>
        <textarea id="description" name="description"></textarea>

        <label for="priority">Priority</label>
        <select name="priority" id="priority">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>

        <button type="submit" name="submit">Add Task</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];

        $sql = "INSERT INTO tasks (title, description, priority) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $description, $priority]);

        header("Location: index.php");
        exit;
    }
    ?>
</div>

<?php include 'footer.php'; ?>