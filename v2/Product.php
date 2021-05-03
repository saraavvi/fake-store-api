<?php

class Product
{

    private $id;
    private $title;
    private $description;
    private $price;
    private $image;
    private $category;

    public function __construct($id, $title, $description, $price, $category)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->image = $this->getImageUrl();
        $this->category = $category;
    }

    public function getImageUrl()
    {
        return "https://picsum.photos/500?random=" . $this->id;
    }

    public function toArray()
    {
        $array = array(
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "price" => $this->price,
            "image" => $this->image,
            "category" => $this->category
        );
        return $array;
    }
}
