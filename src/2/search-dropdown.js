// Search dropdown functionality
function setupSearchDropdown(inputId, dropdownId, buttonId = null) {
    const input = document.getElementById(inputId);
    const dropdown = document.getElementById(dropdownId);
    const button = buttonId ? document.getElementById(buttonId) : null;

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

    // Handle button click (for pages with a search button)
    if (button) {
        button.addEventListener('click', (e) => {
            if (input.value.trim()) {
                window.location.href = 'index.php?search=' + encodeURIComponent(input.value);
            }
        });
    }

    // Handle Enter key
    input.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && input.value.trim()) {
            window.location.href = 'index.php?search=' + encodeURIComponent(input.value);
        }
    });
}
