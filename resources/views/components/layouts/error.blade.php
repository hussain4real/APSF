<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('filament-panels::layout.direction') ?? 'ltr' }}" @class([ 'fi min-h-screen' , 'dark'=> filament()->hasDarkModeForced(),
])
>

<head>

    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    @if ($favicon = filament()->getFavicon())
    <link rel="icon" href="{{ $favicon }}" />
    @endif

    <title>
        {{ filled($title = strip_tags(($livewire ?? null)?->getTitle() ?? '')) ? "{$title} - " : null }}
        {{ filament()->getBrandName() }}
    </title>


    <style>
        [x-cloak=''],
        [x-cloak='x-cloak'],
        [x-cloak='1'] {
            display: none !important;
        }

        @media (max-width: 1023px) {
            [x-cloak='-lg'] {
                display: none !important;
            }
        }

        @media (min-width: 1024px) {
            [x-cloak='lg'] {
                display: none !important;
            }
        }
    </style>

    @filamentStyles

    {{ filament()->getTheme()->getHtml() }}
    {{ filament()->getFontHtml() }}

    <style>
        :root {
            --font-family: '{!! filament()->getFontFamily() !!}';

            --sidebar-width: {
                    {
                    filament()->getSidebarWidth()
                }
            }

            ;

            --collapsed-sidebar-width: {
                    {
                    filament()->getCollapsedSidebarWidth()
                }
            }

            ;
        }
    </style>

    @stack('styles')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const activeSidebarItem = document.querySelector(
                    '.fi-sidebar-item-active',
                )

                if (!activeSidebarItem) {
                    return
                }

                const sidebarWrapper =
                    document.querySelector('.fi-sidebar-nav')

                if (!sidebarWrapper) {
                    return
                }

                sidebarWrapper.scrollTo(
                    0,
                    activeSidebarItem.offsetTop - window.innerHeight / 2,
                )
            }, 0)
        })
    </script>

    @if (! filament()->hasDarkMode())
    <script>
        localStorage.setItem('theme', 'light')
    </script>
    @elseif (filament()->hasDarkModeForced())
    <script>
        localStorage.setItem('theme', 'dark')
    </script>
    @else
    <script>
       

        if (
            theme === 'dark' ||
            (theme === 'system' &&
                window.matchMedia('(prefers-color-scheme: dark)')
                .matches)
        ) {
            document.documentElement.classList.add('dark')
        }
    </script>
    @endif

</head>

<body {{ $attributes
            ->merge(($livewire ?? null)?->getExtraBodyAttributes() ?? [], escape: false)
            ->class([
                'fi-body',
                'fi-panel-' . filament()->getId(),
                'min-h-screen bg-gray-50 font-normal text-gray-950 antialiased dark:bg-gray-950 dark:text-white',
            ]) }}>

    {{ $slot }}

    @livewire(Filament\Livewire\Notifications::class)

    @filamentScripts(withCore: true)

   
    @stack('scripts')
</body>

</html>