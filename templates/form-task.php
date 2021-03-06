<h2 class="content__main-heading">Добавление задачи</h2>
<form class="form"  action="" method="post" enctype="multipart/form-data">
    <div class="form__row">
        <label class="form__label" for="name">Название <sup>*</sup></label>
        <input class="form__input <?=isset($errors['name']) ? "form__input--error" : ""?>" type="text" name="name" id="name" value="<?=isset($task['name']) ? strip_tags($task['name']) : "";?>" placeholder="Введите название">
        <?php if (isset($errors['name'])): ?>
            <p class="form__message"><?=$errors['name'] ?></p>
        <?php endif; ?>
    </div>
    <div class="form__row">
        <label class="form__label" for="project">Проект</label>

        <select class="form__input form__input--select" name="project" id="project">
            <?php foreach ($projects as $project): ?>
                <option value="<?=$project["id"] ?>"><?=strip_tags($project["name"]) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form__row">
        <label class="form__label" for="date">Дата выполнения</label>
        <input class="form__input form__input--date <?=isset($errors['date']) ? "form__input--error" : ""?>" type="date" name="date" id="date" value="<?=$value = isset($task['date']) ? $task['date'] : "";?>" placeholder="Введите дату в формате ДД.ММ.ГГГГ">
        <?php if (isset($errors['date'])): ?>
            <p class="form__message"><?=$errors['date'] ?></p>
        <?php endif; ?>
    </div>
    <div class="form__row">
        <label class="form__label" for="preview">Файл</label>

        <div class="form__input-file">
            <input class="visually-hidden" type="file" name="preview" id="preview" value="">

            <label class="button button--transparent" for="preview">
                <span>Выберите файл</span>
            </label>
        </div>
    </div>
    <div class="form__row form__row--controls">
        <input class="button" type="submit" name="" value="Добавить">
    </div>
</form>