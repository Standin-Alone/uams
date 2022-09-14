$.validator.addMethod("NumbersBetween1to2", function (value, element) {
    return this.optional(element) || /^[1-2]$/i.test(value);
}, "Please choose 1 or 2");

$.validator.addMethod("NumbersBetween1to12", function (value, element) {
    return this.optional(element) || /^([1-9]|1[012]|9[9])$/i.test(value);
}, "Please choose 1 to 12 or 99");

$.validator.addMethod("NumbersBetween1to3", function (value, element) {
    return this.optional(element) || /^[1-3]$/i.test(value);
}, "Choose 1 to 3");

$.validator.addMethod("Farmtype", function (value, element) {
    return this.optional(element) || /^[0-3]$/i.test(value);
}, "Please choose 0 to 3");

$.validator.addMethod("Organics", function (value, element) {
    return this.optional(element) || /^[0-2]$/i.test(value);
}, "Please choose 0 to 2");

$.validator.addMethod("NumbersBetween1to4", function (value, element) {
    return this.optional(element) || /^[1-4]$/i.test(value);
}, "Please choose 1 to 4");

$.validator.addMethod("NumbersBetween1to9", function (value, element) {
    return this.optional(element) || /^[1-9]$/i.test(value);
}, "Please choose 1 to 9");

$.validator.addMethod("lettersAndNumbersOnly", function (value, element) {
    return this.optional(element) || /^[a-zA-Z0-9]+$/i.test(value);
}, "Please enter letters and numbers only.");

$.validator.addMethod("lettersOnlyAndSpaces", function (value, element) {
    return this.optional(element) || /^[a-zA-Z\s]*$/i.test(value);
}, "Please enter letters and spaces only.");

$.validator.addMethod("lettersDotDashonly", function (value, element) {
    return this.optional(element) || /^[a-zA-Z-. ]*$/i.test(value);
}, "Enter letter, space, dot & dash only.");

$.validator.addMethod("lettersDashonly", function (value, element) {
    return this.optional(element) || /^[a-zA-Z- ]*$/i.test(value);
}, "Enter letter, space & dash only.");

$.validator.addMethod("Phone", function (value, element) {
    return this.optional(element) || /^(09|\+639)\d{9}$/i.test(value);
}, "Invalid Cellphone Number.");

$.validator.addMethod("NumbersOnly", function (value, element) {
    return this.optional(element) || /^[0-9]{1,45}$/i.test(value);
}, "Please enter numbers only.");

$.validator.addMethod("NumbersOnly", function (value, element) {
    return this.optional(element) || /^[0-9]{1,45}$/i.test(value);
}, "Please enter numbers only.");

// $.validator.addMethod("Gross", function (value, element) {
//     return this.optional(element) || /^[0-9999999]{1,45}$/i.test(value);
// }, "Please enter numbers only.");

$.validator.addMethod("Gross", function (value, element) {
    return this.optional(element) || /^[0-9]+(\.[0-9]{1,2})?$/i.test(value);
}, "Not allowed.");

$.validator.addMethod("notOnlyZero", function (value, element, param) {
    return this.optional(element) || parseInt(value) > 0;
}, "0 is not allowed!");

// $.validator.addMethod("Decimal", function (value, element) {
//     return this.optional(element) || /^(\d{1,5}|\d{0,5}\.\d{1,2})$/i.test(value);
// }, "Please enter numbers only.");

$.validator.addMethod("Decimal", function (value, element) {
    return this.optional(element) || /^\s*(?=.*[1-9])\d*(?:\.\d{1,4})?\s*$/i.test(value);
}, "Above 0 only.");

$.validator.addMethod("DecimalAndZero", function (value, element) {
    return this.optional(element) || /^\s*(?=.*[0-9])\d*(?:\.\d{1,4})?\s*$/i.test(value);
}, "Not allowed.");

$.validator.addMethod("Phone", function (value, element) {
    return this.optional(element) || /^(09|\+639)\d{9}$/i.test(value);
}, "Invalid Cellphone Number.");

$.validator.addMethod("Landline", function (value, element) {
    return this.optional(element) || /^[0-9]{8}$/i.test(value);
}, "Invalid Landline Number.");


$.validator.addMethod("validateDate", function (value, element) {
    return this.optional(element) || /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/.test(value);
}, "Invalid Date Format.");

$.validator.addMethod("validateDOB", function (value, element) {
    //Get the date from the TextBox.
    var dateString = document.getElementById("birthday").value;

        var parts = dateString.split("/");
        var dtDOB = new Date(parts[0] + "/" + parts[1] + "/" + parts[2]);
        var dtCurrent = new Date();
        //lblError.innerHTML = "Eligibility 18 years ONLY."
        if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 18) {
            return false;
        }

        if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 18) {

            //CD: 11/06/2018 and DB: 15/07/2000. Will turned 18 on 15/07/2018.
            if (dtCurrent.getMonth() < dtDOB.getMonth()) {
                return false;
            }
            if (dtCurrent.getMonth() == dtDOB.getMonth()) {
                //CD: 11/06/2018 and DB: 15/06/2000. Will turned 18 on 15/06/2018.
                if (dtCurrent.getDate() < dtDOB.getDate()) {
                    return false;
                }
            }
        }
        //lblError.innerHTML = "";
        return true;
}, "Eligibility 18 years ONLY"); 

$.validator.addMethod("validateDOB_agriyouth", function (value, element) {
    //Get the date from the TextBox.
    var dateString = document.getElementById("birthday").value;

        var parts = dateString.split("/");
        var dtDOB = new Date(parts[0] + "/" + parts[1] + "/" + parts[2]);
        var dtCurrent = new Date();
        //lblError.innerHTML = "Eligibility 18 years ONLY."
        if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 12) {
            return false;
        }

        if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 12) {

            //CD: 11/06/2018 and DB: 15/07/2000. Will turned 18 on 15/07/2018.
            if (dtCurrent.getMonth() < dtDOB.getMonth()) {
                return false;
            }
            if (dtCurrent.getMonth() == dtDOB.getMonth()) {
                //CD: 11/06/2018 and DB: 15/06/2000. Will turned 18 on 15/06/2018.
                if (dtCurrent.getDate() < dtDOB.getDate()) {
                    return false;
                }
            }
        }
        //lblError.innerHTML = "";
        return true;
}, "Eligibility of Agri Youth is 12 years and above"); 