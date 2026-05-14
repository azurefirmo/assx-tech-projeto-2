<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Vendas</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; background: #f4f4f4; }
        nav { background: #333; padding: 10px; color: white; }
        nav a { color: white; margin-right: 15px; text-decoration: none; }
        .container { max-width: 900px; margin: 20px auto; background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: left; }
        .btn { padding: 6px 12px; background: #007bff; color: white; border: none; cursor: pointer; border-radius: 3px; }
        .alert { padding: 10px; margin-bottom: 10px; border-radius: 3px; }
        .alert-success { background: #d4edda; color: #155724; }
        .alert-error { background: #f8d7da; color: #721c24; }
        input, select { padding: 6px; margin: 5px 0; }
    </style>
</head>
<body>
    <nav>
        <a href="?action=dashboard">Dashboard</a>
        <a href="?action=products">Produtos</a>
        <a href="?action=sales.create">Nova Venda</a>
        <a href="?action=logout" style="float:right;">Sair</a>
    </nav>
    <div class="container">
        <?php if ($msg = flash('success')): ?>
            <div class="alert alert-success"><?= e($msg) ?></div>
        <?php elseif ($msg = flash('error')): ?>
            <div class="alert alert-error"><?= e($msg) ?></div>
        <?php endif; ?>