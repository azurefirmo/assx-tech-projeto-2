<?php require 'layout.php'; ?>
<h2>📦 Produtos</h2>
<form method="POST" action="?action=products">
    <input type="hidden" name="action_type" value="store">
    <input type="text" name="name" placeholder="Nome" required>
    <input type="number" step="0.01" name="price" placeholder="Preço" required>
    <input type="number" name="stock" placeholder="Estoque" required>
    <button class="btn" type="submit">Adicionar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action_type'] === 'store') {
    $stmt = $pdo->prepare("INSERT INTO products (name, price, stock) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['price'], $_POST['stock']]);
    flash('success', 'Produto cadastrado!');
    redirect('?action=products');
}

$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll();
?>
<table>
    <tr><th>ID</th><th>Nome</th><th>Preço</th><th>Estoque</th></tr>
    <?php foreach ($products as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= e($p['name']) ?></td>
            <td>R$ <?= number_format($p['price'], 2, ',', '.') ?></td>
            <td><?= $p['stock'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require '../views/layout_end.php'; ?>