<label for="{{$inputConfig->inputId}}">{{$inputConfig->isRequired ? "*" : ""}} {{$inputConfig->labelName}}</label>
<div class="input-group date" id="{{$inputConfig->inputId}}" data-target-input="nearest">
    <input 
        type="text" 
        {{$inputConfig->isRequired ? "required" : ""}} 
        class="form-control {{$inputConfig->datePickerClassName}}" 
        data-target="#{{$inputConfig->inputId}}" 
        name="{{$inputConfig->inputName}}"
        id="{{$inputConfig->inputId}}"
        value="{{ isset($inputConfig->value) ? $inputConfig->value : "" }}"
    >
    <div class="input-group-append" data-target="#{{$inputConfig->inputId}}" data-toggle="datetimepicker">
        <div class="input-group-text">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>
@if ($errors->has($inputConfig->inputName))
    <span class="error invalid-feedback">{{$errors->first($inputConfig->inputName)}}</span>
@endif