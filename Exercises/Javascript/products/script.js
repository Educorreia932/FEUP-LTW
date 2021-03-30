let form = document.querySelector("form");
let total = document.getElementById("total");

form.addEventListener('submit', function (event) {
    event.preventDefault();

    let description = document.getElementsByName("description")[0].value;
    let quantity = document.getElementsByName("quantity")[0].value;

    addProduct(description, quantity);
});

function addProduct(description, quantity) {
    let product = document.createElement("tr");

    product.innerHTML = `<td>${description}</td><td><input value=${quantity}></td><td><input type="button" value="Remove"></td>`;

    let table = document.querySelector("table");

    let quantityField = product.getElementsByTagName("input")[0];
    let quantityValue = parseInt(quantity);

    quantityField.addEventListener("change", function() {
        let newQuantityValue = parseInt(quantityField.value)
        updateTotal(newQuantityValue - quantityValue);

        quantityValue = newQuantityValue;
    });

    let removeButton = product.getElementsByTagName("input")[1];

    removeButton.addEventListener("click",  () => { removeProduct(product) });

    table.appendChild(product);

    quantity = parseInt(quantity);

    updateTotal(quantity);
}

function removeProduct(product) {
    let quantity = parseInt(product.getElementsByTagName("input")[0].value);

    product.remove();

    updateTotal(-quantity);
}

function updateTotal(quantity) {
    total.innerHTML = parseInt(total.innerHTML) + quantity;
}
