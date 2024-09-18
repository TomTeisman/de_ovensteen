<?php

namespace App\Models;

use App\Abstracts\Model;

class Product extends Model
{
    public string $name;
    public int    $categorie_id; // foreign key
    public string $description;
    public float  $price;

    /**
     * @param  string  $name          The name of the product
     * @param  int     $categorie_id  The id of the category the product belongs to
     * @param  string  $description   The description of the product
     * @param  float   $price         The price of the product
     * @return Product                An instance of the Product class
     */
    public function __construct(string $name, int $categorie_id, string $description, float $price)
    {
        $this->name = $name;
        $this->categorie_id = $categorie_id;
        $this->description = $description;
        $this->price = $price;
    }

    public static function all(): array
    {
        $sql = "SELECT * FROM `products`";
        return self::executeQuery($sql);
    }

    public static function find($id): array
    {
        $sql = "SELECT * FROM `products` WHERE `id` = :id";
        $parameters = ['id' => $id];

        $result = self::executeQuery($sql, $parameters);
        return $result[0];
    }

    public function save(): bool
    {
        $sql = "INSERT INTO `products` (`name`, `categorie_id`, `description`, `price`) VALUES (:name, :categorie_id, :description, :price)";
        $parameters = [
            "name" => $this->name,
            "categorie_id" => $this->categorie_id,
            "description" => $this->description,
            "price" => $this->price
        ];

        return self::executeQuery($sql, $parameters);
    }

    public function update($id): bool
    {
        $sql = "UPDATE `products` SET `name` = :name, `categorie_id` = :categorie_id, `description` = :description, `price` = :price WHERE id = :id";
        $parameters = [
            'id' => $id,
            'name' => $this->name,
            'categorie_id' => $this->categorie_id,
            'description' => $this->description,
            'price' => $this->price
        ];

        return self::executeQuery($sql, $parameters);
    }

    public static function delete($id): bool
    {
        $sql = "DELETE FROM `products` WHERE `id` = :id";
        $parameters = ['id' => $id];

        return self::executeQuery($sql, $parameters);
    }

    public static function category($id)
    {
        $sql = "SELECT * FROM `categories` WHERE `id` = :id";
        $parameters = ['id' => $id];

        $return = self::executeQuery($sql, $parameters);
        return $return[0];
    }
}