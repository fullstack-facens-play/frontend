@extends('layouts.app', ["current" => "user"])

@section('page-title', __('general.user.title'))

@section('conteudo')

<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">{{ __('general.user.edit') }}</h3>
   </div>
   <form id="register" action="{{ UriHelper::getEdit('user', $config->user->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-body">
         <div class="row">
            <div class="form-group col-md-4">
               <label for="name">* {{__('general.name')}}</label>
               <input required type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="{{__('general.name')}}" value="{{$config->user->name}}">
               @if ($errors->has('name'))
                    <span class="error invalid-feedback">{{$errors->first('name')}}</span>
               @endif
            </div>
            <div class="form-group col-md-4">
               @component('components.common.forms.select2', [
                  'select2Config' => $config->statusSelect2Config,
                  'errors' => $errors
               ])
               @endcomponent
            </div>
            <div class="form-group col-md-4">
               @component('components.common.forms.select2', [
                  'select2Config' => $config->displaySelect2Config,
                  'errors' => $errors
               ])
               @endcomponent
            </div>
         </div>
         <div class="row">
            <div class="form-group col-md-4">
               @component('components.common.forms.select2', [
                  'select2Config' => $config->orderSelect2Config,
                  'errors' => $errors
               ])
               @endcomponent
            </div>
            <div class="form-group col-md-4">
               @component('components.common.forms.datepicker-input', [
                  'inputConfig' => $config->dateStartInputConfig,
                  'errors' => $errors
               ])
               @endcomponent
            </div>
            <div class="form-group col-md-4">
               @component('components.common.forms.datepicker-input', [
                  'inputConfig' => $config->dateEndInputConfig,
                  'errors' => $errors
               ])
               @endcomponent
            </div>
         </div>
         <div class="row">
            <div class="form-group col-md-12">
               <label for="description">{{__('general.description')}}</label>
               <input type="text" class="form-control" id="description" name="description" placeholder="{{__('general.description')}}" value="{{$config->user->description}}">
            </div>
         </div>
      </div>
      <div class="card-footer text-right">
         @component('components.common.forms.form-buttons-input', [
            'resource' => 'user' 
         ])
         @endcomponent
      </div>
   </form>
</div>
 
@endsection