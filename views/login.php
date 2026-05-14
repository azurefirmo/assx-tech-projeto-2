<?php require 'layout.php'; ?>
<h2>🔐 Login</h2>
<form method="POST" action="?action=auth.login">
    <label>Usuário: <input type="text" name="username" required></label><br>
    <label>Senha: <input type="password" name="password" required></label><br>
    <button class="btn" type="submit">Entrar</button>
</form>
<?php require 'layout.php'; // fecha </div></body></html> via include ?>