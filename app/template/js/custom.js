$(document).ready(function() {
    $('#myForm').submit(function(event) {
        event.preventDefault();

        // Get the form data
        var formData = {
            valor1: $('input[name="nome"]').val(),
            valor2: $('input[name="estado"]').val(true),
        };

        // Send an AJAX request
        $.ajax({
            url: 'app/controller/cadastrarSoftware.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(result) {
                // Process the result here
                console.log(result);
            },
            error: function(xhr, status, error) {
                // Handle the error here
                console.error(error);
            }
        });
    });
});