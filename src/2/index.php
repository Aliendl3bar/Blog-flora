<?php
require_once 'database.php';
require_once 'article.php';
require_once 'category.php';

$database = new Database();
$db = $database->getConnection();
$limit = 3;

$query = "SELECT a.*, c.category_name 
            FROM article a
            JOIN category c ON a.id_category = c.id
            ORDER BY date_publication DESC LIMIT :limit";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flora Encyclopedia</title>
    <link rel="stylesheet" href="style.css">
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
                <a href="#">Articles</a>
                <a href="#">Glossary</a>
                <a href="#">About Us</a>
                <a href="#">Contribute</a>
                <button class="btn-signin">Sign In</button>
            </nav>

        </header>

        <main class="content-container">
            <section class="hero">
                <div class="hero-text">
                    <h1 class="hero-title italic">Discover the World of <span class="gradient-text">Flora</span></h1>
                    <p class="hero-description">Explore our comprehensive collection of detailed articles on flowers, plants, and trees from around the globe. Curated by botanists, designed for you.</p>
                    
                    <div class="search-box">
                        <span class="material-symbols-outlined search-icon">search</span>
                        <input type="text" placeholder="Search for a plant (e.g., 'Monstera')...">
                        <button class="btn-explore">Explore</button>
                    </div>
                    <p class="popular-text">Popular: <a href="#">Orchids</a>, <a href="#">Succulents</a>, <a href="#">Roses</a></p>
                </div>

                <div class="hero-image-wrapper">
                    <div class="photo-frame">
                        <img src="../../assets/imgs/lily6.jpg" alt="Lily">
                    </div>
                </div>
            </section>

            <section class="articles-section">
                <div class="section-header">
                    <h2 class="section-title">Featured Articles</h2>
                    <a href="#" class="view-all">View all <span class="material-symbols-outlined">arrow_forward</span></a>
                </div>

                <div class="article-grid">
                    <?php foreach ($articles as $article){
                        echo '<article class="card">
                        <div class="card-img-container">
                            <img src="../../articles/'.$article['id'].'/imgs/' . $article['image_path'] . '.jpg" alt="Roses">
                        </div>
                        <div class="card-body">
                            <div class="card-meta">
                                <span class="badge flower">' . $article['category_name'] . '</span>
                                <p class="read-time">'.$article['date_publication'].'</p>
                            </div>
                            <h3>' . $article['title'] . '</h3>
                            <p>' . $article['content'] . '</p>
                            <a href="article_page.php" class="read-link">READ ARTICLE <span class="material-symbols-outlined">arrow_right_alt</span></a>
                        </div>
                    </article>';
                    } 
                        
                        ?>
                </div>
            </section>
            <section class="category-section">
                <div class="section-header">
                    <h2 class="section-title">Browse by Category</h2>
                </div>
                <div class="category-grid">
                    <?php
                    $categories = Category::getAll();
                    foreach ($categories as $category) {
                        echo '<a href="#" class="category-card">
                                <span class="material-symbols-outlined">'. $category['category_icon'] .'</span>
                                <h3>' . $category['category_name'] . '</h3>
                            </a>';
                    }
                    ?>
                </div>
            </section>
        </main>

        <footer class="main-footer">
            <div class="footer-content">
                <div class="footer-logo">
                    <svg class="logo-icon mini" fill="none" viewBox="0 0 48 48"><path d="M24 4C25.7818 14.2173 33.7827 22.2182 44 24C33.7827 25.7818 25.7818 33.7827 24 44C22.2182 33.7827 14.2173 25.7818 4 24C14.2173 22.2182 22.2182 14.2173 24 4Z" fill="currentColor"></path></svg>
                    <span>Flora Encyclopedia</span>
                </div>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Contact</a>
                </div>
                <p class="copyright">© 2026 Flora Encyclopedia.</p>
            </div>
        </footer>
    </div>
</body>
</html>
