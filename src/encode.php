<?php
require 'config.php';
require 'src/classes/UrlShortener.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$url = $data['url'];

$shortener = new UrlShortener();
$shortUrl = $shortener->encode($url);

echo json_encode(['short_url' => $shortUrl]);
?>
