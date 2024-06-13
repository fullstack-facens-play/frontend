{{--  <div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Upload File</h5>
                </div>

                <div class="card-body">
                    <div id="upload-container" class="text-center">
                        <button id="browseFile" class="btn btn-primary">Brows File</button>
                    </div>
                    <div  style="display: none" class="progress mt-3" style="height: 25px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                    </div>
                </div>

                <div class="card-footer p-4" style="display: none">
                    <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video>
                </div>
            </div>
        </div>
    </div>
</div>

==  --}}

@php
    use App\Domain\Enums\MediaType;
@endphp

<label for="{{ $config->inputName }}">{{$config->isRequired ? "*" : ""}}{{ $config->labelName }}</label>
<div class="input-group">
   <div class="custom-file">
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
<div class="card-body">
    <div style="display: none" class="progress mt-3" style="height: 25px">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
    </div>
    <div class="card-footer p-4" style="display: none">
        <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video>
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

<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {

        let browseFile = $('.custom-file-input');
            let resumable = new Resumable({
                target: '{{ $config->uploadUri }}',
                query:{_token:'{{ csrf_token() }}'} ,// CSRF token
                fileType: ['mp4'],
                chunkSize: {{ $config->chunkSize }}, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
                headers: {
                    'Accept' : 'application/json'
                },
                testChunks: false,
                throttleProgressCallbacks: 1,
            });

            resumable.assignBrowse(browseFile[0]);

            resumable.on('fileAdded', function (file) { // trigger when file picked
                showProgress();
                resumable.upload() // to actually start uploading.
                $('.btn').attr('disabled',true);
                
            });

            resumable.on('fileProgress', function (file) { // trigger when file progress update
                updateProgress(Math.floor(file.progress() * 100));
            });

            resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
                response = JSON.parse(response)
                $('#videoPreview').attr('src', response.path);
                $('.card-footer').show();
                $('#hid_{{ $config->inputId }}').val(response.fullPath);
                $('.btn').removeAttr('disabled');
            });

            resumable.on('fileError', function (file, response) { // trigger when there is any error
                alert('file uploading error.')
            });

            let progress = $('.progress');
            function showProgress() {
                progress.find('.progress-bar').css('width', '0%');
                progress.find('.progress-bar').html('0%');
                progress.find('.progress-bar').removeClass('bg-success');
                progress.show();
            }

            function updateProgress(value) {
                progress.find('.progress-bar').css('width', `${value}%`)
                progress.find('.progress-bar').html(`${value}%`)
            }

            function hideProgress() {
                progress.hide();
            }

       function uploadHandlerV1() {
            let browseFile = $('#browseFile');
            let resumable = new Resumable({
                target: '{{ $config->uploadUri }}',
                query:{_token:'{{ csrf_token() }}'} ,// CSRF token
                fileType: ['mp4'],
                chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
                headers: {
                    'Accept' : 'application/json'
                },
                testChunks: false,
                throttleProgressCallbacks: 1,
            });

            resumable.assignBrowse(browseFile[0]);

            resumable.on('fileAdded', function (file) { // trigger when file picked
                showProgress();
                resumable.upload() // to actually start uploading.
            });

            resumable.on('fileProgress', function (file) { // trigger when file progress update
                updateProgress(Math.floor(file.progress() * 100));
            });

            resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
                response = JSON.parse(response)
                $('#videoPreview').attr('src', response.path);
                $('.card-footer').show();
            });

            resumable.on('fileError', function (file, response) { // trigger when there is any error
                alert('file uploading error.')
            });

            let progress = $('.progress');
            function showProgress() {
                progress.find('.progress-bar').css('width', '0%');
                progress.find('.progress-bar').html('0%');
                progress.find('.progress-bar').removeClass('bg-success');
                progress.show();
            }

            function updateProgress(value) {
                progress.find('.progress-bar').css('width', `${value}%`)
                progress.find('.progress-bar').html(`${value}%`)
            }

            function hideProgress() {
                progress.hide();
            }
       }

      }, false);
</script>