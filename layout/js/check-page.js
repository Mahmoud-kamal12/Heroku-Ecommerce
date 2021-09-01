var value = $(":radio:checked").val()

$(document).ready(function(){
    $('#form-check').change(function(){
        selected_value = $("input[name='payment']:checked").val();

        if (selected_value.toUpperCase()  === 'paypal'.toUpperCase()) {

            $('#form-check').attr('action', 'controllers/PayPal/paypal.php')

        }else if(selected_value.toUpperCase()  === ('delivery'.toUpperCase()) ){

            $('#form-check').attr('action', 'controllers/add-order-controller.php');

        }
    });
});