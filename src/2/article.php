<?php
class article{
    private $title;  // Changed from tittle to title
    private $content;
    private $status_public;
    private $id_user;
    private $date_publication;
    private $id;
    private $image_path;
    private $id_category;
    
    public function __construct($title, $content, $status_public, $id_user) {
        $this->title = $title;
        $this->content = $content;
        $this->status_public = $status_public;
        $this->id_user = $id_user;
        $this->date_publication = date('Y-m-d H:i:s');  // Auto-set current date
        $this->image_path = '';  // Initialize as empty string
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function setStatus_public($status_public) {
        if ($status_public === 1 || $status_public === 0) {
            $this->status_public = $status_public;
        } else {
            echo "status_public must be a 1 or 0 value";
        }
    }
    public function setId_user($id_user) {
        if (is_numeric($id_user)) {
            $this->id_user = $id_user;
        } else {
            echo "id_user must be a number";
        }
    }
    public function setImage_path($image_path) {
        $this->image_path = $image_path;
    }
    public function setId_category($id_category) {
        $this->id_category = $id_category;
    }

    public function getTitle() {
        return $this->title;
    }
    public function getContent() {
        return $this->content;
    }
    public function getStatus_public() {
        return $this->status_public;
    }
    public function getId_user() {
        return $this->id_user;
    }
    public function getImage_path() {
        return $this->image_path;
    }
    public function getId_category() {
        return $this->id_category;
    }
    public function getDate_publication() {
        return $this->date_publication;
    }

    public function save() {
        $database = new Database();
        $db = $database->getConnection();

        $query = "INSERT INTO article (title, content, status_public, id_user, date_publication, image_path, id_category) 
        VALUES (:title, :content, :status_public, :id_user, :date_publication, :image_path, :id_category)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':status_public', $this->status_public);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':date_publication', $this->date_publication);
        $stmt->bindParam(':image_path', $this->image_path);
        $stmt->bindParam(':id_category', $this->id_category);

        if ($stmt->execute()) {
            $this->id = $db->lastInsertId();
            return $this->id;
        } else {
            return false;
        }
    }

    public function updateImagePath($image_path) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "UPDATE article SET image_path = :image_path WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':image_path', $image_path);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    public function getId() {
        return $this->id;
    }

    // Get latest articles
    public static function getLatest($limit = 3) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM article ORDER BY date_publication DESC LIMIT :limit";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get article by ID
    public static function getById($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM article WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get articles by user
    public static function getByUser($id_user, $limit = 3) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM article WHERE id_user = :id_user ORDER BY date_publication DESC LIMIT :limit";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get articles by category
    public static function getByCategory($id_category, $limit = 3) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM article WHERE id_category = :id_category ORDER BY date_publication DESC LIMIT :limit";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get category name by id_category
    public static function getCategoryName($id_category) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT category_name FROM category WHERE id = :id_category";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['category_name'] : null;
    }
}
?>