<x-home-layout>
    @if(session('error'))
    <div class="custom-card custom-card-danger">
        <div class="custom-card-header">Notice</div>
        <div class="custom-card-body">
            <div class="custom-card-title">{{ session('error') }}</div>
            <a href="{{ route('training-programs.list') }}" class="custom-btn">Try again</a>
        </div>
    </div>
    @endif

    @if(session('success'))
    <div class="custom-card custom-card-success">
        <div class="custom-card-header">Notice</div>
        <div class="custom-card-body">
            <div class="custom-card-title">{{ session('success') }}</div>
            <a href="{{ route('filament.admin.pages.my-profile') }}" class="custom-btn">View Profile</a>
        </div>
    </div>
    @endif

    @if(session()->has('info'))
    <div class="custom-card custom-card-info">
        <div class="custom-card-header">Notice</div>
        <div class="custom-card-body">
            <div class="custom-card-title">{{ session('info') }}</div>
            <address>
                <strong>Contact Information:</strong><br>
                <a href="mailto:info@arab-psf.com">
                    <span>info@arab-psf.com</span>
                </a><br>
                <a href="tel:+96899871199">
                    <span>+968 99871199</span>
                </a>
            </address>
        </div>
    </div>
    @endif
</x-home-layout>

<style>
    .custom-card {
        margin: 2rem auto;
        padding: 1rem;
        border: 1px solid #ddd;
        border-radius: 0.5rem;
        max-width: 30rem;
        width: 100%;
        text-align: center;
    }

    .custom-card-header {
        padding: 0.5rem;
        font-size: 1.25rem;
        font-weight: bold;
        border-bottom: 1px solid #ddd;
    }

    .custom-card-body {
        padding: 1rem;
    }

    .custom-card-title {
        margin-bottom: 1rem;
        word-wrap: break-word;
        overflow-wrap: break-word;
        white-space: normal;
    }

    .custom-btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        border: none;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 0.25rem;
        cursor: pointer;
    }

    .custom-card-danger .custom-card-header {
        background-color: #f8d7da;
        color: #721c24;
    }

    .custom-card-danger .custom-card-title {
        color: #721c24;
    }

    .custom-card-success .custom-card-header {
        background-color: #d4edda;
        color: #155724;
    }

    .custom-card-success .custom-card-title {
        color: #155724;
    }

    .custom-card-info .custom-card-header {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    .custom-card-info .custom-card-title {
        color: #0c5460;
    }

    address {
        font-style: normal;
        margin-top: 1rem;
    }

    address a {
        display: block;
        margin-bottom: 0.5rem;
        color: inherit;
        text-decoration: none;
    }

    address a:hover {
        text-decoration: underline;
    }
</style>