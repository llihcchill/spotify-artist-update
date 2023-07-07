function submitButtonCheck() {
    var checkBoxes = document.getElementsByClassName("checkbox-checked-check");
    var submitButtonUpdate = document.getElementById("submitButton");

    var checked = 0;

    for(let i = 0; i < checkBoxes.length; i++) {
        checkBoxes[i].addEventListener("Change", () => {
            if(checkBoxes[i].checked == true) {
                checked++;
            }
        })
    }

    if(checked > 2) {
        submitButtonUpdate.disabled = true;
    }

    if(checked == 2) {
        submitButtonUpdate.disabled = false;
        checked = 0;
    }
}
