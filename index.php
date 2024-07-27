<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if ($path === '/encode') {
        require './src/encode.php';
    } elseif ($path === '/decode') {
        require './src/decode.php';
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Not Found']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}
?>
