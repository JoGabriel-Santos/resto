<?php
    class Client {
        public $id;
        public $name;
        public $email;
        public $password;

        public function __construct($id, $name, $email, $password) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }

        public static function clientInfo($connection, $id) {
            $sql = "SELECT * FROM clients WHERE id = $id";
            $result = $connection->query($sql);
            $row = $result->fetch();

            return new Client($row['id'], $row['name'], $row['email'], $row['password']);
        }

        public static function listClients($connection) {
            $sql = "SELECT * FROM clients";
            $result = $connection->query($sql);

            foreach ($result as $row) {
                $clients[] = new Client($row['id'], $row['name'], $row['email'], $row['password']);
            }

            return $clients;
        }

        public static function createClient($connection, $name, $email, $password) {
            $sql = "INSERT INTO clients (name, email, password) VALUES ('$name', '$email', '$password')";
            $connection->query($sql);
        }

        public static function updateClient($connection, $id, $name, $email, $password) {
            $sql = "UPDATE clients SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";
            $connection->query($sql);
        }

        public static function deleteClient($connection, $id) {
            $sql = "DELETE FROM clients WHERE id = $id";
            $connection->query($sql);
        }
    }
?>