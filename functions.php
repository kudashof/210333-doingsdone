<?php
require_once('mysql_helper.php');
function include_template($name, $data)
{
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

function count_category($tasks, $project_name)
{
    $count = 0;
    foreach ($tasks as $item) {
        if ($item['project_id'] == $project_name) {
            $count++;
        }
    }
    return $count;
}

// Разница в датах
function time_diff($time_value)
{
    if (strtotime($time_value)) {
        $secs_in_day = 86400; // секунд в дне
        $current_date = time(); // текущее время
        $end_date = strtotime($time_value); //  дедлайн
        $remain = $end_date - $current_date; // разница между датами
        return ($remain <= $secs_in_day);

    }
}

function db_fetch_data($link, $sql, $data = [])
{
    $stmt = db_get_prepare_stmt($link, $sql, [$data]);
    mysqli_stmt_execute($stmt);
    if ($res = mysqli_stmt_get_result($stmt)) {
        $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $res;
    } else {
        print("Ошибка запроса: " . mysqli_error($link));
    }
}