// Sorting functionality
document.getElementById("sortBy").addEventListener("change", function() {
    let sortValue = this.value;
    let rows = Array.from(document.querySelectorAll("#inventoryTable tr"));

    rows.sort((a, b) => {
        let aValue = parseFloat(a.cells[6].innerText.replace('£', '').trim()); // Price
        let bValue = parseFloat(b.cells[6].innerText.replace('£', '').trim());
        let aQuantity = parseInt(a.cells[5].innerText); // Quantity
        let bQuantity = parseInt(b.cells[5].innerText);

        if (sortValue === "price-low-high") return aValue - bValue;
        if (sortValue === "price-high-low") return bValue - aValue;
        if (sortValue === "quantity-low-high") return aQuantity - bQuantity;
        if (sortValue === "quantity-high-low") return bQuantity - aQuantity;
    });

    document.getElementById("inventoryTable").innerHTML = "";
    rows.forEach(row => document.getElementById("inventoryTable").appendChild(row));
});

// Select All Checkbox
document.getElementById("selectAll").addEventListener("change", function () {
    document.querySelectorAll(".select-item").forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".status").forEach(status => {
        if (status.innerText.includes("Low Stock")) {
            status.classList.add("low-stock");
        }
    });
});
