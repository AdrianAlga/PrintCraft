// JavaScript to handle button clicks and update quantity
const quantityInput = document.querySelector(".quantity-input input");
const minusBtn = document.querySelector(".quantity-btn.minus");
const plusBtn = document.querySelector(".quantity-btn2.plus");
const inputAmount = document.querySelector('.amount-input');
const inputAmount2 = document.querySelector('.amount-input2');

minusBtn.addEventListener("click", () => {
  if (parseInt(quantityInput.value) > 1) {
    quantityInput.value = parseInt(quantityInput.value) - 1;
    inputAmount.value = parseInt(quantityInput.value) - 1;
    inputAmount2.value = parseInt(quantityInput.value) - 1;
  }
});

plusBtn.addEventListener("click", () => {
  quantityInput.value = parseInt(quantityInput.value) + 1;
  inputAmount.value = parseInt(quantityInput.value);
  inputAmount2.value = parseInt(quantityInput.value);
});
