
$(document).ready(function () {
    $('#txtproductCodeid').removeAttr("disabled");
    $('#txtproductLineid').removeAttr("disabled");

    var hideproductcode = $('#hiddenProductCode');
    if (hideproductcode.val() != null && hideproductcode.val() != '') {
        $("#txtproductCodeid").attr("disabled", true);
        $("#txtproductLineid").attr("disabled", true);
    }
    else {
        $("#txtproductCodeid").removeAttr("disabled");
        $("#txtproductLineid").removeAttr("disabled");
    }

    //remove disabled at save button click
    $("#btnsave").on("click", function () {
        $("#txtproductCodeid").removeAttr("disabled");
        $("#txtproductLineid").removeAttr("disabled");
    });

});

//check only decimal numbers
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;

    return true;
}