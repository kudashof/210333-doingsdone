<?php

$title = "Дела в порядке";
//массив категорий
$category_list = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];

//список задач
$tasks_list = [
    [
        'title' => 'Собеседование в IT компании',
        'date' => '01.12.2019',
        'category' => $category_list[2],
        'complete' => false
    ],
    [
        'title' => 'Выполнить тестовое задание',
        'date' => '25.12.2019',
        'category' => $category_list[2],
        'complete' => false
    ],
    [
        'title' => 'Сделать задание первого раздела',
        'date' => '21.12.2019',
        'category' => $category_list[1],
        'complete' => true
    ],
    [
        'title' => 'Встреча с другом',
        'date' => '22.12.2019',
        'category' => $category_list[0],
        'complete' => false
    ],
    [
        'title' => 'Купить корм для кота',
        'date' => 'Нет',
        'category' => $category_list[3],
        'complete' => false
    ],
    [
        'title' => 'Заказать пиццу',
        'date' => 'Нет',
        'category' => $category_list[3],
        'complete' => false
    ]
];