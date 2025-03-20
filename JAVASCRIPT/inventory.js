document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("sortBy").addEventListener("change", function() {
      let sortValue = this.value;
      let rows = Array.from(document.querySelectorAll("#inventoryTable tr"));
  
      rows.sort((a, b) => {
        let aPrice = parseFloat(a.cells[7].innerText.replace('£', '').trim());
        let bPrice = parseFloat(b.cells[7].innerText.replace('£', '').trim());
        let aQuantity = parseInt(a.cells[5].innerText);
        let bQuantity = parseInt(b.cells[5].innerText);
  
        if (sortValue === "price-low-high") return aPrice - bPrice;
        if (sortValue === "price-high-low") return bPrice - aPrice;
        if (sortValue === "quantity-low-high") return aQuantity - bQuantity;
        if (sortValue === "quantity-high-low") return bQuantity - aQuantity;
      });
  
      const inventoryTable = document.getElementById("inventoryTable");
      inventoryTable.innerHTML = "";
      rows.forEach(row => inventoryTable.appendChild(row));
    });
  
    document.getElementById("selectAll").addEventListener("change", function () {
      document.querySelectorAll(".select-item").forEach(checkbox => {
        checkbox.checked = this.checked;
      });
    });
  
    document.querySelectorAll(".status").forEach(status => {
      if (status.innerText.includes("Low Stock")) {
        status.classList.add("low-stock");
      }
    });
  
    const editModal = document.getElementById("editProductModal");
    const closeEditModal = document.getElementById("closeEditModal");
    const editProductForm = document.getElementById("editProductForm");
  
    let selectedRow = null;
  
    document.querySelectorAll(".edit").forEach(button => {
      button.addEventListener("click", function () {
        selectedRow = this.closest("tr");
  
        let productName = selectedRow.cells[3].innerText;
        let productQuantity = selectedRow.cells[5].innerText;
        let productSizes = selectedRow.cells[6].innerText.split(", "); 
        let productPrice = selectedRow.cells[7].innerText.replace("£", "");
  
        document.getElementById("editProductName").value = productName;
        document.getElementById("editProductQuantity").value = productQuantity;
        document.getElementById("editProductPrice").value = productPrice;
  
        document.querySelectorAll("#sizeCheckboxes input").forEach(checkbox => {
          checkbox.checked = productSizes.includes(checkbox.value);
        });
  
        editModal.style.display = "flex";
      });
    });
  
    closeEditModal.addEventListener("click", function () {
      editModal.style.display = "none";
    });
  
    window.addEventListener("click", function (event) {
      if (event.target === editModal) {
        editModal.style.display = "none";
      }
    });
  
    editProductForm.addEventListener("submit", function (event) {
      event.preventDefault();
  
      let updatedName = document.getElementById("editProductName").value;
      let updatedQuantity = document.getElementById("editProductQuantity").value;
      let updatedPrice = document.getElementById("editProductPrice").value;
  
      let updatedSizes = [];
      document.querySelectorAll("#sizeCheckboxes input:checked").forEach(checkbox => {
        updatedSizes.push(checkbox.value);
      });
  
      if (selectedRow) {
        selectedRow.cells[3].innerText = updatedName;
        selectedRow.cells[5].innerText = updatedQuantity;
        selectedRow.cells[6].innerText = updatedSizes.join(", ");
        selectedRow.cells[7].innerText = "£" + parseFloat(updatedPrice).toFixed(2);
      }
  
      alert("Product Updated Successfully!");
      editModal.style.display = "none";
    });
  });
  