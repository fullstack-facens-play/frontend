{{-- !-- Delete Warning Modal -->  --}}
<form action="{{$config->routeAction}}" method="post">
    <div class="modal-body">
        @csrf
        @method($config->routeMethod)
        <h5 class="text-center">{{ $config->message }}</h5>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{__("general.cancel")}}</button>
        <button type="submit" class="btn btn-primary">{{__("general.confirm")}}</button>
    </div>
</form>

<script>

    $(document).on('click', '#confirmButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                console.log(result);
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
    
</script>