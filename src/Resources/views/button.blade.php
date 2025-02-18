@php
    $btnClasses = config('socialite-links.btn_classes');
    $config = config('socialite-links.providers.' . $provider);
@endphp

@if($config)
    <a target="_blank" href="{{ filled($url) ? $url : $config['url'] }}" class="btn-social {{ $btnClasses??'' }}">
        <img src="{{asset('/vendor/socialite-links/images/'.$provider.'.svg')}}" alt="{{$provider}}">
    </a>
@endif
