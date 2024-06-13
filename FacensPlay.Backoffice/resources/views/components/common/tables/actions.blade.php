@php ( $appUrl = env('APP_URL'))

@php ( $showUrl      = $appUrl . $resource . "/show/"    . $resourceId )
@php ( $editUrl      = $appUrl . $resource . "/edit/"    . $resourceId )
@php ( $deleteUrl    = $appUrl . $resource . "/delete/"  . $resourceId )
@php ( $enableUrl    = $appUrl . $resource . "/enable/"  . $resourceId )
@php ( $disableUrl   = $appUrl . $resource . "/disable/" . $resourceId )
@php ( $copyUrl      = $appUrl . $resource . "/copy/"    . $resourceId )

@php ( $showUrl = isset($customShowUrl) && $customShowUrl['url'] ? $customShowUrl['url'] : $showUrl )
@php ( $customShowUrlTarget = isset($customShowUrl) && $customShowUrl['target'] ? $customShowUrl['target'] : '_self' )

@php ( $cssStyles = "padding-right: 5px; cursor: pointer;"             )

@if (isset($statusId) && $statusId == 2)
    <a href="{{ $enableUrl }}" 
        title="{{__('general.enable')}}"
        style="{{ $cssStyles }}">
        <i class="fa fa-check"></i>
    </a>
@endif

@if (isset($statusId) && $statusId == 1)
    <a href="{{ $disableUrl }}" 
        title="{{__('general.disable')}}" 
        style="{{ $cssStyles }}">
        <i class="fa fa-ban"></i>
    </a>
@endif

<a href="{{ $editUrl }}" 
    title="{{__('general.edit')}}" 
    style="{{ $cssStyles }}">
    <i class="fas fa-edit"></i>
</a>

<a data-toggle="modal" id="confirmButton" 
    data-target="#confirmModal" 
    data-attr="{{$deleteUrl}}"
    style="{{ $cssStyles }}" 
    title="{{__('general.delete')}}">
        <i class="fas fa-trash text-danger"></i>
</a>

<a href="{{ $showUrl }}" 
    title="{{__('general.show')}}" 
    style="{{ $cssStyles }}"
    target="{{ $customShowUrlTarget }}">
    <i class="fas fa-eye"></i>
</a>

@if (isset($preview))
    <a href="{{$preview}}" 
        title="{{__('general.preview')}}" 
        style="{{ $cssStyles }}"
        target="_blank">
        <i class="fas fa-forward"></i>
    </a>
@endif

@if (isset($copy))
    <a href="{{$copyUrl}}" 
        title="{{__('general.copy')}}" 
        style="{{ $cssStyles }}"
        target="_self">
        <i class="fas fa-copy"></i>
    </a>
@endif