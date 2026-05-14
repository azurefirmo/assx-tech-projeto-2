<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        flash('success', 'Login realizado com sucesso!');
        redirect('?action=dashboard');
    }
    flash('error', 'Usuário ou senha inválidos.');
    redirect('?action=login');
} elseif ($action === 'logout') {
    session_destroy();
    redirect('?action=login');
}