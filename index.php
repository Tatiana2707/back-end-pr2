<?php
$apiKey = "AIzaSyClbHb8EeMwVf5W4A9fwJeUZBBJ7lFhnb4";
$cx = "80a47419d84d546ba";
$search = "google";
if (isset($_GET['search'])){
    $search = $_GET['search'];
}
$url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search}";
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resultJson = curl_exec($ch);
curl_close($ch);
$arr = json_decode($resultJson, true);
//var_dump($resultJson);
//die();
// var_dump($arr);
// die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>My Browser</h1>
<form method="GET" action="/index.php">
    <label for="url">URL:</label>
    <input type="text" id="url" name="url" value="">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
    <h1>Search result</h1>
</ form >
<?php
foreach ($arr['items'] as $item) {
    echo '<b>'.$item['displayLink'] . '</b>' . '<br>';
    echo '<h2>' . "<a href='{$item['title']}'>".$item['title'] . '</a>' . '</h2>' ;
    echo '<p>'.$item['snippet'] . '</p>' . '<br>';
}
?>
</body>
</html>
