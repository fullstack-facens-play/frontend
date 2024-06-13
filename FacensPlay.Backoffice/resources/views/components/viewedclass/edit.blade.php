@extends('layouts.app', ["current" => "viewedclass"])

@section('page-title', __('general.viewedclass.title'))

@section('conteudo')

<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">{{ __('general.viewedclass.edit') }}</h3>
   </div>
   <form id="register" action="{{ UriHelper::getEdit('viewedclass', $config->viewedClass->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-body">
         <div class="row">
            <div class="form-group col-md-4">
               <label for="is_checked">* {{__('general.is_checked')}}</label>
               <input required type="checkbox" class="form-control  {{ $errors->has('is_checked') ? 'is-invalid' : '' }}" id="is_checked" name="is_checked" {{ $config->viewedClass->is_checked ? 'checked=checked' : ''}}>
               @if ($errors->has('is_checked'))
                    <span class="error invalid-feedback">{{$errors->first('is_checked')}}</span>
               @endif
            </div>
            <div class="form-group col-md-4">
               @component('components.common.forms.select2', [
                  'select2Config' => $config->classRoomSelect2Config,
                  'errors' => $errors
               ])
               @endcomponent
            </div>
            <div class="form-group col-md-4">
               @component('components.common.forms.select2', [
                  'select2Config' => $config->studentSelect2Config,
                  'errors' => $errors
               ])
               @endcomponent
            </div>
         </div>
      </div>
      <div class="card-footer text-right">
         @component('components.common.forms.form-buttons-input', [
            'resource' => 'viewedclass' 
         ])
         @endcomponent
      </div>
   </form>
</div>
 
@endsection