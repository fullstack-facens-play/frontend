<!-- small modal -->
<div class="modal fade" 
     id="importModal" 
     tabindex="-1" 
     role="dialog" 
     aria-labelledby="importModalLabel" 
     aria-hidden="true"
     style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-header">
              <h4 class="modal-title">{{ $config->modalTitle }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
           </div>
           <div class="modal-body" id="importModalBody">
                <form action="{{$config->routeAction}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method($config->routeMethod)
                        <div class="form-group col-md-12" style="cursor: pointer;">
                            @component('components.common.forms.file-upload-input', [
                               'config' => $config->fileUploadInputConfig
                            ])
                            @endcomponent
                            <div style="font-size: small;">
                              <span style="font-size: small;">{{__("general.import.instruction")}}</span>
                            </br>
                              <span>
                                 <a href="{{ UriHelper::getFileModelUrl() }}" target="_blank">
                                    {{__("general.import.file_download")}}
                                 </a>
                              </span>
                            </div>
                         </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__("general.cancel")}}</button>
                        <button type="submit" class="btn btn-primary">{{__("general.confirm")}}</button>
                    </div>
                </form>
           </div>
        </div>
     </div>
</div>