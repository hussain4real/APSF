<x-mail::message>
# Hello Dr. Yousuf,

We have a new member who has joined the Arab Private Schools Federation. Please find the details below:

**Name:** {{$user->first_name}} {{$user->last_name}}<br>
**Email:** {{$user->email}}<br>
**Phone:** {{$user->phone}}<br>
**Profile:** {{$user->profile_type}}<br>

Please welcome them to the community and ensure they have access to all the necessary resources and support.

<x-mail::button :url="$url">
Dashboard
</x-mail::button>

Best regards,<br>

Dr. Khamis Al Ajmi<br>

Founder<br>

{{ config('app.name') }}
</x-mail::message>
