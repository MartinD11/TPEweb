<?php
require_once 'app/models/model.php';
class ProductModel extends Model{

    

    public function getProducts(){
        //hacemos una consulta multitabla ya que siempre hay que mostrar a que categoria pertenecen los productos
        $query = $this->db->prepare('SELECT p.id_producto, p.Producto, p.Precio, p.Descripcion, p.Stock, p.Imagen, p.Marcas, c.Categoria
        FROM productos p
        INNER JOIN categorias c ON p.id_categorias = c.id_categorias ');
        $query->execute();

        // $productos es un arreglo de productos
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    public function getCategories(){
        $query = $this->db->prepare('SELECT * FROM `categorias`');
        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;

    }

    public function getProductByCategory($id){
        $query = $this->db->prepare("SELECT productos.*, categorias.Categoria
        FROM productos
        INNER JOIN categorias ON productos.id_categorias = categorias.id_categorias
        WHERE productos.id_categorias = ?");
        $query->execute([$id]);
        $productByCategory = $query->fetchAll(PDO::FETCH_OBJ);

        return $productByCategory;
    }

    public function getProductId($id){
        $query = $this->db->prepare("SELECT * 
        FROM productos p
        INNER JOIN categorias c ON p.id_categorias = c.id_categorias  WHERE p.id_producto = ?");
        $query->execute([$id]);
    
        $product_id = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $product_id;
    } 

}