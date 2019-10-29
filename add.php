<?php
require_once 'init.php';
require_once 'functions.php';
$user_id = 1;
$projects = get_projects($link, $user_id);
$tasks = get_tasks($link, $user_id);
$task = $_POST;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($task['name'])) {
        $errors['name'] = 'Поле не должно быть пустым';
    }
    if (empty($task['date'])) {
        $errors['date'] = 'Выберете дату';
    }
    if (empty($errors['date']) && strtotime($task['date']) < time()) {
        $errors['date'] = 'Дата должна быть больше или равна текущей';
    }
    if (isset($_FILES['preview'])) {
        $tmp_name = $_FILES['preview']['tmp_name'];
        $path = $_FILES['preview']['name'];
        move_uploaded_file($tmp_name, $path);
        $task['preview'] = $path;
    }
    if (count($errors)) {
        $page_content = include_template('add.php', ['task' => $task, 'errors' => $errors, 'projects' => $projects]);
    } else {
        $sql = 'INSERT INTO tasks (user_id, project_id, name, date_deadline, file) VALUES (1, ?, ?, ?, ?)';
        $stmt = db_get_prepare_stmt($link, $sql,
            [$task['name'], date('Y-m-d', strtotime($task['date'])), $task['project'], $task['preview']]);
        $res = mysqli_stmt_execute($stmt);
        if ($res) {
            header('Location: index.php');
        } else {
            print("Ошибка запроса: " . mysqli_error($link));
        }
    }
}

$page_content = include_template('form_task.php',
    [
        'projects' => $projects,
        'errors' => $errors
    ]);
$layout_content = include_template('layout.php', [
    'title' => 'Дела в порядке',
    'page_content' => $page_content,
    'projects' => $projects,
    'tasks' => $tasks,
    'user_name' => 'Имя пользователя'
]);
print($layout_content);