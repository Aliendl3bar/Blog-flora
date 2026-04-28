<?php
require 'database.php';
require 'article.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $status_public = isset($_POST['status_public']) ? (int)$_POST['status_public'] : 0;
    $id_user = isset($_POST['id_user']) ? (int)$_POST['id_user'] : 0;

    // Create and save article first
    $article = new article($title, $content, $status_public, $id_user);
    $article_id = $article->save();

    // Handle image upload after article is saved (using article ID)
    if ($article_id && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../articles/' . $article_id . '/imgs/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $upload_path = $upload_dir . $file_name;
        move_uploaded_file($file_tmp, $upload_path);
        $image_path = 'articles/' . $article_id . '/imgs/' . $file_name;
        $article->updateImagePath($image_path);
    }

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article - Flora Encyclopedia</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="create-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>
<body>
    <div class="doodle-overlay"></div>
    <div class="page-wrapper">
        <header class="main-header">
            <div class="logo-group">
                <svg class="logo-icon" fill="none" viewBox="0 0 48 48">
                    <path d="M24 4C25.7818 14.2173 33.7827 22.2182 44 24C33.7827 25.7818 25.7818 33.7827 24 44C22.2182 33.7827 14.2173 25.7818 4 24C14.2173 22.2182 22.2182 14.2173 24 4Z" fill="currentColor"></path>
                </svg>
                <h2 class="site-title">Flora Encyclopedia</h2>
            </div>
            
            <nav class="desktop-nav">
                <a href="index.php">Articles</a>
                <a href="contact.html">Contact us</a>
                <a href="create.php">Create Article</a>
            </nav>
        </header>

        <main>
            <div class="create-container">
                <h1>Create Article</h1>
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Article Title">
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" placeholder="Article Content"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="status_public">Status</label>
                        <select name="status_public">
                            <option value="1">Public</option>
                            <option value="0">Private</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_user">User ID</label>
                        <input type="number" name="id_user" placeholder="User ID">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Create Article</button>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
