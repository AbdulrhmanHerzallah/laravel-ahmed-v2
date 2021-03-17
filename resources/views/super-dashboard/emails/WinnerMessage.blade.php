@component('mail::message')


<p style="font-weight: bold;text-align: end">{{$user->name}} : {{__('keywords.user.name')}}</p>
<p style="font-weight: bold;text-align: end">{{$user->email}} : {{__('keywords.email')}}</p>

<br/>
<p style="font-size: 20px;font-weight: bold;text-align: end">{{$message}}</p>
<p style="font-size: 12px;font-weight: bold;text-align: end">{{__('keywords.award.value'). ' : ' . $winner->award_value}}</p>
<br/>

{{__('keywords.thank.you')}},<br>
{{ config('app.name') }}
@endcomponent
