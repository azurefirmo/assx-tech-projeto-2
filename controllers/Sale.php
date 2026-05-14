<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = $_POST['customer_id'];
    $products = $_POST['product_id'];
    $quantities = $_POST['quantity'];
    $total = 0;

    try {
        $pdo->beginTransaction();

        // Cria a venda
        $stmt = $pdo->prepare("INSERT INTO sales (customer_id, total) VALUES (?, 0)");
        $stmt->execute([$customer_id]);
        $sale_id = $pdo->lastInsertId();

        foreach ($products as $idx => $prod_id) {
            $qty = (int)$quantities[$idx];
            if ($qty <= 0) continue;

            $p = $pdo->query("SELECT price, stock FROM products WHERE id = $prod_id")->fetch();
            if ($p['stock'] < $qty) throw new Exception("Estoque insuficiente do produto $prod_id");

            $subtotal = $p['price'] * $qty;
            $total += $subtotal;

            $stmt = $pdo->prepare("INSERT INTO sale_items (sale_id, product_id, quantity, unit_price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$sale_id, $prod_id, $qty, $p['price']]);

            $stmt = $pdo->prepare("UPDATE products SET stock = stock - ? WHERE id = ?");
            $stmt->execute([$qty, $prod_id]);
        }

        $stmt = $pdo->prepare("UPDATE sales SET total = ? WHERE id = ?");
        $stmt->execute([$total, $sale_id]);

        $pdo->commit();
        flash('success', "Venda #{$sale_id} finalizada! Total: R$ " . number_format($total, 2, ',', '.'));
    } catch (Exception $e) {
        $pdo->rollBack();
        flash('error', 'Erro: ' . $e->getMessage());
    }
    redirect('?action=sales.create');
}