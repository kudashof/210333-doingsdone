<?php

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

function count_category($tasks_list, $project_name)
{
    $count = 0;
    foreach ($tasks_list as $item) {
        if ($item['category'] == $project_name) {
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
