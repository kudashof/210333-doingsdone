INSERT INTO projects (name, user_id)
VALUES
  ('Входящие', 2),
  ('Учеба', 1),
  ('Работа', 1),
  ('Домашние дела', 2),
  ('Авто', 1);


INSERT INTO users (date_reg, name, email, password)
VALUES
  ('19.02.2019', 'Леопольд', 'cat@mail.ru', '000'),
  ('20.02.2019', 'Мыши', 'mouse@mail.ru', '111');

INSERT INTO tasks (date_add, date_complete, date_deadline, status, name, file, project_id, user_id)
VALUES
  ('06.02.2019', '20.02.2019', '01.12.2019', '0', 'Собеседование в IT компании', NULL, 3, 1),
  ('06.02.2019', '20.02.2019', '25.12.2019', '0', 'Выполнить тестовое задание', NULL, 3, 1),
  ('06.02.2019', '20.02.2019', '21.12.2019', '1', 'Сделать задание первого раздела', NULL, 2, 1),
  ('06.02.2019', '20.02.2019', '22.12.2019', '0', 'Встреча с другом', NULL, 1, 2),
  ('06.02.2019', '20.02.2019', '21.02.2019', '0', 'Купить корм для кота', NULL, 4, 2),
  ('06.02.2019', '20.02.2019', NULL, '0', 'Заказать пиццу', NULL, 4, 2);

-- Получаем список из всех проектов для одного пользователя;
SELECT name
FROM projects
WHERE user_id = '1';

-- Получаем список из всех задач для одного проекта;
SELECT name
FROM tasks
WHERE project_id = '3';

-- Помечаем задачу как выполненную;
UPDATE tasks
SET status = '1'
WHERE name = 'Собеседование в IT компании';

-- Обновляем название задачи по её идентификатору
UPDATE tasks
SET name = 'Пройти собеседование'
WHERE id = 1;