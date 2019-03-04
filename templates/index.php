<h2 class="content__main-heading">Список задач</h2>

<form class="search-form" action="index.php" method="post">
    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

    <input class="search-form__submit" type="submit" name="" value="Искать">
</form>

<div class="tasks-controls">
    <nav class="tasks-switch">
        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
        <a href="/" class="tasks-switch__item">Повестка дня</a>
        <a href="/" class="tasks-switch__item">Завтра</a>
        <a href="/" class="tasks-switch__item">Просроченные</a>
    </nav>

    <label class="checkbox">
        <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
        <input class="checkbox__input visually-hidden show_completed" type="checkbox"
               <?php if ($show_complete_tasks == 1): ?>checked<?php endif; ?>>
        <span class="checkbox__text">Показывать выполненные</span>
    </label>
</div>

<table class="tasks">
    <?php if (http_response_code() === 200): ?>
        <?php foreach ($tasks as $key => $value): ?>
            <?php if (($value['status']) && ($show_complete_tasks == 0)) {
                continue;
            } ?>
            <?php if (!isset($_GET['projectID']) || $_GET['projectID'] == $value['project_id']): ?>
                <tr class="tasks__item task <?php if ($value['status']) {
                    echo "task--completed";
                } else {
                    if (time_diff($value['date_deadline'])) {
                        echo 'task--important';
                    }
                }
                ?>">
                    <td class="task__select">
                        <label class="checkbox task__checkbox">
                            <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                            <span class="checkbox__text"><?= strip_tags($value['name']); ?></span>
                        </label>
                    </td>

                    <td class="task__file">
                        <a class="download-link" href="#"><?=$value["file"];?>"><?=$value["file"];?></a>
                    </td>

                    <td class="task__date"><?= isset($value['date_deadline']) ? strip_tags($value['date_deadline']) : ""; ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Ошибка 404</p>
    <?php endif; ?>
    <!--показывать следующий тег <tr/>, если переменная $show_complete_tasks равна единице-->
</table>