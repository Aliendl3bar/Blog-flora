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
                    <article class="card">
                        <div class="card-img-container">
                            <img src="../../assets/imgs/lily2.jpg" alt="Roses">
                        </div>
                        <div class="card-body">
                            <div class="card-meta">
                                <span class="badge flower">FLOWER</span>
                                <p class="read-time">5 min read</p>
                            </div>
                            <h3>The Majestic Rose: History & Varieties</h3>
                            <p>A deep dive into the fascinating history and thousands of varieties...</p>
                            <a href="#" class="read-link">READ ARTICLE <span class="material-symbols-outlined">arrow_right_alt</span></a>
                        </div>
                    </article>

                    <article class="card">
                        <div class="card-img-container">
                            <img src="../../assets/imgs/lily3.jpg" alt="Orchid">
                        </div>
                        <div class="card-body">
                            <div class="card-meta">
                                <span class="badge rare">RARE</span>
                                <p class="read-time">8 min read</p>
                            </div>
                            <h3>Orchids of the Amazon</h3>
                            <p>Discover the rare, elusive, and breathtakingly beautiful orchids found...</p>
                            <a href="#" class="read-link">READ ARTICLE <span class="material-symbols-outlined">arrow_right_alt</span></a>
                        </div>
                    </article>

                    <article class="card">
                        <div class="card-img-container">
                            <img src="../../assets/imgs/lily.jpg" alt="Succulents">
                        </div>
                        <div class="card-body">
                            <div class="card-meta">
                                <span class="badge care">CARE GUIDE</span>
                                <p class="read-time">4 min read</p>
                            </div>
                            <h3>Succulents Care Guide</h3>
                            <p>Essential tips for keeping your succulents healthy and thriving...</p>
                            <a href="#" class="read-link">READ ARTICLE <span class="material-symbols-outlined">arrow_right_alt</span></a>
                            </div>
                    </article>
                    
                </div>
            </section>
            <section class="category-section">
                <div class="section-header">
                    <h2 class="section-title">Browse by Category</h2>
                </div>
                <div class="category-grid">
                    <a href="#" class="category-card">
                        <span class="material-symbols-outlined">local_florist</span>
                        <h3>Flowers</h3>
                    </a>
                    <a href="#" class="category-card">
                        <span class="material-symbols-outlined">forest</span>
                        <h3>Trees</h3>
                    </a>
                    <a href="#" class="category-card">
                        <span class="material-symbols-outlined">potted_plant</span>
                        <h3>Indoor Plants</h3>
                    </a>
                    <a href="#" class="category-card">
                        <span class="material-symbols-outlined">grass</span>
                        <h3>Wild Herbs</h3>
                    </a>
                    <a href="#" class="category-card">
                        <span class="material-symbols-outlined">nutrition</span>
                        <h3>Edible</h3>
                    </a>
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
                <p class="copyright">© 2023 Flora Encyclopedia.</p>
            </div>
        </footer>
    </div>
</body>
</html>