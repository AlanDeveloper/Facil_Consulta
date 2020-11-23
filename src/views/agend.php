<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="models/css/style.css">
    <link rel="stylesheet" href="models/css/form.css">
    <link rel="stylesheet" href="models/css/agend.css">
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
        <div class="row">
            <div class="col">
                <form action="/agend?m=<?php echo $obj->getId(); ?>" method="POST">
                    <h3>Adicionar horários</h3>
                    <div class="form-group" id="hour">
                        <label for="name">Nome:</label>
                        <output id="name">Dr. <?php echo $obj->getName(); ?></output>
                    </div>
                    <div class="form-group">
                        <label for="datetime">Data e hora:</label>
                        <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar horário</button>
                    <a href="/">Voltar para a Página Inicial</a>
                </form>
            </div>
            <div class="col">
                <div class="hoursTable">
                    <h3>Horários configurados</h3>
                    <?php for ($i=0, $array = $data['obj']->getHours(); $i < count($array); $i++): ?>
                        <div>
                            <p><?php echo date('d/m/Y H:i', strtotime($array[$i])) ?></p>
                            <a href="#">Remover</a>
                        </div>
                    <?php endfor; ?>
                    <?php if(count($data['obj']->getHours()) == 0): ?>
                        <div class='notFound'>
                            <p>Nenhum horário agendado.</p>
                        </div>
                    <?php endif?>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>