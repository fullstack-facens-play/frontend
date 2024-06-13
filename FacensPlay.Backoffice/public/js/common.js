$(document).on('click', '#confirmButton', function(event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    console.log(href);
    $.ajax({
        url: href
        , beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            $('#confirmModal').modal("show");
            $('#confirmModalBody').html(result).show();
        }
        , complete: function() {
            $('#loader').hide();
        }
        , error: function(jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        }
        , timeout: 8000
    })
});