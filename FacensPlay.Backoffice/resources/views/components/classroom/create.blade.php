@extends('layouts.app', ["current" => "classroom"])

@section('page-title', __('general.classroom.title'))

@section('conteudo')

<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">{{ __('general.classroom.add') }}</h3>
   </div>
   <form id="register" action="{{ UriHelper::getCreate('classroom') }}" method="POST">
      @csrf
      <div class="card-body">
         <div class="row">
            <div class="form-group col-md-4">
               <label for="name">* {{__('general.name')}}</label>
               <input required type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="{{__('general.name')}}">
               @if ($errors->has('name'))
                    <span class="error invalid-feedback">{{$errors->first('name')}}</span>
               @endif
            </div>
            <div class="form-group col-md-4">
               <label for="duration">* {{__('general.duration')}}</label>
               <input required type="text" class="form-control  {{ $errors->has('duration') ? 'is-invalid' : '' }}" id="duration" name="duration" placeholder="{{__('general.duration')}}">
               @if ($errors->has('duration'))
                    <span class="error invalid-feedback">{{$errors->first('duration')}}</span>
               @endif
            </div>
            <div class="form-group col-md-4">
               @component('components.common.forms.select2', [
                  'select2Config' => $config->courseSelect2Config,
                  'errors' => $errors
               ])
               @endcomponent
            </div>
            <div class="form-group col-md-4">
               <label for="video_src">* {{__('general.video_src')}}</label>
               <input required type="text" class="form-control  {{ $errors->has('video_src') ? 'is-invalid' : '' }}" id="video_src" name="video_src" placeholder="{{__('general.video_src')}}">
               @if ($errors->has('video_src'))
                    <span class="error invalid-feedback">{{$errors->first('video_src')}}</span>
               @endif
            </div>
         </div>
         <div class="row">
            <div class="form-group col-md-6">
               <label for="description">{{__('general.description')}}</label>
               <input type="text" class="form-control" id="description" name="description" placeholder="{{__('general.description')}}">
            </div>
         </div>
      </div>
      <div class="card-footer text-right">
         @component('components.common.forms.form-buttons-input', [
            'resource' => 'classroom' 
         ])
         @endcomponent
      </div>
   </form>
</div>
 
@endsection