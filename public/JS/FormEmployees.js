var currentStep = 0;
showStep(currentStep);

function showStep(n) {
    var steps = document.getElementsByClassName("step");
    steps[n].classList.add("active");
    document.getElementById("prevBtn").style.display = n === 0 ? "none" : "inline";
    document.getElementById("nextBtn").innerHTML = n === (steps.length - 1) ? "Submit" : "Siguiente";
    updateProgressBar(n);
}

function nextPrev(n) {
    var steps = document.getElementsByClassName("step");
    if (n === 1 && !validateForm()) return false;
    steps[currentStep].classList.remove("active");
    currentStep += n;
    if (currentStep >= steps.length) {
        document.getElementById("multiStepForm").submit();
        return false;
    }
    showStep(currentStep);
}

function validateForm() {
    var valid = true;
    var inputs = document.getElementsByClassName("step")[currentStep].getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].value === "") {
            inputs[i].className += " is-invalid";
            valid = false;
        } else {
            inputs[i].className = inputs[i].className.replace(" is-invalid", "");
        }
    }
    return valid;
}

function updateProgressBar(n) {
    var progress = (n + 1) * 25;
    document.querySelector(".progress-bar-inner").style.width = progress + "%";
}