<?php

require_once("functions.php");
require_once("data.php");

$page_content = include_template('index.php', [
        'show_complete_tasks' => $show_complete_tasks,
        'tasks' => $tasks_list]);
$layout_content = include_template('layout.php', [
    'title' => 'Дела в порядке',
    'content' => $page_content,
    'projects' => $category_list,
    'tasks' => $tasks_list,
    'user_name' => 'Имя пользователя'
]);
print($layout_content);

?>


