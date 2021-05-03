<?php
include_once 'Product.php';

class App
{
    private static $allProducts = array(
        array("title" => "cool pants", "description" => "very soft and comfy", "price" => 109.95, "category" => " mens clothing"),
        array("title" => "long dress", "description" => "pretty very pretty", "price" => 11, "category" => "womens clothing",),
        array("title" => "18K gold plated necklace", "description" => "Elegance meets simplicity with the 18k gold-plated Memory necklace, a classic thin Singapore chain that is twisted and sparkly. The necklace looks perfect on its own or when layered with other necklaces. Talk about versatile styling.", "price" => 110, "category" => "jewellery",),
        array("title" => "green diamond ring", "description" => "Add something unique to your jewellery box with the 18k gold-plated Green Diamond ring. Featuring a breathtaking green cubic zirconia stone, this ring will easily dress up your chic street style or add some glam to your classic outfits.", "price" => 100, "category" => "jewellery",),
        array("title" => "Mens Cotton Jacket", "description" => "great outerwear jackets for Spring/Autumn/Winter, suitable for many occasions, such as working, hiking, camping, mountain/rock climbing, cycling, traveling or other outdoors. Good gift choice for you or your family member.", "price" => 40, "category" => "mens clothing",),
        array("title" => "Pierced Owl Gold Plated", "description" => "Rose Gold Plated Double Flared Tunnel Plug Earrings. Made of 316L Stainless Steel", "price" => 56, "category" => "jewellery",),
        array("title" => "John Hardy Chain Bracelet", "description" => "From our Legends Collection, the Naga was inspired by the mythical water dragon that protects the ocean\\'s pearl.", "price" => 54, "category" => "jewellery",),
        array("title" => "Fjällraven Backpack", "description" => "Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday", "price" => 105, "category" => "mens clothing",),
        array("title" => "sleeve linen midi dress in mustard", "description" => "Lightweight cotton soft, strong and breathable", "price" => 32, "category" => "womens clothing",),
        array("title" => "block heeled sandals in beige", "description" => "Lining: 100% Textile, Sole: 100% Other Materials, Upper: 100% Textile.", "price" => 98, "category" => "womens clothing",),
        array("title" => "high rise 'original' mom jeans in black", "description" => "Non-stretch denim these jeans use 50% less water during washing, ageing and finishing compared with conventional jeans", "price" => 55, "category" => "womens clothing",),
        array("title" => "Mens Casual Slim Fit", "description" => "The color could be slightly different between on the screen and in practice. / Please note that body builds vary by person, therefore, detailed size information should be reviewed below on the product description.", "price" => 43, "category" => "mens clothing",),
        array("title" => "White Gold Plated Princess", "description" => "Classic Created Wedding Engagement Solitaire Diamond Promise Ring for Her. Gifts to spoil your love more for Engagement, Wedding, Anniversary, Valentine\\'s Day...", "price" => 102, "category" => "jewellery",),
        array("title" => "3-in-1 Snowboard Jacket", "description" => "Note: The Jackets is US standard size, Please choose size as your usual wear Material=> 100% Polyester; Detachable Liner Fabric=> Warm Fleece. Detachable Functional Liner=> Skin Friendly, Lightweigt and Warm.Stand Collar Liner jacket, keep you warm in cold weather.", "price" => 100, "category" => "womens clothing",),
        array("title" => "Longline Belted Jacket in Khaki", "description" => "Soft twill semi-structured fabric with a parallel-rib pattern", "price" => 77, "category" => "womens clothing",),
        array("title" => "pack of 8 mixed colourful rings in plastic", "description" => "Avoid contact with liquids", "price" => 20, "category" => "jewellery",),
        array("title" => "loafers in baroque print with snaffle", "description" => "your go-to for all the latest trends, no matter who you are, where you’re from and what you’re up to", "price" => 67, "category" => "mens clothing",),
        array("title" => "printed logo t-shirt in green and white", "description" => "Super-soft Nike Breathe fabric helps maintain a constant flow of air to keep you cool", "price" => 50, "category" => "mens clothing",),
        array("title" => "exclusive shirt and trouser pyjama set", "description" => "Glossy, satin-style fabric silky-smooth and drapey", "price" => 89, "category" => "womens clothing",),
        array("title" => "performance legging shorts in dress blue", "description" => "Smooth, stretchy fabric lightweight feel", "price" => 45, "category" => "womens clothing",)
    );

    private static $errors = array();

    public static function main()
    {
        //kollar om show och category finns i querystringen och kontrollerar att dess innehåll är godkänt. 
        try {
            if (isset($_GET['show']))
                $show = self::getLimit('show');
        } catch (Exception $error) {
            array_push(self::$errors, array("show" => $error->getMessage()));
        }

        try {
            if (isset($_GET['category']))
                $category = self::getCategory('category');
        } catch (Exception $error) {
            array_push(self::$errors, array("category" => $error->getMessage()));
        }

        //hämta de produkter som användaren efterfrågar
        try {
            if ($category && $show) {
                $filteredProducts = self::filterCategory($category);
                $limitedProducts = self::limitProducts($filteredProducts, $show);
                $products = self::getProducts($limitedProducts);
            } else if ($category) {
                $filteredProducts = self::filterCategory($category);
                $products = self::getProducts($filteredProducts);
            } else if ($show) {
                $limitedProducts = self::limitProducts(self::$allProducts, $show);
                $products = self::getProducts($limitedProducts);
            } else {
                $products = self::getProducts(self::$allProducts);
            }
        } catch (Exception $error) {
            array_push(self::$errors, array("show" => $error->getMessage()));
        }

        //om det finns error skrivs dessa ut, annars skrivs produkterna ut. 
        if (self::$errors) {
            self::renderData(self::$errors);
        } else {
            self::renderData($products);
        }
    }

    /**
     * hämtar kategori från query och kontrollerar att den finns.
     */
    public static function getCategory($var)
    {
        $category = htmlspecialchars($_GET[$var]);
        if (!($category == "jewellery" || $category == "mens clothing" || $category == "womens clothing")) {
            throw new Exception("Category not found");
        }
        return $category;
    }

    /**
     * hämtar limit från query och kontrollerar att det är mellan 1 och 20
     */
    public static function getLimit($var)
    {
        $limit = htmlspecialchars($_GET[$var]);
        if (!($limit > 0 && $limit <= 20)) {
            throw new Exception("Show must be between 1 and 20");
        }
        return $limit;
    }

    /**
     * filtrerar ut produkterna från vald kategori. 
     */
    public static function filterCategory($category)
    {

        $filteredArray = array();
        for ($i = 0; $i < count(self::$allProducts); $i++) {
            if (self::$allProducts[$i]['category'] == $category) {
                array_push($filteredArray, self::$allProducts[$i]);
            }
        }
        return $filteredArray;
    }

    /**
     * slumpar fram valt antal produkter. 
     */
    public static function limitProducts($array, $show)
    {
        $limitedArray = array();
        shuffle($array);
        if ($show > count($array)) {
            $num = count($array);
            throw new Exception("there are only $num products in that category.");
        }
        for ($i = 0; $i < $show; $i++) {
            array_push($limitedArray, $array[$i]);
        }
        return $limitedArray;
    }

    /**
     * skapar produktobjekt med hjälp av Product class. 
     */
    public static function getProducts($array)
    {
        $products = array();
        for ($i = 0; $i < count($array); $i++) {
            $product = new Product($i, $array[$i]['title'], $array[$i]['description'], $array[$i]['price'], $array[$i]['category']);
            array_push($products, $product->toArray());
        }
        return $products;
    }

    /**
     * visar produkterna (eller error) för användaren. 
     */
    public static function renderData($array)
    {
        $json = json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        echo $json;
    }
}
