<x-mail::message>
# Dear {{$subscription->user?->name}},
<img src="{{$imageUrl}}" alt="membershipCard" class="img-fluid" />
Thank you for subscribing to the Arab Private Schools Federation.
We are delighted to acknowledge the receipt of your payment and also
welcome you to our vibrant and evolving community.

Your membership number with the federation is : **{{$subscription->user->membership_id}}.**

Your subscription grants you access to a wealth of exclusive resources, as well as networking opportunities with other members and experts in the field of private education.

We are committed to providing you with the best services and support and we hope you find great value in your membership with us. If you have any questions or need assistance, please do not hesitate to contact us at **info@arab-psf.com**.

Thank you once again for subscribing. We look forward to your active participation and achieving great things together.

<!-- add image -->

<x-mail::button url="{{$url}}">
View Profile
</x-mail::button>

<x-mail::button url="{{$imageUrl}}">
    download
</x-mail::button>

Best regards,<br>

Dr. Khamis Al Ajmi<br>
Founder<br>
{{ config('app.name') }}
</x-mail::message>
