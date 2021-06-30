@extends('layouts.app')

@section('style')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style1.css">
@endsection

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <img src="public/images/grad/graduation-curved.jpg">
            <div class="col-md-12 heading-text">
                <h1>Grad Gift Account</h1>
                <br>
                <p>Want to help your graduate celebrate this big achievement? Check out these great gift ideas you could help put money towards! Regardless of where your graduate is headed after graduation, I'm sure they would be happy to have your support in moving on to their next stage of life!</p>
            </div>
                  <!--   <div class="col-lg-12 col-md-12 col-sm-12">
                  <h2 class="legal-heading">Grad Gift Account</h2>
                  
                  </div> -->
        </div>
    </div>
      
    <!-- Dynamic display for gifts -->
    <div id="gift-options-container"></div>
  
    <!-- Checkout Section -->
    <div class="checkout-block" align="center">
        <h1>Checkout</h1>
        <div>
            Total: $<span id="total-span">0</span>
        </div>
        <div id="mco-disclaimer">Disclaimer: A small fee from your transaction will go to MyClassOf</div>
        <div id="paypal-button-container"></div>
    </div>
@endsection

@section('script')
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
    <!-- PayPal Script-->
    <script src="https://www.paypal.com/sdk/js?client-id=Aa1_AnCKwcB6goEbfUYJ0UyPwt9LkqVmJ2cEcMOokWSw4bxQ5W9o1cMnnr48LeUB5O5DY_ZJTnfjpLJi&currency=USD" data-sdk-integration-source="button-factory"></script>

    <!-- dynamic paypal and item rendering -->
    <script>
    //   grabs every instance of price checkboxes, the divs for total price and gift options display
    let allBoxes = document.getElementsByClassName("check-amount");
    let allGiftItems = document.getElementsByClassName("gift-text");
    let allGiftDescriptions = document.getElementsByClassName("gift-description");
    let totalEl = document.getElementById("total-span");
    let giftContainer = document.getElementById("gift-options-container");
    let dynamicGiftDiv = "";
    let total = 0;
    let storedOtherAmount = 0;
    
    // establish array for dynamically displaying gift options
    let giftObjects = [{price: 35, title: "Office Supplies", img: "public/images/grad/office-supplies.jpg", description: "Pens, pencils, folders, anything your grad needs to be prepared for the workplace or the classroom."}, 
        {price: 50, title: "Week's Worth of Food", img: "public/images/grad/restaurant.jpg", description: "Whether they're grabbing fast food or going to the grocery store, your grad is covered this week!"}, 
        {price: 75, title: "College Sweatshirt", img: "public/images/grad/sweatshirts.jpg", description: "Your grad can celebrate their college colors, or put this toward a new wardrobe."}, 
        {price: 75, title: "Kitchen Appliances", img: "public/images/grad/kitchen-appliances.jpg", description: "Whether it's their first dorm or their first apartment, this money can help your grad deck out their kitchen."}, 
        {price: 100, title: "Cooking Supplies", img: "public/images/grad/pots-and-pans3.jpg", description: "Pots, pans, utensils? Help your grad invest in their ability to cook for friends and family!"}, 
        {price: 125, title: "Books", img: "public/images/grad/textbooks.jpg", description: "Whether it's textbooks, personal reading, or research, help your grad continue to grow in knowledge."}, 
        {price: 125, title: "New Tablet", img: "public/images/grad/tablet.jpg", description: "This gift can go toward helping your grad keep up with the latest technologies."}, 
        {price: 150, title: "New Suit", img: "public/images/grad/suits.jpg", description: "Will your grad be preparing for a class speech, or maybe their first interview? Put money toward helping them look their best!"}, 
        {price: 200, title: "Mini-fridge", img: "public/images/grad/fridge.jpg", description: "Moving into a new dorm or apartment can be intimidating. This money can help your grad make their new place feel like home."}, 
        {price: 250, title: "New Laptop", img: "public/images/grad/laptop.jpg", description: "Help your grad put money toward a new laptop so they can stay connected and ready for their next step!"}]
    
    // loops through each gift object and populates the html with all necessary information
    for(index = 0; index < giftObjects.length; index++) {
        let price = giftObjects[index].price;
        let title = giftObjects[index].title;
        let image = giftObjects[index].img;
        let description = giftObjects[index].description;
        
        // starts new row for the very beginning
        if(index == 0){
            dynamicGiftDiv += `<div class="row">`;
        }
        
        dynamicGiftDiv += `
        <div class="col-sm-4" align="center">
            <label for="amount-${index}" class="card gift-card" style="width: 50%;">
            <img src="${image}" class="gift-image card-img">
                    <div class="gift-text card-img-overlay">
                        <div class="gift-title">${title}</div>
                        <div>$${price}</div> <input type="checkbox" id="amount-${index}" class="check-amount" name="amount-${index}" value="${price}" hidden>
                    </div>
                    <div class="gift-description card-img-overlay">
                        <div>${description}</div>
                    </div>
            </label>
        </div>`;
        
        // ends the row every 3 gifts and starts a new row
        if((index+1)%3 == 0) {
            dynamicGiftDiv += `
            </div>
            <div class="row">`;
        }
        
        // appends the "other amount" field to the end of the list and ends the last row
        if (index == (giftObjects.length-1)) {
            dynamicGiftDiv += `
            <div class="col-sm-4" align="center">
                <label for="other-amount" class="card" style="width: 50%;">
                <img src="public/images/grad/graduates.jpg" class="gift-image card-img">
                    <div class="other-gift-text card-img-overlay">
                        <div class="gift-title">Other Amount</div>
                        <input type="number" id="other-amount-number" name="other-amount-number" style="width: 80%;">
                        <button class="other-amount-btn" onClick="addOtherAmount(document.getElementById('other-amount-number').value)">Include Amount</button>
                        <button class="other-amount-btn" onClick="removeOtherAmount()">Remove Amount</button>
                    </div>
                </label>
            </div>
        </div>`;
        }
        
    }
    
    giftContainer.innerHTML = dynamicGiftDiv;
    
    
    for(let eachBox of allBoxes) {
        eachBox.addEventListener("click", ()=>addAmountToTotal(eachBox.value, eachBox.checked, eachBox.id));
    }
    
    // adds or takes away prices from total
    function addAmountToTotal(amount, checkedStatus, id) {
        let elementId = id.substr(7);
        
        if (checkedStatus) {
            total += parseInt(amount);
            allGiftItems[elementId].classList.add("card-selected");
            allGiftDescriptions[elementId].classList.add("card-selected");
        }
        else {
            total -= parseInt(amount);
            allGiftItems[elementId].classList.remove("card-selected");
            allGiftDescriptions[elementId].classList.remove("card-selected");
        }
        totalEl.innerHTML = total;
    };
    
    function addOtherAmount(amount) {
        total -= parseInt(storedOtherAmount);
        total += parseInt(amount);
        
        storedOtherAmount = amount;
        totalEl.innerHTML = total;
    };
    
    function removeOtherAmount() {
        total -= parseInt(storedOtherAmount);
        
        storedOtherAmount = 0;
        totalEl.innerHTML = total;
    };
    
    // paypal processing
    paypal.Buttons({
      style: {
            shape: 'pill',
            color: 'silver',
            layout: 'vertical',
            label: 'checkout',
          
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }
    }).render('#paypal-button-container');
    </script>
@endsection