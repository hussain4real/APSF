<div class="switch flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span class="ml-2 mr-2 bg-teal-500/10 text-teal-700 p-2">{{ $locale_name }}</span>
        @else
            <a class="ml-1 underline ml-2 mr-2 p-2" href="language/{{ $available_locale }}">
                <span>{{ $locale_name }}</span>
            </a>
        @endif
    @endforeach
</div>
