<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title><?php echo $data['title']?></title>
</head>
<body>
    <form action="/register" method="POST">
        <div class="form-group">
            <label for="name">Nome: </label>
            <input type="text" class="form-control" value="<?php if($data['inputs']['name'] != '') echo $data['inputs']['name']?>" minlength="6" maxlength="250" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="emaiil">E-mail: </label>
            <input type="email" class="form-control" value="<?php if($data['inputs']['email'] != '') echo $data['inputs']['email']?>" minlength="6" maxlength="250" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Senha: </label>
            <input type="password" class="form-control" minlength="6" maxlength="250" name="password" id="password" required>
        </div>
        <?php if($data['error']): ?>
            <div class="alert alert-warning" role="alert"><?php echo $data['error']; ?></div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>