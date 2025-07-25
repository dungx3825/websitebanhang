<?php
session_start();

require_once 'app/Controller/UserController.php';
require_once 'app/Controller/ProductController.php';
require_once 'app/Controller/CartController.php';

$action = $_GET['action'] ?? 'products';

$userController = new UserController();
$productController = new ProductController();
$cartController = new CartController();

switch ($action) {
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->register();
        } else {
            $userController->registerForm();
        }
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->login();
        } else {
            $userController->loginForm();
        }
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'products':
        $productController->list();
        break;
    case 'product_detail':
        $productController->detail();
        break;
    case 'admin_products':
        $productController->adminList();
        break;
    case 'add_product':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productController->add();
        } else {
            $productController->addForm();
        }
        break;
    case 'edit_product':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productController->edit();
        } else {
            $productController->editForm();
        }
        break;
    case 'delete_product':
        $productController->delete();
        break;
    case 'cart':
        $cartController->view();
        break;
    case 'add_to_cart':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cartController->add();
        }
        break;
    case 'update_cart':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cartController->update();
        }
        break;
    case 'remove_cart_item':
        $cartController->remove();
        break;
    default:
        echo "Không tìm thấy trang.";
}
