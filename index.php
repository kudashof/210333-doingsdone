<?php
error_reporting(E_ALL);

require_once('functions.php');
//require_once('data.php');
require_once('init.php');

if ($con == false) {
    print('Ошибка подключения: ' . mysqli_connect_error());
} else {
    $id = 1;
    $sql_project = 'SELECT * FROM projects WHERE user_id = ?';
    $sql_task = 'SELECT * FROM tasks WHERE user_id = ?';
    $projects = db_fetch_data($link, $sql_project, $id);
    $tasks = db_fetch_data($link, $sql_task, $id);
}

if (isset($_GET["projectID"])) {
    $sql = 'SELECT id FROM projects WHERE id = ? LIMIT 1';
    $is_project = db_fetch_data($link, $sql, $_GET['projectID']);
    if ($is_project) {
        // Если есть, получить задачи с отбором по id проекта, для отбора использовать выше указанный параметр из $_GET
        $sql = 'SELECT * FROM tasks WHERE project_id = ? ';
        // Все задачи по проекту положить в переменную $tasks
        $tasks = db_fetch_data($link, $sql, $_GET['projectID']);
    } else {
        // Если такого проекта нет, то 404
        http_response_code(404);
    }
}

$page_content = include_template('index.php', [
    'show_complete_tasks' => $show_complete_tasks,
    'tasks' => $tasks
]);
$layout_content = include_template('layout.php', [
    'title' => 'Дела в порядке',
    'page_content' => $page_content,
    'projects' => $projects,
    'tasks' => $tasks,
    'user_name' => 'Имя пользователя'
]);
print($layout_content);


?>


