<?php require '../views/layout.php'; ?>
<h2>🛒 Nova Venda</h2>
<form method="POST" action="?action=sales.store">
    <label>Cliente:
        <select name="customer_id" required>
            <option value="">Selecione</option>
            <?php
            $stmt = $pdo->query("SELECT id, name FROM customers ORDER BY name");
            while ($c = $stmt->fetch()): ?>
                <option value="<?= $c['id'] ?>"><?= e($c['name']) ?></option>
            <?php endwhile; ?>
        </select>
    </label><br><br>

    <label>Produtos:</label><br>
    <?php
    $stmt = $pdo->query("SELECT id, name, price FROM products ORDER BY name");
    while ($p = $stmt->fetch()): ?>
        <div style="margin:5px 0; border:1px solid #ccc; padding:5px; border-radius:3px;">
            <?= e($p['name']) ?> - R$ <?= number_format($p['price'], 2, ',', '.') ?>
            <input type="hidden" name="product_id[]" value="<?= $p['id'] ?>">
            <input type="number" name="quantity[]" min="0" value="0" style="width:60px;">
        </div>
    <?php endwhile; ?>
    <br>
    <button class="btn" type="submit">Finalizar Venda</button>
</form>
<?php require '../views/layout_end.php'; ?>