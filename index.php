<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .task:last-child {
            border-bottom: none;
        }
        .task span {
            flex-grow: 1;
            padding-right: 10px;
        }
        .button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #218838;
        }
        .link-button {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .link-button:hover {
            background-color: #0056b3;
        }
        form {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        .add-task {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>To-Do List Application</h1>

    <div class="add-task">
        <h2>Add Task</h2>
        <form action="add_task.php" method="POST">
            <input type="text" name="task" placeholder="Add a new task" required>
            <button type="submit" class="button">Add Task</button>
        </form>
    </div>

    <h2>Your Tasks</h2>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'todo_app');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query("SELECT * FROM tasks");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $task = htmlspecialchars($row['task']);
            echo "<div class='task'>
                    <span>{$task}</span>
                    <div>
                        <a class='link-button' href='edit_task.php?id={$row['id']}'>Edit</a>
                        <a class='link-button' href='delete_task.php?id={$row['id']}'>Delete</a>
                    </div>
                  </div>";
        }
    } else {
        echo "<div>No tasks found.</div>";
    }
    ?>
</div>

</body>
</html>