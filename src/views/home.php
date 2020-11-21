<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title><?php echo $data['title']?></title>
</head>
<body>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
        <?php if($data['list']): ?>
            <?php foreach ($data['list'] as $obj): ?>
            <tr>
                <th scope='row'><?php echo $obj->getId(); ?></th>
                <td><?php echo $obj->getName(); ?></td>
                <td><button type="button" class="btn btn-warning"><a href="/alter?m=<?php echo $obj->getId(); ?>">Editar</a></button></td>
                <td><button type="button" class="btn btn-danger"><a href="/delete?m=<?php echo $obj->getId(); ?>">Excluir</a></button></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <th scope='row' span="2">Nenhum resultado encontrado.</th>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary"><a href="/register">Registrar Médico</a></button>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>