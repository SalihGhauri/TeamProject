<script>
let currentDiscountIndex = 0;

function showDiscountCard(index) {
    const discountCards = document.querySelectorAll('.discount-card');

    // Hide all cards and display only the selected one with fade effect
    discountCards.forEach((card, i) => {
        if (i === index) {
            card.classList.add('active');  // Show the selected card
        } else {
            card.classList.remove('active');  // Hide others
        }
    });
}

function nextDiscountCard() {
    const discountCards = document.querySelectorAll('.discount-card');
    currentDiscountIndex = (currentDiscountIndex + 1) % discountCards.length; // Loop back to the start
    showDiscountCard(currentDiscountIndex);
}

function prevDiscountCard() {
    const discountCards = document.querySelectorAll('.discount-card');
    currentDiscountIndex = (currentDiscountIndex - 1 + discountCards.length) % discountCards.length; // Loop back to the end
    showDiscountCard(currentDiscountIndex);
}

// Initial display of the first discount card
showDiscountCard(currentDiscountIndex);

</script>