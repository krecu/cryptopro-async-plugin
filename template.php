<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>КриптоПро ЭЦП browser plug-in</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h2>
                    Пример создания прикрепленной подписи с помощью Async КриптоПро ЭЦП browser plug-in
                </h2>
                <p>
                    <ul>
                        <li>Загрузите файл</li>
                        <li>Выбирите сертификат</li>
                        <li>Нажмите подписать</li>
                    </ul>
                </p>
                <p>
                <form action="" method="post" enctype="multipart/form-data">
                            <span class="btn btn-default btn-file">
                                Обзор <input name="file" type="file">
                            </span>
                    <button class="btn btn-primary btn-large">Загрузить</button>
                </form>
                </p>
            </div>
        </div>
    </div>

    <?php if (!empty($messages)) : ?>
        <?php foreach ($messages as $message) : ?>
            <div class="alert alert-success"><?= $message ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Файл</th>
                    <th>Тип</th>
                    <th>Размер</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($files as $file) : ?>
                    <tr>
                        <td><a target="_blank" class="file" href="<?= $file['download'] ?>"><?= $file['name'] ?></a></td>
                        <td><?= $file['mime'] ?></td>
                        <td><?= $file['size'] ?> Mb</td>
                        <td>
                            <select class="listCert"></select>
                            <button class="signFile btn btn-primary btn-large">Подписать</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="js/cades_api.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>