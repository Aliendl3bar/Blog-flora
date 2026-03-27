<?php
class article{
    private $tittle;
    private $content;
    private $status_public;
    private $id_user;
    
    public function construct($tittle, $content, $status_public, $id_user) {
        $this->tittle = $tittle;
        $this->content = $content;
        $this->status_public = $status_public;
        $this->id_user = $id_user;
    }

    public function setTittle($tittle) {
        $this->tittle = $tittle;
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
    public function getTittle() {
        return $this->tittle;
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

    public function save() {
        $database = new Database();
        $db = $database->getConnection();

        $query = "INSERT INTO article (tittle, content, status_public, id_user) VALUES (:tittle, :content, :status_public, :id_user)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':tittle', $this->tittle);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':status_public', $this->status_public);
        $stmt->bindParam(':id_user', $this->id_user);
        // $stmt->execute();  katdobla l if baraka

        if ($stmt->execute()) {
            echo "Article saved successfully.";
        } else {
            echo "Error saving article.";
        }
    }


}