<form action="/register" method="POST">
    <div class="form-group">
        <label for="name">Nome: </label>
        <input type="text" class="form-control" minlength="6" maxlength="250" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="emaiil">E-mail: </label>
        <input type="email" class="form-control" minlength="6" maxlength="250" name="email" id="email" required>
    </div>
    <div class="form-group">
        <label for="password">Senha: </label>
        <input type="password" class="form-control" minlength="6" maxlength="250" name="password" id="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>