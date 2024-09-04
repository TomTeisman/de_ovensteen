<?php

namespace App\Abstracts;

use PDO;
use PDOException;

abstract class Model
{
    const DSN = "mysql:host=" . DB_SERVER . "; dbname=" . DB_NAME;
    const USER = DB_USERNAME;
    const PASSWD = DB_PASSWORD;

    protected $pdo;

    public function __construct() 
    {
        try {
            $this->pdo = new PDO(self::DSN, self::USER, self::PASSWD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // add error handeling
            die($e->getMessage());
        }
    }

    public static function executeQuery(string $sql, array $parameters = []): array
    {
        try {
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // add error handeling
            die($e->getMessage());
        }
        
        try {
            $statement = $pdo->prepare($sql);
            $statement->execute($parameters);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result ?: [];
        } catch (PDOException $e) {
            // add error handeling
            die($e->getMessage());
        }
    }

    abstract public static function all(): array;

    abstract public static function find($id): array;
}