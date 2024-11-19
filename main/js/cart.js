function updateCounter(row) {
    const quantityElement = row.querySelector('.number');
    const decreaseButton = row.querySelector('.btn#decrease');
    const count = parseInt(quantityElement.textContent);

    quantityElement.textContent = count;

    if (count <= 1) {
        decreaseButton.disabled = true;
        decreaseButton.classList.add('disabled');
    } else {
        decreaseButton.disabled = false;
        decreaseButton.classList.remove('disabled');
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const totalAmountElement = document.querySelector('.total-amount');
    const rows = document.querySelectorAll('.cart-table tbody tr');

    function calculateRowTotal(row) {
        const priceCell = row.querySelector('td:nth-child(2)'); 
        const quantityCell = row.querySelector('.number'); 
        const totalPriceCell = row.querySelector('td:nth-child(4)'); 

        let priceText = priceCell.textContent.replace('P', '').trim().replace(/,/g, '');
        const price = parseFloat(priceText);

        const quantity = parseInt(quantityCell.textContent);

        const totalRowPrice = price * quantity;

        totalPriceCell.textContent = `P ${totalRowPrice.toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    }

    function calculateTotal() {
        let total = 0;

        rows.forEach(row => {
            calculateRowTotal(row); 

            const totalPriceCell = row.querySelector('td:nth-child(4)');
            let totalPriceText = totalPriceCell.textContent.replace('P', '').trim().replace(/,/g, '');
            const rowTotal = parseFloat(totalPriceText);

            total += rowTotal;
        });

        totalAmountElement.textContent = `P ${total.toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    }

    rows.forEach(row => {
        const decreaseBtn = row.querySelector('.btn#decrease');
        const increaseBtn = row.querySelector('.btn#increase');
        const quantityElement = row.querySelector('.number');

        updateCounter(row);

        decreaseBtn.addEventListener('click', function() {
            let currentQuantity = parseInt(quantityElement.textContent);
            if (currentQuantity > 1) {
                quantityElement.textContent = currentQuantity - 1;
                updateCounter(row);
                calculateTotal(); 
            }
        });

        increaseBtn.addEventListener('click', function() {
            let currentQuantity = parseInt(quantityElement.textContent);
            quantityElement.textContent = currentQuantity + 1;
            updateCounter(row);
            calculateTotal(); 
        });
    });

    calculateTotal();
});
