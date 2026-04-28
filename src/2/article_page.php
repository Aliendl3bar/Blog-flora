<?php
require_once 'database.php';
require_once 'article.php';
require_once 'category.php';

// Get article ID from URL
$article_id = isset($_GET['id']) ? $_GET['id'] : 1;

// Fetch the article
$article = Article::getById($article_id);

if (!$article) {
    echo "Article not found!";
    exit;
}

// Get related articles (same category)
$related = Article::getByCategory($article['id_category'], 3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article['title']; ?> - Flora Encyclopedia</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="article-style.css">
    <link rel="stylesheet" href="search-dropdown.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>
<body>
    <div class="doodle-overlay"></div>

    <div class="page-wrapper">
        <!-- Header (reuse from landing page) -->
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
            
            <div class="header-search-box">
                <span class="material-symbols-outlined search-icon">search</span>
                <div class="search-container">
                    <input type="text" id="article-search-input" placeholder="Search for a plant (e.g., 'Monstera')..." autocomplete="off">
                    <div id="article-search-dropdown" class="search-dropdown"></div>
                </div>
            </div>
            
            <button class="btn-signin">Sign In</button>
        </header>

        <main class="article-container">
            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <a href="index.php">Home</a>
                <span>/</span>
                <a href="#">Articles</a>
                <span>/</span>
                <span><?php echo article::getCategoryName($article['id_category']); ?></span>
            </div>

            <!-- Article Header -->
            <article class="article-main">
                <div class="article-header">
                    <div class="article-meta">
                        <span class="badge-category"><?php echo article::getCategoryName($article['id_category']); ?></span>
                        <span class="article-date"><?php echo date('M d, Y', strtotime($article['date_publication'])); ?></span>
                    </div>
                    <h1 class="article-title"><?php echo $article['title']; ?></h1>
                </div>

                <!-- Featured Image -->
                <div class="article-featured-image">
                    <img src="../../articles/<?php echo $article['id']; ?>/imgs/<?php echo $article['image_path']; ?>.jpg" alt="<?php echo $article['title']; ?>">
                </div>

                <!-- Article Content -->
                <div class="article-content">
                    <p class="article-intro"><?php echo substr($article['content'], 0, 200); ?>...</p>
                    
                    <div class="article-body">
                        <p><?php echo $article['content']; ?></p>
                    </div>

                    <!-- Share Button -->
                    <div class="article-actions">
                        <button class="btn-share">
                            <span class="material-symbols-outlined">share</span>
                            Share Article
                        </button>
                    </div>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="article-sidebar">
                <!-- Author Card -->
                <div class="author-card">
                    <h3>About This Category</h3>
                    <p><?php echo article::getCategoryName($article['id_category']); ?> articles explore the fascinating world of botanical specimens, their characteristics, history, and significance in our world.</p>
                </div>

                <!-- Related Articles -->
                <div class="related-section">
                    <h3>Related Articles</h3>
                    <div class="related-list">
                        <?php 
                        if (!empty($related)) {
                            foreach ($related as $rel) {
                                echo '<a href="article_page.php?id=' . $rel['id'] . '" class="related-item">
                                    <div class="related-img">
                                        <img src="../../articles/' . $rel['id'] . '/imgs/' . $rel['image_path'] . '.jpg" alt="' . $rel['title'] . '">
                                    </div>
                                    <div class="related-info">
                                        <h4>' . $rel['title'] . '</h4>
                                        <p class="related-date">' . date('M d, Y', strtotime($rel['date_publication'])) . '</p>
                                    </div>
                                </a>';
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- Tags -->
                <div class="tags-section">
                    <h3>Tags</h3>
                    <div class="tags">
                        <span class="tag">Flora</span>
                        <span class="tag">Botanical</span>
                        <span class="tag">Nature</span>
                        <span class="tag">Study</span>
                    </div>
                </div>
            </aside>
        </main>

        <!-- Footer (reuse from landing page) -->
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

    <script src="article-script.js"></script>
    <script>
    // Search dropdown functionality
    function setupSearchDropdown(inputId, dropdownId) {
        const input = document.getElementById(inputId);
        const dropdown = document.getElementById(dropdownId);

        input.addEventListener('input', async (e) => {
            const query = e.target.value.trim();
            
            if (query.length < 2) {
                dropdown.classList.remove('active');
                return;
            }

            try {
                const response = await fetch('search-api.php?q=' + encodeURIComponent(query));
                const results = await response.json();

                if (results.length === 0) {
                    dropdown.innerHTML = '<div class="search-no-results">No articles found</div>';
                } else {
                    dropdown.innerHTML = results.map(article => `
                        <a href="article_page.php?id=${article.id}" class="search-result-item">
                            <img src="${article.image_path ? article.image_path : '../../assets/imgs/placeholder.jpg'}" alt="${article.title}" class="search-result-img">
                            <div class="search-result-content">
                                <div class="search-result-title">${article.title}</div>
                                <div class="search-result-category">${article.category_name}</div>
                            </div>
                        </a>
                    `).join('');
                }
                dropdown.classList.add('active');
            } catch (error) {
                console.error('Search error:', error);
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (e.target !== input && !dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });

        // Handle Enter key to navigate to search page
        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && input.value.trim()) {
                window.location.href = 'index.php?search=' + encodeURIComponent(input.value);
            }
        });
    }

    // Initialize search dropdown
    setupSearchDropdown('article-search-input', 'article-search-dropdown');
    </script>
</body>
</html>
