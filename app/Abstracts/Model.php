<?php

namespace App\Abstracts;

use PDO;
use PDOException;
use App\Lib\Log;

abstract class Model
{
    const DSN = "mysql:host=" . DB_SERVER . "; dbname=" . DB_NAME;
    const USER = DB_USERNAME;
    const PASSWD = DB_PASSWORD;

    /**
     * Execute the given sql query
     * 
     * @param  string  $sql         The sql query to execute
     * @param  array   $parameters  The parameters for the query
     */
    public static function executeQuery(string $sql, array $parameters = []): array|bool
    {
        try {
            $pdo = new PDO(self::DSN, self::USER, self::PASSWD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            Log::error($e->getMessage());
        }

        try {
            $statement = $pdo->prepare($sql);
            $statement->execute($parameters);

            $sqlType = strtoupper(explode(' ', trim($sql))[0]);

            if (in_array($sqlType, ['SELECT'])) {
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result ?: [];
            } else if (in_array($sqlType, ['INSERT', 'UPDATE', 'DELETE'])) {
                return $statement->rowCount();
            } else {
                return true;
            }
        } catch (PDOException $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Fetch all items from the resource
     */
    abstract public static function all(): array;

    /**
     * Fetch the specific item from the resource
     */
    abstract public static function find($id): array;

    /**
     * Save a new item to the resource
     */
    abstract public function save(): bool;

    /**
     * Update the specified item from the resource
     */
    abstract public function update($id): bool;

    /**
     * Remove the specified item from the resource
     */
    abstract public static function delete($id): bool;
}