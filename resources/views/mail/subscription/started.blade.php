<x-mail::message>
# Dear {{$subscription->user?->name}},

Thank you for subscribing to the Arab Private Schools Federation.
We are delighted to acknowledge the receipt of your payment and also
welcome you to our vibrant and evolving community.

Your subscription grants you access to a wealth of exclusive resources, as well as networking opportunities with other members and experts in the field of private education.
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
