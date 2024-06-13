<label for="{{$displayMultipleChoicesConfig->inputName}}">{{isset($displayMultipleChoicesConfig->isRequired) && $displayMultipleChoicesConfig->isRequired ? "*" : ""}} {{$displayMultipleChoicesConfig->labelName}}</label>
{{--  <div class="col-sm-9 mt-2">
    @foreach ($displayMultipleChoicesConfig->items as $item)
        <input 
            type="checkbox" 
            name="displays[]" 
            value="{{$item->id}}"
            {{ isset($displayMultipleChoicesConfig->selectedId) && $item->id == $displayMultipleChoicesConfig->selectedId ? "checked=checked" : "" }}> {{ $item->name }}
    @endforeach
</div>  --}}

@foreach ($displayMultipleChoicesConfig->items as $item)
    <div class="form-check">
        <input 
            class="form-check-input" 
            type="checkbox"
            name="displays[]" 
            value="{{$item->id}}" id="flexCheckBox_{{$item->id}}"
            {{ isset($displayMultipleChoicesConfig->selectedId) && $item->id == $displayMultipleChoicesConfig->selectedId ? "checked=checked" : "" }}>
        <label class="form-check-label" for="flexCheckBox_{{$item->id}}">
            {{ $item->name }}
        </label>
    </div>
@endforeach