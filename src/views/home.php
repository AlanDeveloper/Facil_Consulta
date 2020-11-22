<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="models/css/style.css">
    <link rel="stylesheet" href="models/css/header.css">
    <link rel="stylesheet" href="models/css/home.css">
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
        <?php foreach ($data['list'] as $obj): ?>
            <div class="header-row">
                <h3>Dr. <?php echo $obj->getName(); ?></h3>
                <div>
                    <button class="btn"><a href="/alter?m=<?php echo $obj->getId(); ?>">Editar cadastro</a></button>
                    <button class="btn"><a href="/agend?m=<?php echo $obj->getId(); ?>">Configurar horários</a></button>
                </div>
            </div>
            <div class="body-row">
                <?php for ($i=0, $array = $obj->getHours(); $i < count($array); $i++): ?>
                    <div class="card">
                        <p><?php 
                            $date = date('d/m/Y', strtotime($array[$i])) . ' às ' . date('H:i', strtotime($array[$i]));
                            echo $date; ?></p>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endforeach; ?>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>