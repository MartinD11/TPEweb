<?php
require_once 'app/models/model.php';
class actionModel extends Model{

    

    public function insertInventory($producto,$precio,$descripcion,$ruta,$marcas,$categoria){
        $query= $this->db->prepare('INSERT INTO productos (Producto,Precio,Descripcion,Imagen,Marcas,id_categorias) VALUES(?,?,?,?,?,?)');
        $query->execute([$producto,$precio,$descripcion,$ruta,$marcas,$categoria]);
        return $this->db->lastInsertId();
    }

    public function insertInventoryCategories($categoria,$gama){
        $query = $this->db->prepare('INSERT INTO categorias(Categoria,Gama) VALUES(?,?)');
        $query->execute([$categoria,$gama]);
        return $this->db->lastInsertId();
    }

    public function deleteProduct($id){
        $query = $this->db->prepare('DELETE FROM productos WHERE id_producto = ?');
        $query->execute([$id]);
    }

    public function deleteCategory($id){
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categorias = ?');
        $query->execute([$id]);
    }

    public function updateCategories($id,$categoria,$gama){
        $query = $this->db->prepare("UPDATE categorias SET `Categoria` = ?, `Gama` = ? WHERE id_categorias = ?; ");
        $query->execute([$categoria,$gama,$id]);
    }

    public function updateProduct($id,$producto,$precio,$descripcion,$activo,$ruta,$marcas,$categoria){
        $query = $this->db->prepare("UPDATE productos SET Producto = ?,Precio=?, Descripcion = ?, Stock = ?, Imagen = ?, Marcas = ?, id_categorias = ? WHERE id_producto = ?");
        $query->execute([$producto,$precio,$descripcion,$activo,$ruta,$marcas,$categoria,$id]);
    }
}