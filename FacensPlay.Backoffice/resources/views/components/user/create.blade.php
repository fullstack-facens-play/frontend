@extends('layouts.app', ["current" => "user"])

@section('page-title', __('general.user.title'))

@section('conteudo')

<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">{{ __('general.user.add') }}</h3>
   </div>
   <form id="register" action="{{ UriHelper::getCreate('user') }}" method="POST">
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
               <label for="name">* {{__('general.email')}}</label>
               <input required type="text" class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="{{__('general.email')}}">
               @if ($errors->has('email'))
                    <span class="error invalid-feedback">{{$errors->first('email')}}</span>
               @endif
            </div>
            <div class="form-group col-md-4">
               <label for="name">* {{__('general.password')}}</label>
               <input required type="password" class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="{{__('general.password')}}">
               @if ($errors->has('password'))
                    <span class="error invalid-feedback">{{$errors->first('password')}}</span>
               @endif
            </div>
            <div class="form-group col-md-4">
               <label for="name">* {{__('general.password')}}</label>
               <input required type="password" class="form-control  {{ $errors->has('repeat_password') ? 'is-invalid' : '' }}" id="repeat_password" name="repeat_password" placeholder="{{__('general.repeat_password')}}">
               @if ($errors->has('repeat_password'))
                    <span class="error invalid-feedback">{{$errors->first('repeat_password')}}</span>
               @endif
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