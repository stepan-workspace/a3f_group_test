<?php 

require_once(__DIR__ . '/../Loader.php');
require_once(__DIR__ . '/../App.php');

$app = new App(Loader::class, 'loadByClassName');
$app->initialize();

?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Тестовое задание A3F Group: PHP-fullstack разработчик</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="/" method="get">
                        <div class="mb-3">
                            <label for="formUrl" class="form-label">URL адрес:</label>
                            <input name="url" id="formUrl" type="url" value="<?= isset($_GET['url']) ? $_GET['url'] : '' ?>" class="form-control" aria-describedby="formUrlHelp">
                            <div id="formUrlHelp" class="form-text">Укажите Url адрес страницы, теги которой нужно посчитать</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Подолжить</button>
                    </form>

                    <? if ( ! empty($app->getAppDTO()?->urlDTO->getUrl())): ?>
                        <p class="lead">
                            Вы указали следующий URL адрес:
                        </p>
                        <div class="alert alert-success" role="alert">
                            <?= $app->getAppDTO()?->urlDTO->getUrl() ?>
                        </div>
                        <p class="lead">
                            Найдены и подсчитаны теги:
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Tag ID</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Количество</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach ($app->getAppDTO()->tagCountRepository->getAll() as $k => $v): ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $v->getId() ?>
                                        </th>
                                        <td>
                                            <?= $v->getName() ?>
                                        </td>
                                        <td>
                                            <?= $v->getCount() ?>
                                        </td>
                                    </tr>
                                <? endforeach; ?>
                            </tbody>
                        </table>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </body>
</html> 
