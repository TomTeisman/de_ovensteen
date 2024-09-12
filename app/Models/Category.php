<?php

namespace App\Models;

use App\Abstracts\Model;

class Category extends Model
{
    public string $name;
    public string $slug;

    /**
     * @param  string  $name  The name of the Category
     * @param  string  $slug  The slug of the Category
     * @return Category       An instance of the Category Class
     */
    public function __construct(string $name, string $slug)
    {
        parent::__construct();
        $this->name = $name;
        $this->slug = $slug;
    }

    public static function all(): array
    {
        $sql = "SELECT * FROM `categories`";
        return self::executeQuery($sql);
    }

    public static function find($id): array
    {
        $sql = "SELECT * FROM `categories` WHERE `id` = :id";
        $parameters = ['id' => $id];

        $result = self::executeQuery($sql, $parameters);
        return $result[0];
    }

    public function save(): bool
    {
        $sql = "INSERT INTO `categories` (`name`, `slug`) VALUES (:name, :slug)";
        $parameters = [
            'name' => $this->name,
            'slug' => $this->slug
        ];

        return self::executeQuery($sql, $parameters);
    }

    public function update($id): bool
    {
        $sql = "UPDATE `categories` SET `name` = :name, `slug` = :slug WHERE id = :id";
        $parameters = [
            'id' => $id,
            'name' => $this->name,
            'slug' => $this->slug
        ];

        return self::executeQuery($sql, $parameters);
    }

    public static function delete($id): bool
    {
        $sql = "DELETE FROM `categories` WHERE `id` = :id";
        $parameters = ['id' => $id];

        return self::executeQuery($sql, $parameters);
    }

    public static function products($id): array
    {
        $sql = "SELECT * FROM `products` WHERE `categorie_id` = :categorie_id";
        $parameters = ['categorie_id' => $id];

        return self::executeQuery($sql, $parameters);
    }
}