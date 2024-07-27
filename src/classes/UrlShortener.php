<?php

class UrlShortener {
    private $pdo;

    public function __construct() {
        $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
    }

    public function encode($url) {
        $shortCode = $this->generateShortCode($url);
        $this->storeUrl($url, $shortCode);
        return BASE_URL . $shortCode;
    }

    public function decode($shortCode) {
        $stmt = $this->pdo->prepare("SELECT original_url FROM urls WHERE short_code = :short_code");
        $stmt->execute(['short_code' => $shortCode]);
        $url = $stmt->fetchColumn();
        return $url ? $url : null;
    }

    private function generateShortCode($url) {
        return substr(hash('sha256', uniqid($url, true)), 0, 6);
    }

    private function storeUrl($url, $shortCode) {
        $stmt = $this->pdo->prepare("INSERT INTO urls (original_url, short_code) VALUES (:original_url, :short_code)");
        $stmt->execute(['original_url' => $url, 'short_code' => $shortCode]);
    }
}

