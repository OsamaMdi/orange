<?php 
$phones = [
    [ 
     'name' => 'Samsung Galaxy Note 20 Ultra',
     'img_url' =>'img/note.jpeg',
    'rate' => '5',
    'brand' => 'Samsung',
    'price' => 'JOD 759.00',
    'is_out_of_stock' => '1'
    ],
    [ 
     'name' => 'INFINIX Zero 8',
     'img_url' =>'img\zero8.jpeg',
    'rate' => '0',
    'brand' => 'Infinix',
    'price' => 'JOD 205.00',
    'is_out_of_stock' => '1'
    ],
    [ 
     'name' => 'Apple iPhone 12 Pro',
     'img_url' =>'img\iphone.jpeg',
    'rate' => '0',
    'brand' => 'Apple',
    'price' => 'JOD 973.00',
    'is_out_of_stock' => '1'

    ],
    [ 
     'name' => 'ITEL A48',
     'img_url' =>'img\itel.jpeg',
    'rate' => '0',
    'brand' => 'iTel',
    'price' => 'JOD 66.00'
    ],
    [ 
     'name' => 'Samsung Galaxy S21 Ultra',
     'img_url' =>'img\S21.jpeg',

    'rate' => '0',
    'brand' => 'Samsung',
    'price' => 'JOD 799.00'
    ],
    
    [ 
     'name' => 'Galaxy A52',
     'img_url' =>'img\A52.jpeg',
    'rate' => '0',
    'brand' => 'Samsung',
    'price' => 'JOD 267.00'
    ],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Phone | Orange Jordan E shop</title>
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.1.3/dist/css/orange-helvetica.min.css" rel="stylesheet" integrity="sha384-ARRzqgHDBP0PQzxQoJtvyNn7Q8QQYr0XT+RXUFEPkQqkTB6gi43ZiL035dKWdkZe" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.1.3/dist/css/boosted.min.css" rel="stylesheet" integrity="sha384-Di/KMIVcO9Z2MJO3EsrZebWTNrgJTrzEDwAplhM5XnCFQ1aDhRNWrp6CWvVcn00c" crossorigin="anonymous">

    <style>
        /* حاوية الكروت */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* المسافة بين الكروت */
            justify-content: center; /* محاذاة الكروت في المنتصف */
            margin: 20px;
        }

        /* تصميم الكارد */
        .card {
            width: 320px; /* عرض الكارد تم تكبيره */
            height: 450px; /* إضافة ارتفاع أكبر */
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        /* عند التمرير على الكارد */
        .card:hover {
            transform: translateY(-12px); /* رفع الكارد قليلاً عند التمرير */
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* إضافة تأثير الظل عند التمرير */
        }

        /* الصورة داخل الكارد */
        .card img {
            width: 100%;
            height: 250px; /* زيادة ارتفاع الصورة */
            object-fit: cover;
        }

        /* اسم المنتج */
        .card h3 {
            margin: 10px 0;
            font-size: 20px; /* تكبير الخط */
            color: #333;
            font-weight: bold;
        }

        /* تفاصيل المنتج */
        .card .details {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        /* سعر المنتج */
        .card .price {
            font-size: 18px; /* تكبير السعر */
            color: #e74c3c;
            margin-bottom: 15px;
            font-weight: bold;
        }

        /* إضافة زر إضافة إلى السلة */
        .card .btn {
            background-color: #f39c12;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            margin-top: 15px;
        }

        .card .btn:hover {
            background-color: #e67e22;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://boosted.orange.com/docs/5.1/assets/brand/orange-logo.svg" width="50" height="50" role="img" alt="Boosted" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/boosted@5.1.3/dist/js/boosted.bundle.min.js" integrity="sha384-5thbp4uNEqKgkl5m+rMBhqR+ZCs+3iAaLIghPWAgOv0VKvzGlYKR408MMbmCjmZF" crossorigin="anonymous"></script>

<div class="card-container">
<?php
foreach ($phones as $item) {
    echo "<div class='card'>";
        echo " <img src='" . $item['img_url'] . "' alt='Product Image'>";
        echo "<h3>" . $item['name'] . "</h3>";
        echo "<p class='details'>Brand: " . $item['brand'] . "</p>";
        echo "<p class='details'>Rating: " . $item['rate'] . " stars</p>";
        echo "<p class='price'>" . $item['price'] . "</p>";
        echo "<button class='btn'>Add to Cart</button>";
    echo  "</div>";
}
?>
</div>

</body>
</html>
