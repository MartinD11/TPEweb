<?php

 class ViewProduct{

    public function showHome(){
        require 'templates/home.phtml';
    }

    public function showProducts($products,$categories){
        require 'templates/products.phtml';
    }

    public function showError($error){
        require 'templates/showError.phtml';
    }

    public function showInventory($products, $categories){
        require 'templates/inventory.phtml';
    }

    public function showInventoryCategories($categories){
         require 'templates/inventoryCategories.phtml';   
    }

    public function showFormEditCategory($id){
        require 'templates/formeditCategory.phtml';
    }

    public function showFormEditProduct($id,$categories){
        require 'templates/formeditProducts.phtml';
    }

    public function showProductsByCategory($productByCategory,$categories){
        require 'templates/showProductByCategory.phtml';
    }

    public function showProductDetails($productById){
        require 'templates/viewMore.phtml';
    }
}

?>