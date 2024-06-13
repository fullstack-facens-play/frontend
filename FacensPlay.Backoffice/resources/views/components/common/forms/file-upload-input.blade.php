@php
    use App\Domain\Enums\MediaType;
    $isCopy = $isCopy ?? false;
@endphp

<label for="{{ $config->inputName }}">{{$config->isRequired ? "*" : ""}}{{ $config->labelName }}</label>
<div class="input-group">
   <div class="custom-file">
      @if($isCopy)
      <input 
         type="hidden" 
         id="hid_copy_{{ $config->inputId }}" 
         name="hid_copy_{{ $config->inputName }}" 
         value="true"
         {{ $config->isRequired ? "required" : "" }}
      >
      @endif

      <input 
         type="hidden" 
         id="hid_{{ $config->inputId }}" 
         name="hid_{{ $config->inputName }}" 
         value="{{ $config->value }}"
         {{ $config->isRequired ? "required" : "" }}
      >
      <input type="file" class="custom-file-input" id="{{ $config->inputId }}" name="{{ $config->inputName }}">
      <label class="custom-file-label" for="exampleInputFile">{{__('general.choose-file')}}</label>
   </div>
   <div class="input-group-append">
      @if (isset($config->value))
         {{--  <span class="input-group-text">{{__('general.view')}}</span>  --}}
         <button type="button" class="input-group-text" data-toggle="modal" data-target=".bd-{{ $config->inputId }}-modal-lg">{{__('general.view')}}</button>
      @endif
      {{--  <span class="input-group-text">{{__('general.reset')}}</span>  --}}
   </div>
</div>

@if (isset($config->value))

   <div class="modal fade bd-{{ $config->inputId }}-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">{{ $config->labelName }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body" id="confirmModalBody">
            @if ($config->mediaType == MediaType::$image)
               <figure class="figure">
                  <img src="{{ $config->filePath }}" alt="" class="figure-img img-fluid rounded" width="">
               </figure>
            @endif

            @if ($config->mediaType == MediaType::$video)
               <video controls style="width: 100%;">
                  <source src="{{ $config->filePath }}" type="video/mp4">
               </video>
            @endif
         </div>
      </div>
      </div>
   </div>

 @endif