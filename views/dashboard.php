<?php require 'layout.php';
$stmt = $pdo->query("SELECT COUNT(*) as total FROM sales");
$totalSales = $stmt->fetch()['total'];
$stmt = $pdo->query("SELECT SUM(total) as revenue FROM sales");
$revenue = $stmt->fetch()['revenue'] ?? 0;
?>
<h2>📊 Dashboard</h2>
<p><strong>Total de Vendas:</strong> <?= $totalSales ?></p>
<p><strong>Faturamento:</strong> R$ <?= number_format($revenue, 2, ',', '.') ?></p>
<?php require '../views/layout_end.php'; ?>