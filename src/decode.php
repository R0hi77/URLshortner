<?php
require 'config.php';
require 'src/classes/UrlShortener.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$shortCode = $data['short_code'];

$shortener = new UrlShortener();
$originalUrl = $shortener->decode($shortCode);

echo json_encode(['original_url' => $originalUrl]);
?>
