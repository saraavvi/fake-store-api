<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Referrer-Policy: no-referrer");
header("Content-Type: application/json; charset=UTF-8");

$products = array(
    array("id" => 1, "title" => "cool pants", "description" => "very soft and comfy", "image" => "https://picsum.photos/500?random=1", "price" => 109.95, "category" => " mens clothing"),
    array("id" => 2, "title" => "long dress", "description" => "pretty very pretty", "image" => "https://picsum.photos/500?random=2", "price" => 11, "category" => "womens clothing",),
    array("id" => 3, "title" => "18K gold plated necklace", "description" => "Elegance meets simplicity with the 18k gold-plated Memory necklace, a classic thin Singapore chain that is twisted and sparkly. The necklace looks perfect on its own or when layered with other necklaces. Talk about versatile styling.", "image" => "https://picsum.photos/500?random=3", "price" => 110, "category" => "jewellery",),
    array("id" => 4, "title" => "green diamond ring", "description" => "Add something unique to your jewellery box with the 18k gold-plated Green Diamond ring. Featuring a breathtaking green cubic zirconia stone, this ring will easily dress up your chic street style or add some glam to your classic outfits.", "image" => "https://picsum.photos/500?random=4", "price" => 100, "category" => "jewellery",),
    array("id" => 5, "title" => "Mens Cotton Jacket", "description" => "great outerwear jackets for Spring/Autumn/Winter, suitable for many occasions, such as working, hiking, camping, mountain/rock climbing, cycling, traveling or other outdoors. Good gift choice for you or your family member.", "image" => "https://picsum.photos/500?random=5", "price" => 40, "category" => "mens clothing",),
    array("id" => 6, "title" => "Pierced Owl Gold Plated", "description" => "Rose Gold Plated Double Flared Tunnel Plug Earrings. Made of 316L Stainless Steel", "image" => "https://picsum.photos/500?random=6", "price" => 56, "category" => "jewellery",),
    array("id" => 7, "title" => "John Hardy Chain Bracelet", "description" => "From our Legends Collection, the Naga was inspired by the mythical water dragon that protects the ocean\\'s pearl.", "image" => "https://picsum.photos/500?random=7", "price" => 54, "category" => "jewellery",),
    array("id" => 8, "title" => "Fjällraven Backpack", "description" => "Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday", "image" => "https://picsum.photos/500?random=8", "price" => 105, "category" => "mens clothing",),
    array("id" => 9, "title" => "sleeve linen midi dress in mustard", "description" => "Lightweight cotton soft, strong and breathable", "image" => "https://picsum.photos/500?random=9", "price" => 32, "category" => "womens clothing",),
    array("id" => 10, "title" => "block heeled sandals in beige", "description" => "Lining: 100% Textile, Sole: 100% Other Materials, Upper: 100% Textile.", "image" => "https://picsum.photos/500?random=10", "price" => 98, "category" => "womens clothing",),
    array("id" => 11, "title" => "high rise 'original' mom jeans in black", "description" => "Non-stretch denim these jeans use 50% less water during washing, ageing and finishing compared with conventional jeans", "image" => "https://picsum.photos/500?random=11", "price" => 55, "category" => "womens clothing",),
    array("id" => 12, "title" => "Mens Casual Slim Fit", "description" => "The color could be slightly different between on the screen and in practice. / Please note that body builds vary by person, therefore, detailed size information should be reviewed below on the product description.", "image" => "https://picsum.photos/500?random=12", "price" => 43, "category" => "mens clothing",),
    array("id" => 13, "title" => "White Gold Plated Princess", "description" => "Classic Created Wedding Engagement Solitaire Diamond Promise Ring for Her. Gifts to spoil your love more for Engagement, Wedding, Anniversary, Valentine\\'s Day...", "image" => "https://picsum.photos/500?random=13", "price" => 102, "category" => "jewellery",),
    array("id" => 14, "title" => "3-in-1 Snowboard Jacket", "description" => "Note: The Jackets is US standard size, Please choose size as your usual wear Material=> 100% Polyester; Detachable Liner Fabric=> Warm Fleece. Detachable Functional Liner=> Skin Friendly, Lightweigt and Warm.Stand Collar Liner jacket, keep you warm in cold weather.", "image" => "https://picsum.photos/500?random=14", "price" => 100, "category" => "womens clothing",),
    array("id" => 15, "title" => "Longline Belted Jacket in Khaki", "description" => "Soft twill semi-structured fabric with a parallel-rib pattern", "image" => "https://picsum.photos/500?random=15", "price" => 77, "category" => "womens clothing",),
    array("id" => 16, "title" => "pack of 8 mixed colourful rings in plastic", "description" => "Avoid contact with liquids", "image" => "https://picsum.photos/500?random=16", "price" => 20, "category" => "jewellery",),
    array("id" => 17, "title" => "loafers in baroque print with snaffle", "description" => "your go-to for all the latest trends, no matter who you are, where you’re from and what you’re up to", "image" => "https://picsum.photos/500?random=17", "price" => 67, "category" => "mens clothing",),
    array("id" => 18, "title" => "printed logo t-shirt in green and white", "description" => "Super-soft Nike Breathe fabric helps maintain a constant flow of air to keep you cool", "image" => "https://picsum.photos/500?random=18", "price" => 50, "category" => "mens clothing",),
    array("id" => 19, "title" => "exclusive shirt and trouser pyjama set", "description" => "Glossy, satin-style fabric silky-smooth and drapey", "image" => "https://picsum.photos/500?random=19", "price" => 89, "category" => "womens clothing",),
    array("id" => 20, "title" => "performance legging shorts in dress blue", "description" => "Smooth, stretchy fabric lightweight feel", "image" => "https://picsum.photos/500?random=20", "price" => 45, "category" => "womens clothing",)
);

$json = json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

echo $json;
