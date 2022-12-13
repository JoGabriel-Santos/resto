<?php
    class Product {
        public $id;
        public $product_image;
        public $product_name;
        public $price;

        public function __construct($id, $product_image, $product_name, $price) {
            $this->id = $id;
            $this->product_image = $product_image;
            $this->product_name = $product_name;
            $this->price = $price;
        }

        public static function productInfo($connection) {
            $sql = "SELECT * FROM products";
            $result = $connection->query($sql);

            foreach ($result as $row) {
                $products[] = new Product($row['id'], $row['product_image'], $row['product_name'], $row['price']);
            }

            return $products;
        }

        public static function createProduct($connection, $product_image, $product_name, $price) {
            $sql = "INSERT INTO products (product_image, product_name, price) VALUES ('product_image', 'product_name', 'price')";
            $connection->query($sql);
        }

        public static function updateProduct($connection, $id, $product_image, $product_name, $price) {
            $sql = "UPDATE products SET product_image = '$product_image', product_name = '$product_name', price = '$price' WHERE id = $id";
            $connection->query($sql);
        }

        public static function deleteProduct($connection, $id) {
            $sql = "DELETE FROM products WHERE id = $id";
            $connection->query($sql);
        }
    }
?>