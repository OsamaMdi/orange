<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube</title>
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
        .video {
            background: #fff;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .video img {
            width: 100%;
            max-width: 200px;
            border-radius: 4px;
        }
        .video h3 {
            margin: 10px 0;
            color: #333;
        }
        .video p {
            color: #666;
        }
    </style>
</head>
<body>
    <h1>YouTube</h1>
    <form method="GET">
        <input type="text" name="query" placeholder="Enter The Video Name" required>
        <input type="submit" value="search">
    </form>

    <?php
    if (isset($_GET['query'])) {
        $apiKey = 'AIzaSyDpAIz2tWgJ5VtE_oAq4WjfQVH_BXB9RWM  '; 
        $query = urlencode($_GET['query']);
        $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$query&type=video&maxResults=5&key=$apiKey";

        
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (!empty($data['items'])) {
            echo '<div class="results">';
            foreach ($data['items'] as $item) {
                $videoId = $item['id']['videoId'];
                $title = $item['snippet']['title'];
                $description = $item['snippet']['description'];
                $thumbnail = $item['snippet']['thumbnails']['default']['url'];
                echo "<div class='video'>
                        <img src='$thumbnail' alt='$title'>
                        <h3>$title</h3>
                        <p>$description</p>
                        <a href='https://www.youtube.com/watch?v=$videoId' target='_blank'>Display Video</a>
                      </div>";
            }
            echo '</div>';
        } else {
            echo '<p>No Rusolte</p>';
        }
    }
    ?>
</body>
</html>