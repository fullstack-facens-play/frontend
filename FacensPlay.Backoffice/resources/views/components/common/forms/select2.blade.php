@php($isMultiple        = isset($select2Config->isMultiple) && $select2Config->isMultiple)
@php($isArraySelectedId = isset($select2Config->selectedId) && $select2Config->selectedId instanceof Illuminate\Support\Collection)


<label for="{{$select2Config->inputName}}">{{isset($select2Config->isRequired) && $select2Config->isRequired ? "*" : ""}} {{$select2Config->labelName}}</label>
<select class="form-control {{ $errors->has($select2Config->inputName) ? 'is-invalid' : '' }}" 
        name="{{$select2Config->inputName}}{{$isMultiple ? "[]" : ""}}" 
        id="{{$select2Config->inputId}}"
        {{ isset($select2Config->isRequired) && $select2Config->isRequired ? "required" : "" }}
        {{ $isMultiple ? "multiple" : "" }}>

        @if (isset($select2Config->isMultiple) && $select2Config->isMultiple == false)
            <option value="" selected=selected>{{__('general.select')}}</option>
        @endif
    @foreach ($select2Config->items as $item)
        <option value="{{$item->id}}"
            
            @if(!$isArraySelectedId)
                {{ isset($select2Config->selectedId) && $item->id == $select2Config->selectedId ? "selected=selected" : "" }}                
            @else
                {{ in_array($item->id, $select2Config->selectedId->toArray()) ? "selected=selected" : ""}}
            @endif   
            >
            {{ $item->name }}
        </option>
    @endforeach
</select>
@if ($errors->has($select2Config->inputName))
    <span class="error invalid-feedback">{{$errors->first($select2Config->inputName)}}</span>
@endif