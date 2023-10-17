<?php

require_once './app/models/productModel.php';
require_once './app/views/productView.php';
 class ProductController {
    
    private $Model;
    private $View;

    public function __construct() {
        $this->View= new ViewProduct();
        $this->Model= new ProductModel();
    }

    public function loadHome(){
        $this->View->showHome();
    }

    public function showProducts(){
        $categories = $this->Model->getCategories();
        $products = $this->Model->getProducts();
        $this->View->showProducts($products,$categories);
    }


    public function showInventory(){
        AuthHelper::verify();
        $products = $this->Model->getProducts();
        $categories = $this->Model->getCategories();//la obtengo para poder mostrar en el select la categoria a elegir en el form
        $this->View->showInventory($products,$categories);
    }

    public function showInventoryCategories(){
        AuthHelper::verify();
        $categories = $this->Model->getCategories();
        $this->View->showInventoryCategories($categories);
    }

    public function showFormEditCategory($id){
        AuthHelper::verify();
        $this->View->showFormEditCategory($id);
    }

    public function showFormEditProduct($id){
        AuthHelper::verify();
        $categories = $this->Model->getCategories();//la obtengo para poder mostrar en el select la categoria a elegir en el form
        $this->View->showFormEditProduct($id,$categories);
    }

    public function getByCategory($id){
        $categories = $this->Model->getCategories();
        $productByCategory = $this->Model->getProductByCategory($id);
        $this->View->showProductsByCategory($productByCategory,$categories);
    }
    public function getProductById($id){
        $productById=$this->Model->getProductId($id);
        $this->View->showProductDetails($productById);

    }

    public function showError($error){
        $this->View->showError($error);
    }
}