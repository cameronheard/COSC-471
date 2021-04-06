/**
 * Retrieves a table of products stored in the database whose name matches the search bar
 *
 * @param {string} product_name The name to search for
 */
function search_products(product_name) {
    var product_view = document.getElementById("products");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState === this.DONE && this.status === 200) {
            product_view.innerHTML = this.responseText;
        }
    };
    request.open("GET", "receivers/search_products.php?name=" + product_name); // Requests a list of products based on the name entered into the search box
    request.send();
}
