<?php
require './app/controllers/productController.php';
require './app/controllers/authenticationController.php';
require './app/controllers/action.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$ProductControler = new ProductController();
$ActionController = new ActionController();
$controllerauthentication = new authenticationController();
// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
       $ProductControler->loadHome();
        break;
    case 'productos':
        $ProductControler->showProducts();
        break;
    case 'inventario': 
        $ProductControler->showInventory();
        break;
    case 'inventarioCategorias': 
        $ProductControler->showInventoryCategories();
        break;
    case 'login':
        $controllerauthentication->showLogin(); 
        break;
    case 'logout':
        $controllerauthentication->logout();
        break;
    case 'validar'://boton del login para validar los datos e iniciar sesion
        $controllerauthentication->validateUser();
        break;    
    case 'agregar':
        $ActionController->insertInventory();
        break;
    case 'agregarcategoria':
        $ActionController->insertInventoryCategories();
        break;    
    case 'eliminar'://eliminar por producto
        $ActionController->removeProduct($params[1]);
        break;
    case 'eliminarCategoria'://eliminar por categoria
        $ActionController->removeCategory($params[1]);
        break; 
    case 'editarFormProducto'://me lleva al form para editar el producto
        $ProductControler->showFormEditProduct($params[1]);
            break;
    case 'editarProducto'://modificar por producto
        $ActionController->editProduct($params[1]);
            break;
    case 'editarFormCategoria'://me lleva al form para modificar la categoria
        $ProductControler->showFormEditCategory($params[1]);
            break; 
    case 'editarCategoria'://modifico la categoria
        $ActionController->editCategory($params[1]);
            break;     
    case 'Categoria'://muestra por categoria al hacer click en el link
        $ProductControler->getByCategory($params[1]);
            break;
    case 'verMas':
        $ProductControler->getProductById($params[1]);
        break;  
    case 'GamaMedia'://modificar por categoria
            break;  
    case 'GamaBaja'://modificar por categoria
         break;                                 
    default: 
        $ProductControler->showError($error=null);
        break;
}

