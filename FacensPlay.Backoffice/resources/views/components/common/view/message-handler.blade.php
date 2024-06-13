@php($statusCode = Session::get('status_code'))

@if (isset($statusCode) && $statusCode == HttpStatusCode::$OK)
<div class="alert alert-success" role="alert" id="messageSuccessAlert">
        {{ __('general.message_success') }}
</div>      
@endif

<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
                $('#messageSuccessAlert').delay(3000).fadeOut('slow');
        })
</script>

@php(Session::put("status_code",""))