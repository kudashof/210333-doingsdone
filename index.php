<?php
error_reporting(E_ALL);

require_once('functions.php');
//require_once('data.php');
require_once('init.php');

date_default_timezone_set('Europe/Moscow');

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


if ($con == false) {
    print('Ошибка подключения: ' . mysqli_connect_error());
} else {
    $id = 1;
    $sql_project = 'SELECT * FROM projects WHERE user_id = ?';
    $sql_task = 'SELECT * FROM tasks WHERE user_id = ?';
    $projects = db_fetch_data($link, $sql_project, $id);
    $tasks = db_fetch_data($link, $sql_task, $id);
}

?>


