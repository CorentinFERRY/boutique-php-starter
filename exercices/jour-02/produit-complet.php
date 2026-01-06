<?php 

$product = 
    [
        "name" => "Casquette",
        "description" => "Habbit de tête avec visière pour se protéger du soleil",
        "price" => 29.99,
        "stock" => 3,
        "images" => ["https://static.nike.com/a/images/t_web_pdp_535_v2/f_auto/bb35906a-3643-4577-95d7-0650a0618e8a/U+NK+DF+CLUB+CAP+U+CB+MTSWSH+L.png","https://static.nike.com/a/images/t_web_pdp_535_v2/f_auto/46c954f9-289e-4706-894b-16cdc2b3c1dc/U+NK+DF+CLUB+CAP+U+CB+MTSWSH+L.png","https://static.nike.com/a/images/t_web_pdp_535_v2/f_auto/8c9a1630-557c-46f7-898b-112a362ea332/U+NK+DF+CLUB+CAP+U+CB+MTSWSH+L.png"],
        "size" => ["S","M","L","XL"],
        "reviews" => 
        [
            [
                "author" => "Alex Curtaud", 
                "rating" => 5, 
                "comment" => "Parfaite pour les randonnées en montagne et au soleil"
            ],
            [
                "author" => "Corentin Ferry", 
                "rating" => 3, 
                "comment" => "Petit défaut de fabrication dans la fermeture à l'arrière mais très bon produit ! "
            ],
            [
                "author" => "Ali", 
                "rating" => 5, 
                "comment" => "RAS"
            ],
        ]
    ];


echo '<img src="'.$product["images"][1].'" width=150><br>';     // image de ma casquette
echo count($product["size"]).'<br>';                            // 4
echo $product["reviews"][0]["rating"];                          // 5

