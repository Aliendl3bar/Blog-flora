<?php
require_once 'database.php';
require_once 'article.php';

header('Content-Type: application/json');

$search_query = isset($_GET['q']) ? trim($_GET['q']) : '';
$results = [];

if (strlen($search_query) >= 2) {
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "SELECT a.id, a.title, a.image_path, c.category_name
              FROM article a
              JOIN category c ON a.id_category = c.id
              WHERE a.title LIKE :search OR a.content LIKE :search OR c.category_name LIKE :search
              ORDER BY a.date_publication DESC
              LIMIT 5";
    
    $stmt = $db->prepare($query);
    $search_param = '%' . $search_query . '%';
    $stmt->bindParam(':search', $search_param);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode($results);
?>
