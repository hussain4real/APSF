@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Arab Private Schools Federation')
<img src="{{asset('assets/imgs/apsf/logo/apsflogo_271x69.webp')}}" class="logo" alt="APSF Logo">
{{--<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">--}}
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
