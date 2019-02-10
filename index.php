<?php
error_reporting( E_ALL );

require_once("functions.php");
require_once("data.php");

$page_content = include_template('index.php', [
        'show_complete_tasks' => $show_complete_tasks,
        'tasks_list' => $tasks_list]);
$layout_content = include_template('layout.php', [
    'title' => 'Дела в порядке',
    'page_content' => $page_content,
    'category_list' => $category_list,
    'tasks_list' => $tasks_list,
    'user_name' => 'Имя пользователя'
]);
print($layout_content);

?>


