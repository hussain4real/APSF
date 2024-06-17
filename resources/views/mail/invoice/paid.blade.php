<x-mail::message>
# Hi {{$transaction->user?->name}}

We are pleased to inform you that your payment for invoice *{{$transaction->transaction_id}}* has been successfully processed.

**Payment Details:**
- **Invoice Number:** `{{$transaction->transaction_id}}`
- **Amount Paid:** USD {{$transaction->amount}}

- **Date of Payment:** {{$transaction->orderDate()}}

**Subscription Details:**
- **Plan Name:** {{$transaction->user?->profile_type}} Subscription
- **Duration:** {{$transaction->subscription?->type}}
- **Start Date:** {{$transaction->subscription?->created_at->format('d M, Y')}}
- **End Date:** {{$transaction->subscription?->ends_at->format('d M, Y')}}

Thank you for your subscription. We are thrilled to have you on board and hope you enjoy our services. If you have any questions or need assistance, please do not hesitate to contact our support team.

**Contact Information:**
- **Email:** info@arab-psf.com
- **Phone:** +968 99871199
<x-mail::button url="{{$url}}">
    Visit Your Profile
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>