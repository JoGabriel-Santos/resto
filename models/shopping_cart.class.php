<?php
    class ShoppingCart {
        public $id;
        public $quantity;
        public $client_id;
        public $product_id;

        public function __construct($id, $quantity, $client_id, $product_id) {
            $this->id = $id;
            $this->quantity = $quantity;
            $this->client_id = $client_id;
            $this->product_id = $product_id;
        }

        public static function addProduct($connection, $client_id, $product_id, $quantity) {
            $sql = "INSERT INTO shopping_cart (client_id, product_id, quantity) VALUES ('$client_id', '$product_id', '$quantity')";
            $connection->query($sql);
        }

        public static function itemsQuantity($connection, $client_id) {
            $sql = "SELECT sum(quantity) FROM shopping_cart WHERE client_id = $client_id";

            $result = $connection->query($sql);
            $quantity = $result->fetch();

            return $quantity['sum(quantity)'];
        }

        public static function total($connection, $client_id) {
            $sql = "SELECT sum((p.price * s.quantity)) FROM products p JOIN shopping_cart s ON s.product_id = p.id WHERE s.client_id = $client_id";

            $result = $connection->query($sql);
            $totalPrice = $result->fetch();

            return $totalPrice['sum((p.price * s.quantity))'];
        }

        public static function emptyShoppingCart($connection, $client_id) {
            $sql = "DELETE FROM shopping_cart WHERE client_id = $client_id";
            $connection->query($sql);
        }
    }
?>