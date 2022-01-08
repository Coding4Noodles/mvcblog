<?php
class Product {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllProducts() {
        $this->db->query('SELECT * FROM products ORDER BY created_at ASC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addProduct($data) {
        // checks such as isset
        $file = $_FILES["fileToUpload"];
        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $exp = explode(".", $fileName);
        $ext = $exp[1];
        $newName = uniqid();
        $completelyNewName = "{$newName}.{$ext}";
        $fileSize = $file["size"]; //can be used for to set a size
        $fileError = $file["error"];

        $filePath = __DIR__."../../../public/img/uploads/$completelyNewName";
         
        $dbPath = "public/img/uploads/".$completelyNewName;
       
        move_uploaded_file($fileTmpName, $filePath);

        $this->db->query('INSERT INTO products (user_id, title, descr, itemlink, imgPath) VALUES (:user_id, :title, :descr, :itemlink, :imgPath)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':descr', $data['descr']);
        $this->db->bind(':itemlink', $data['itemlink']);
        $this->db->bind(':imgPath', $dbPath);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findProductById($id) {
        $this->db->query('SELECT * FROM products WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function updateProduct($data) {
        $this->db->query('UPDATE products SET title = :title, descr = :descr, itemlink = :itemlink WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':descr', $data['descr']);
        $this->db->bind(':itemlink', $data['itemlink']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id) {
        $this->db->query('DELETE FROM products WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
