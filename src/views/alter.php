<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="models/css/style.css">
    <link rel="stylesheet" href="models/css/form.css">
    <title><?php echo $data['title']?></title>
</head>
<body>
    <header>
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a href="/register">Cadastro de médico</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <form action="/alter?m=<?php echo $data['obj']->getId(); ?>" method="POST">
            <h3>Editar médico</h3>
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" value="<?php echo $data['obj']->getName(); ?>" minlength="6" maxlength="250" name="name" id="name"  placeholder="Insira o nome do profissional" required>
            </div>
            <div class="form-group">
                <label for="password">Senha antiga</label>
                <input type="password" class="form-control" minlength="6" maxlength="250" name="password" id="password" placeholder="Insira a senha antiga" required>
            </div>
            <div class="form-group">
                <label for="newpassword">Nova senha</label>
                <input type="password" class="form-control" minlength="6" maxlength="250" name="newpassword" id="newpassword" placeholder="Escolha uma nova senha forte e segura">
            </div>
            <?php if($data['error']): ?>
                <div class="alert alert-warning" role="alert"><?php echo $data['error']; ?></div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Atualizar cadastro</button>
            <a href="/">Voltar para a Página Inicial</a>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>