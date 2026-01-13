<?php

$products = [
    [
        "name" => "T-shirt Premium Bio",
        "description" => "T-shirt en coton biologique de haute qualité. Coupe moderne et confortable, parfait pour un usage quotidien. Disponible en plusieurs coloris. Fabriqué de manière éthique et durable.",
        "category" => "Vêtements",
        "price" => 35.99,
        "discount" => 0,
        "stock" => 45,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=T-shirt",
        "size" => ["S", "M", "L", "XL"],
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
    ],
    [
        "name" => "Sneakers Urban",
        "description" => "T-shirt classique Nike avec logo Swoosh",
        "category" => "Chaussures",
        "price" => 99.99,
        "stock" => 3,
        "discount" => 20,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Sneakers",
        "size" => ["S", "M", "L", "XL"],
        "reviews" => [
            [
                "author" => "Lucas",
                "rating" => 4,
                "comment" => "Léger et confortable"
            ],
            [
                "author" => "Emma",
                "rating" => 5,
                "comment" => "Parfait pour courir"
            ]
        ]
    ],

    [
        "name" => "Casquette Vintage",
        "description" => "Casquette Nike classique avec logo brodé",
        "category" => "Accessoires",
        "price" => 24.99,
        "discount" => 0,
        "stock" => 28,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Casquette",
        "size" => ["One Size"],
        "reviews" => [
            [
                "author" => "Nina",
                "rating" => 5,
                "comment" => "Très doux et bien coupé"
            ]
        ]
    ],

    [
        "name" => "Jean Slim Stretch",
        "description" => "Short léger Nike Dri-FIT pour sport et entraînement",
        "category" => "Vêtements",
        "price" => 79.99,
        "discount" => 30,
        "stock" => 20,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Jean",
        "size" => ["S", "M", "L", "XL"],
        "reviews" => [
            [
                "author" => "Maxime",
                "rating" => 4,
                "comment" => "Bon amorti"
            ],
            [
                "author" => "Sarah",
                "rating" => 5,
                "comment" => "Très confortables"
            ]
        ],
    ],
    [
        "name" => "Sac à dos Urbain",
        "description" => "Sac à dos d’entraînement Nike Brasilia, spacieux et durable",
        "category" => "Accessoires",
        "price" => 59.99,
        "discount" => 0,
        "stock" => 12,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Sac",
        "size" => ["One Size"],
        "reviews" => [
            [
                "author" => "Yanis",
                "rating" => 5,
                "comment" => "Très agréable à porter"
            ]
        ]
    ],

    [
        "name" => "Montre Classic",
        "description" => "Sweat confort Nike avec capuche, idéal pour l’extérieur",
        "category" => "Accessoires",
        "price" => 89.99,
        "discount" => 0,
        "stock" => 0,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Montre",
        "size" => ["S", "M", "L", "XL"],
        "reviews" => []
    ],

    [
        "name" => "Pull Col Roulé",
        "description" => "Sweat confort Nike avec capuche, idéal pour l’extérieur",
        "category" => "Vêtements",
        "price" => 49.99,
        "discount" => 0,
        "stock" => 15,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Pull",
        "size" => ["S", "M", "L", "XL"],
        "reviews" => []
    ],

    [
        "name" => "Ceinture Cuir",
        "description" => "Sweat confort Nike avec capuche, idéal pour l’extérieur",
        "category" => "Accessoires",
        "price" => 34.99,
        "discount" => 0,
        "stock" => 0,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Ceinture",
        "size" => ["S", "M", "L", "XL"],
        "reviews" => []
    ],
    [
        "name" => "Sweat à capuche éco-responsable",
        "description" => "Sweat-shirt chaud et doux fabriqué en coton recyclé. Idéal pour l'hiver et les soirées fraîches.",
        "category" => "Vêtements",
        "price" => 59.90,
        "discount" => 10,
        "stock" => 30,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Sweat",
        "size" => ["S", "M", "L", "XL"],
        "reviews" => [
            ["author" => "Marie", "rating" => 5, "comment" => "Très confortable et bien chaud"],
            ["author" => "Lucas", "rating" => 4, "comment" => "Bonne qualité, taille correctement"]
        ]
    ],
    [
        "name" => "Jean Slim Stretch",
        "description" => "Jean slim en denim stretch offrant un excellent confort au quotidien.",
        "category" => "Vêtements",
        "price" => 69.99,
        "discount" => 0,
        "stock" => 50,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Jean",
        "size" => ["38", "40", "42", "44"],
        "reviews" => [
            ["author" => "Thomas", "rating" => 4, "comment" => "Bonne coupe"],
            ["author" => "Nina", "rating" => 5, "comment" => "Très agréable à porter"]
        ]
    ],
    [
        "name" => "Baskets Urbaines",
        "description" => "Baskets modernes et légères, parfaites pour la ville.",
        "category" => "Chaussures",
        "price" => 89.99,
        "discount" => 15,
        "stock" => 25,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Baskets",
        "size" => ["39", "40", "41", "42", "43"],
        "reviews" => [
            ["author" => "Kevin", "rating" => 5, "comment" => "Très stylées"],
            ["author" => "Laura", "rating" => 4, "comment" => "Confortables mais un peu rigides au début"]
        ]
    ],
    [
        "name" => "Montre Minimaliste",
        "description" => "Montre élégante avec bracelet en cuir véritable.",
        "category" => "Accessoires",
        "price" => 129.00,
        "discount" => 0,
        "stock" => 15,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Montre",
        "size" => [],
        "reviews" => [
            ["author" => "Julien", "rating" => 5, "comment" => "Design très classe"]
        ]
    ],
    [
        "name" => "Sac à dos voyage",
        "description" => "Sac à dos résistant avec compartiment ordinateur et grande capacité.",
        "category" => "Accessoires",
        "price" => 79.90,
        "discount" => 5,
        "stock" => 40,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Sac",
        "size" => [],
        "reviews" => [
            ["author" => "Emma", "rating" => 5, "comment" => "Parfait pour les voyages"],
            ["author" => "Hugo", "rating" => 4, "comment" => "Solide et pratique"]
        ]
    ],
    [
        "name" => "Casquette ajustable",
        "description" => "Casquette classique avec réglage arrière.",
        "category" => "Accessoires",
        "price" => 19.99,
        "discount" => 0,
        "stock" => 60,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Casquette",
        "size" => ["Unique"],
        "reviews" => [
            ["author" => "Samir", "rating" => 4, "comment" => "Bon rapport qualité/prix"]
        ]
    ],
    [
        "name" => "Veste imperméable",
        "description" => "Veste légère et imperméable idéale pour la mi-saison.",
        "category" => "Vêtements",
        "price" => 99.99,
        "discount" => 20,
        "stock" => 20,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Veste",
        "size" => ["M", "L", "XL"],
        "reviews" => [
            ["author" => "Paul", "rating" => 5, "comment" => "Protège très bien de la pluie"]
        ]
    ],
    [
        "name" => "Pull en laine mérinos",
        "description" => "Pull chaud et respirant en laine mérinos naturelle.",
        "category" => "Vêtements",
        "price" => 84.50,
        "discount" => 0,
        "stock" => 18,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Pull",
        "size" => ["S", "M", "L"],
        "reviews" => [
            ["author" => "Claire", "rating" => 5, "comment" => "Très doux"]
        ]
    ],
    [
        "name" => "Ceinture en cuir",
        "description" => "Ceinture en cuir véritable fabriquée artisanalement.",
        "category" => "Accessoires",
        "price" => 29.90,
        "discount" => 0,
        "stock" => 35,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Ceinture",
        "size" => ["90", "100", "110"],
        "reviews" => [
            ["author" => "Romain", "rating" => 4, "comment" => "Solide et élégante"]
        ]
    ],
    [
        "name" => "Short de sport",
        "description" => "Short respirant conçu pour l'entraînement et le running.",
        "category" => "Sport",
        "price" => 24.99,
        "discount" => 0,
        "stock" => 70,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Short",
        "size" => ["S", "M", "L", "XL"],
        "reviews" => [
            ["author" => "Adrien", "rating" => 5, "comment" => "Très léger"]
        ]
    ],
    [
        "name" => "Tapis de yoga",
        "description" => "Tapis antidérapant parfait pour le yoga et le pilates.",
        "category" => "Sport",
        "price" => 39.90,
        "discount" => 10,
        "stock" => 22,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Yoga",
        "size" => [],
        "reviews" => [
            ["author" => "Sophie", "rating" => 5, "comment" => "Très confortable"]
        ]
    ],
    [
        "name" => "Lunettes de soleil polarisées",
        "description" => "Protection UV400 avec verres polarisés.",
        "category" => "Accessoires",
        "price" => 49.90,
        "discount" => 0,
        "stock" => 28,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Lunettes",
        "size" => ["Unique"],
        "reviews" => [
            ["author" => "Maxime", "rating" => 4, "comment" => "Bonne protection"]
        ]
    ],
    [
        "name" => "Bonnet en laine",
        "description" => "Bonnet chaud pour l'hiver, tricoté en laine.",
        "category" => "Accessoires",
        "price" => 18.90,
        "discount" => 0,
        "stock" => 55,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Bonnet",
        "size" => ["Unique"],
        "reviews" => [
            ["author" => "Léo", "rating" => 5, "comment" => "Très chaud"]
        ]
    ],
    [
        "name" => "Chemise en lin",
        "description" => "Chemise légère et respirante pour l'été.",
        "category" => "Vêtements",
        "price" => 54.90,
        "discount" => 0,
        "stock" => 33,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Chemise",
        "size" => ["M", "L", "XL"],
        "reviews" => [
            ["author" => "Antoine", "rating" => 4, "comment" => "Très agréable"]
        ]
    ],
    [
        "name" => "Pantalon chino",
        "description" => "Pantalon chino élégant et confortable.",
        "category" => "Vêtements",
        "price" => 64.90,
        "discount" => 5,
        "stock" => 27,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Chino",
        "size" => ["38", "40", "42", "44"],
        "reviews" => [
            ["author" => "Vincent", "rating" => 5, "comment" => "Très bonne coupe"]
        ]
    ],
    [
        "name" => "Gourde inox",
        "description" => "Gourde isotherme en acier inoxydable.",
        "category" => "Lifestyle",
        "price" => 22.90,
        "discount" => 0,
        "stock" => 80,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Gourde",
        "size" => [],
        "reviews" => [
            ["author" => "Julie", "rating" => 5, "comment" => "Garde l'eau fraîche longtemps"]
        ]
    ],
    [
        "name" => "Polo classique",
        "description" => "Polo intemporel en coton piqué.",
        "category" => "Vêtements",
        "price" => 39.90,
        "discount" => 0,
        "stock" => 42,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Polo",
        "size" => ["S", "M", "L", "XL"],
        "reviews" => [
            ["author" => "Olivier", "rating" => 4, "comment" => "Bonne qualité"]
        ]
    ],
    [
        "name" => "Claquettes confort",
        "description" => "Claquettes légères idéales pour l'été.",
        "category" => "Chaussures",
        "price" => 19.90,
        "discount" => 0,
        "stock" => 65,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Claquettes",
        "size" => ["40", "41", "42", "43"],
        "reviews" => [
            ["author" => "Mehdi", "rating" => 4, "comment" => "Confortables"]
        ]
    ],
    [
        "name" => "Echarpe en coton",
        "description" => "Écharpe légère pour la mi-saison.",
        "category" => "Accessoires",
        "price" => 21.50,
        "discount" => 0,
        "stock" => 48,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Echarpe",
        "size" => ["Unique"],
        "reviews" => [
            ["author" => "Anaïs", "rating" => 5, "comment" => "Très douce"]
        ]
    ],
    [
        "name" => "Veste en jean",
        "description" => "Veste en jean intemporelle avec coupe droite et finitions soignées.",
        "category" => "Vêtements",
        "price" => 74.90,
        "discount" => 0,
        "stock" => 26,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Veste+Jean",
        "size" => ["S", "M", "L", "XL"],
        "reviews" => [
            ["author" => "Damien", "rating" => 5, "comment" => "Très stylée et bien coupée"],
            ["author" => "Élodie", "rating" => 4, "comment" => "Bonne qualité du denim"]
        ]
    ],
    [
        "name" => "T-shirt sport respirant",
        "description" => "T-shirt technique à séchage rapide conçu pour les activités sportives.",
        "category" => "Sport",
        "price" => 29.90,
        "discount" => 0,
        "stock" => 58,
        "new" => true,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=T-shirt+Sport",
        "size" => ["S", "M", "L", "XL"],
        "reviews" => [
            ["author" => "Yanis", "rating" => 5, "comment" => "Parfait pour le running"],
            ["author" => "Nora", "rating" => 4, "comment" => "Respirant et léger"]
        ]
    ],
    [
        "name" => "Pochette ordinateur 15 pouces",
        "description" => "Pochette de protection rembourrée pour ordinateur portable jusqu'à 15 pouces.",
        "category" => "High-tech",
        "price" => 27.90,
        "discount" => 0,
        "stock" => 34,
        "new" => false,
        "images" => "https://via.placeholder.com/300x300/e2e8f0/64748b?text=Pochette+PC",
        "size" => ["15\""],
        "reviews" => [
            ["author" => "Baptiste", "rating" => 5, "comment" => "Protège très bien l'ordinateur"],
            ["author" => "Sarah", "rating" => 4, "comment" => "Simple et efficace"]
        ]
    ]

];
