<?php

class Cart {
    private $products;

    public function __construct() {
        $this->products = array();
    }

    public function addProduct(Product $product) {
        array_push($this->products, $product);
    }

    public function removeProduct(Product $product) {
        $index = array_search($product, $this->products);
        if ($index !== false) {
            unset($this->products[$index]);
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice() * $product->getQuantity();
        }
        return $total;
    }

    public function __toString() {
        $output = "Products in cart:\n";
        foreach ($this->products as $product) {
            $output .= $product . "\n";
        }
        $output .= "Total price: " . $this->getTotal();
        return $output;
    }
}