@extends('layouts.app', ["current" => "course"])

@section('page-title', __('general.course.title'))

@section('conteudo')

<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">{{ __('general.course.edit') }}</h3>
   </div>
   <form id="register" action="{{ UriHelper::getEdit('course', $config->course->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="card-body">
         <div class="row">
            <div class="form-group col-md-4">
               <label for="name">* {{__('general.name')}}</label>
               <input required type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="{{__('general.name')}}" value="{{$config->course->name}}">
               @if ($errors->has('name'))
                    <span class="error invalid-feedback">{{$errors->first('name')}}</span>
               @endif
            </div>
            <div class="form-group col-md-4">
               <label for="name">* {{__('general.duration')}}</label>
               <input required type="text" class="form-control  {{ $errors->has('duration') ? 'is-invalid' : '' }}" id="duration" name="duration" placeholder="{{__('general.duration')}}" value="{{$config->course->duration}}">
               @if ($errors->has('duration'))
                    <span class="error invalid-feedback">{{$errors->first('duration')}}</span>
               @endif
            </div>
            <div class="form-group col-md-6">
               <label for="description">{{__('general.description')}}</label>
               <input type="text" class="form-control" id="description" name="description" placeholder="{{__('general.description')}}" value="{{$config->course->description}}">
            </div>
         </div>
      <div class="card-footer text-right">
         @component('components.common.forms.form-buttons-input', [
            'resource' => 'course' 
         ])
         @endcomponent
      </div>
   </form>
</div>
 
@endsection