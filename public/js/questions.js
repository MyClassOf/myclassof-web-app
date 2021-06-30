// start timer for the timeout popup
let timer;

function resetTimer(){
    clearTimeout(timer);
    timer = setTimeout(timeoutPopup, (60000 * 10));
}

// keep track of activity on page
document.onmousemove = resetTimer;
document.onmousedown = resetTimer; // touchscreen presses
document.onclick = resetTimer;
document.onkeypress = resetTimer;

// give the user a chance to stay on the page or leave. If they take too long to answer, it automatically kicks them out.
function timeoutPopup(){
    document.getElementsByClassName("hover_bkgr")[0].classList.remove("hide-element");
    let secondsLeft = 30;
    
    // decrease timer
    let finalTimer = setInterval(function(){
        document.getElementById("timeout-timer").innerHTML = secondsLeft;
        secondsLeft -= 1;
    }, 1000)
    
    // start final timeout
    let finalTimeout = setTimeout(function(){
        document.getElementById('form-complete-status').value = "false";
        submitForm();
    }, 30000);
    
    document.getElementById("yes-button").onclick = function(){
        document.getElementsByClassName("hover_bkgr")[0].classList.add("hide-element");
        clearTimeout(finalTimeout);
        clearInterval(finalTimer);
        resetTimer();
    }
    
    document.getElementById("no-button").onclick = function(){
        document.getElementById('form-complete-status').value = "false";
        submitForm();
    }
}

function submitForm() {
    document.getElementById("regForm").submit();
}

$('.label').click(function () {
    var value = $(this).val();
    var id = $(this).data('quesid');
    if (value == 1) {
        $('.txt-box' + id).show();
    } else {
        $('.txt-box' + id).hide();
    }
});

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
};