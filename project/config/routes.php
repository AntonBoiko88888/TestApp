<?php
	use \Core\Route;
	
	return [
                new Route('/', 'main', 'index'), // роут главной страницы
                new Route('/login', 'login', 'index'), // роут страницы входа
                new Route('/logout', 'logout', 'index'), // роут страницы выхода
                new Route('/sort', 'sort', 'index'), // роут страницы c исполнением сортировки и переадресации на главную
                new Route('/edit/:task_id', 'edit', 'index'), // роут главной страницы с редактированием задачи
                new Route('/delete/:task_id', 'edit', 'delete'), // роут главной страницы с удалением задачи
                new Route('/task/:success_id', 'task', 'index'), // роут страницы с описанием по успешному (не успешному) добавлению задачи
                new Route('/:page', 'main', 'index'), // роут главной страницы с пагинацией

                
	];
	
