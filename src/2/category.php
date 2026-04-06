<?php
class Category {
    private $id;
    private $category_name;
    
    public function __construct($category_name) {
        $this->category_name = $category_name;
    }

    // Setters
    public function setCategoryName($category_name) {
        $this->category_name = $category_name;
    }

    public function setId($id) {
        if (is_numeric($id)) {
            $this->id = $id;
        } else {
            echo "id must be a number";
        }
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getCategoryName() {
        return $this->category_name;
    }

    // Save new category
    public function save() {
        $database = new Database();
        $db = $database->getConnection();

        $query = "INSERT INTO category (category_name) VALUES (:category_name)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':category_name', $this->category_name);

        if ($stmt->execute()) {
            echo "Category saved successfully.";
            return true;
        } else {
            echo "Error saving category.";
            return false;
        }
    }

    // Get all categories
    public static function getAll() {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM category ORDER BY category_name ASC";
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get category by ID
    public static function getById($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM category WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update category
    public function update($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "UPDATE category SET category_name = :category_name WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':category_name', $this->category_name);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Category updated successfully.";
            return true;
        } else {
            echo "Error updating category.";
            return false;
        }
    }

    // Delete category
    public static function delete($id) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "DELETE FROM category WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Category deleted successfully.";
            return true;
        } else {
            echo "Error deleting category.";
            return false;
        }
    }
}
?>