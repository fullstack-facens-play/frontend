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