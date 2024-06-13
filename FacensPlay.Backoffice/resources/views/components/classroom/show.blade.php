@extends('layouts.app', ["current" => "channel"])

@section('page-title', __('general.channel.title'))

@section('conteudo')

<div class="card card-primary">
   <div class="card-header">
      <h3 class="card-title">{{ __('general.channel.details') }}</h3>
   </div>
   <div class="card-body">
        @if (isset($config->channel))

            <p>
                <strong>{{ __('general.channel.id')}}</strong> : {{ $config->channel->id }}
            </p>
        
            <p>
                <strong>{{ __('general.channel.name')}}</strong> : {{ $config->channel->name }}
            </p>

            <p>
                <strong>{{ __('general.status.title')}}</strong> : {{ $config->channel->status->name }}
            </p>

            <p>
                <strong>{{ __('general.display.title')}}</strong> : {{ $config->channel->display->name }}
            </p>
        
            <p>
                <strong>{{ __('general.channel.description')}}</strong> : {{ $config->channel->description }}
            </p>

            <p>
                <strong>{{ __('general.channel.order')}}</strong> : {{ $config->channel->order }}
            </p>

        @endif
   </div>
   <div class="card-footer text-right">
    <a href="{{ env('APP_URL') . 'channel'}}" class="btn btn-primary">{{__("general.goBack")}}</a>
   </div>
</div>
 
@endsection