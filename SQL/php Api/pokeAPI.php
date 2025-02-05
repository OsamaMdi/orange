<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pokemon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        h1 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #cc0000;
        }
        .results {
            margin-top: 20px;
            width: 80%;
            max-width: 600px;
        }
        .pokemon-card {
            background: #fff;
            padding: 20px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .pokemon-card img {
            width: 100px;
            height: 100px;
        }
        .pokemon-card h3 {
            margin: 10px 0;
            color: #333;
        }
        .pokemon-card p {
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Search Pokémon Name</h1>
    <form method="GET">
        <input type="text" name="pokemon" placeholder="ُEnter The Pokemon Name..." required>
        <input type="submit" value="search">
    </form>

    <?php
    if (isset($_GET['pokemon'])) {
        $pokemonName = strtolower($_GET['pokemon']);
        $apiUrl = "https://pokeapi.co/api/v2/pokemon/$pokemonName";
    
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    
        if ($httpCode == 200) {
            $data = json_decode($response, true);
    
            $name = ucfirst($data['name']);
            $image = $data['sprites']['front_default'];
            $height = $data['height'];
            $weight = $data['weight'];
            $abilities = array_map(function ($ability) {
                return ucfirst($ability['ability']['name']);
            }, $data['abilities']);
    
            echo "<div class='results'>
                    <div class='pokemon-card'>
                        <img src='$image' alt='$name'>
                        <h3>$name</h3>
                        <p><strong>Height:</strong> $height</p>
                        <p><strong>Weight:</strong> $weight</p>
                        <p><strong>Abilities:</strong> " . implode(", ", $abilities) . "</p>
                    </div>
                  </div>";
        } else {
            echo "<p style='color: red;'>The Pokémon '$pokemonName' does not exist! Please try another name.</p>";
        }
    }
    
    ?>
</body>
</html>