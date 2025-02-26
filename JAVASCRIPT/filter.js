function redirectToCategory(category) {
    switch (category) {
        case 'basketball':
            window.location.href = 'basketball.html';
            break;
        case 'football':
            window.location.href = 'football.html';
            break;
        case 'rugby':
            window.location.href = 'rugby.html';
            break;
        case 'volleyball':
            window.location.href = 'volleyball.html';
            break;
        case 'golf':
            window.location.href = 'golf.html';
            break;
        default:
            alert('Invalid category selected');
    }
}

// Apply filters and fetch filtered results
document.getElementById('applyFilters').addEventListener('click', () => {
    // Get filter values
    const brand = document.getElementById('brandFilter').value;
    const price = document.getElementById('priceFilter').value;

    // Send the selected filters to the backend
    fetch(`search.php?brand=${brand}&price=${price}`)
        .then(response => response.json())
        .then(data => {
            // Process and update the products on the page
            updateProductList(data);
        })
        .catch(error => {
            console.error('Error fetching filtered products:', error);
        });
});

// Update product list on the page
function updateProductList(products) {
    const productContainer = document.getElementById('productContainer');
    productContainer.innerHTML = ''; // Clear existing products

    products.forEach(product => {
        // Create product card 
        const productCard = `
            <div class="product-card">
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>Price: $${product.price}</p>
                <button>Add to Cart</button>
            </div>
        `;
        productContainer.innerHTML += productCard;
    });
}

