let allBoxes = document.getElementsByClassName("check-amount");
let totalEl = document.getElementById("total-span");
let formTotal = document.getElementById("form-total");
let formMcoFee = document.getElementById("form-mco-fee");
let dynamicGiftDiv = "";
let total = 0;
let storedOtherAmount = 0;
    
    
    for(let eachBox of allBoxes) {
        eachBox.addEventListener("click", ()=>addAmountToTotal(eachBox.value, eachBox.checked, eachBox.id));
    }
    
    // adds or takes away prices from total
    function addAmountToTotal(amount, checkedStatus, id) {
        let elementId = id.substr(7);
        console.log(elementId);
        
        if (checkedStatus) {
            total += parseInt(amount);
            document.getElementById(`gift-text-${elementId}`).classList.add("card-selected");
            document.getElementById(`gift-description-${elementId}`).classList.add("card-selected");
        }
        else {
            total -= parseInt(amount);
            document.getElementById(`gift-text-${elementId}`).classList.remove("card-selected");
            document.getElementById(`gift-description-${elementId}`).classList.remove("card-selected");
        }
        totalEl.innerHTML = (total + (total * .015)).toFixed(2);
        formTotal.value = total * 100;
        formMcoFee.value = ((total * .015).toFixed(2)) * 100;
    };
    
    function addOtherAmount(amount) {
        total -= parseInt(storedOtherAmount);
        total += parseInt(amount);
        
        storedOtherAmount = amount;
        totalEl.innerHTML = (total + (total * .015)).toFixed(2);
        formTotal.value = total * 100;
        formMcoFee.value = ((total * .015).toFixed(2)) * 100;
    };
    
    function removeOtherAmount() {
        total -= parseInt(storedOtherAmount);
        
        storedOtherAmount = 0;
        totalEl.innerHTML = (total + (total * .015)).toFixed(2);
        formTotal.value = total * 100;
        formMcoFee.value = ((total * .015).toFixed(2)) * 100;
    };