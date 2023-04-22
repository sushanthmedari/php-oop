<?php

namespace Models;

use Models\BookModel;

use Models\DvdModel;

use Models\FurnitureModel;

class Product extends Model
{
  private $id;
  private $sku;
  private $name;
  private $price;
  private $product_type;
  private $height;
  private $width;
  private $lenght;
  private $size;
  private $weight;
  private $table = "products";


  public function __set($property, $value)
  {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }
    return $this;
  }

  public function __get($property)
  {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function create(array $data, ?array $relations = null)
  {
    foreach ($data as $key => $value) {
      if (property_exists($this, $key)) {
        $this->__set($key, $value);
      }
    }

    $class_vars = get_object_vars($this);

    foreach ($class_vars as $key => $value) {
      if (empty($this->$key)) {
        unset($class_vars[$key]);
      }
    }
    unset($class_vars["id"]);
    unset($class_vars["table"]);


    $firstParenthesis = "";
    $secondParenthesis = "";
    $i = 1;


    foreach ($class_vars as $key => $value) {
      if (property_exists($this, $key)) {
        $comma = $i === count((array)$class_vars) ? "" : ", ";
        $firstParenthesis .= "{$key}{$comma}";
        $secondParenthesis .= ":{$key}{$comma}";
        $i++;
      }
    }

    return $this->query("INSERT INTO {$this->table} ($firstParenthesis) VALUES($secondParenthesis)", $class_vars);
  }


  public function displayCard($string, $p)
  {
    $book = new BookModel();
    $dvd = new DvdModel();
    $furniture = new FurnitureModel();

    echo "<p>".$p->__get('sku') ."</p>";
    echo "<p>".$p->__get('name') ."</p>";
    echo "<p>".$p->__get('price') ." $" ."</p>";
    $$string->productType($p);
  }
}
