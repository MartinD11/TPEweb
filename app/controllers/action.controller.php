<?php
require_once './app/models/action.model.php';
require_once './app/views/productView.php';

class ActionController {
    private $View;
    Private  $Model;

    public function __construct(){
        AuthHelper::init();
        $this->View=new ViewProduct();
        $this->Model=new ActionModel();
    }

    public function insertInventory(){
        //recibo por post todos los valores del formulario
            $producto = $_POST['producto'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $marcas = $_POST['marcas'];
            $imagen = $_FILES['imagen']['name'];//obtiene el nombre
            $archivo = $_FILES['imagen']['tmp_name'];//contiene el archivo
            $ruta = './images';
            $ruta = $ruta.'/'.$imagen;
        if(empty($producto) || empty($categoria) ||empty($precio) ||empty($descripcion) ||empty($marcas ) ||empty($ruta)){
            //crear una funcion para el manejo de errores
            $this->View->showError('Los datos ingresados no son validos');
            return;
        } else {
            move_uploaded_file($archivo,$ruta);
            $this->Model->insertInventory($producto,$precio,$descripcion,$ruta,$marcas,$categoria);
            header('Location: ' . BASE_URL . '/inventario');
        }
    }

    public function removeProduct($id){
        $this->Model->deleteProduct($id);
        header('Location: ' . BASE_URL . '/inventario');
    }

    public function removeCategory($id){
        //en la base de datos la opcion de remove esta en restrited
        //funcionaria si se cambia la opcion a CASCADE
        $this->Model->deleteCategory($id);
        header('Location: ' . BASE_URL . '/inventarioCategorias');
    }

    public function insertInventoryCategories(){
        $categoria = $_POST['categoria'];
        $gama =  $_POST['gama'];

        if(empty($categoria) || empty($gama)){
            $this->View->showError("Los datos ingresados no son validos");
        }else{
             $this->Model->insertInventoryCategories($categoria,$gama);
            header('Location: ' . BASE_URL . '/inventarioCategorias');
             //crear una funcion para el manejo de errores   
        }
    }

    public function editCategory($id){
        $categoria = $_POST['categoria'];
        $gama = $_POST['gama'];

        if(empty($categoria) || empty($gama)){
            //aca mostrar el error que hay que hacer desde el view
            $this->View->showError("Los datos ingresados no son validos");
        }else {
            $this->Model->updateCategories($id,$categoria,$gama);
            header('Location: ' . BASE_URL . '/inventarioCategorias');
        }
    }

    public function editProduct($id){
        //recibo por post todos los valores del formulario
            $producto = $_POST['producto'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];
            $marcas = $_POST['marcas'];
            $imagen = $_FILES['imagen']['name'];//obtiene el nombre
            $archivo = $_FILES['imagen']['tmp_name'];//contiene el archivo
            $ruta = './images';
            $ruta = $ruta.'/'.$imagen;
            $activo = isset($_POST['activo']) && $_POST['activo'] == "1" ? true : false; // Convertir el checkbox en un valor booleano
        if(empty($producto) || empty($categoria) ||empty($precio) ||empty($descripcion) ||empty($marcas ) ||empty($ruta)){
            $this->View->showError("Los datos ingresados no son validos");
        } else {
            move_uploaded_file($archivo,$ruta);
            $this->Model->updateProduct($id,$producto,$precio,$descripcion,$activo,$ruta,$marcas,$categoria);
            header('Location: ' . BASE_URL . '/inventario');
        }
    }
}