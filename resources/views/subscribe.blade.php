<x-app-layout>
    <x-paddle-button :checkout="$checkout" class="px-8 py-4 w-full">
        Subscribe
    </x-paddle-button>

    <!-- <?php
        $items = $checkout->getItems();
        $customer = $checkout->getCustomer();
        $custom = $checkout->getCustomData();
        ?>

        <a href='#!' class='paddle_button' data-items='{!! json_encode($items) !!}' @if ($customer) data-customer-id='{{ $customer->paddle_id }}' @endif @if ($custom) data-custom-data='{{ json_encode($custom) }}' @endif @if ($returnUrl=$checkout->getReturnUrl()) data-success-url='{{ $returnUrl }}' @endif
            >
            Buy Product
        </a> -->
</x-app-layout>