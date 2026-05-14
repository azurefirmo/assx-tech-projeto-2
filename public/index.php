<?php
require_once '../config/db.php';
require_once '../includes/functions.php';

$action = $_GET['action'] ?? 'dashboard';

// Proteção de rotas
if (!isLoggedIn() && !in_array($action, ['login', 'auth.login'])) {
    redirect('?action=login');
}

switch ($action) {
    case 'dashboard':   require '../views/dashboard.php'; break;
    case 'login':       require '../views/login.php'; break;
    case 'auth.login':  require '../controllers/Auth.php'; break;
    case 'logout':      require '../controllers/Auth.php'; break;
    case 'products':    require '../controllers/Product.php'; break;
    case 'product.create': require '../views/products/form.php'; break; // Simplificado para listagem direta
    case 'sales.create': require '../views/sales/create.php'; break;
    case 'sales.store':  require '../controllers/Sale.php'; break;
    default:            require '../views/dashboard.php';
}