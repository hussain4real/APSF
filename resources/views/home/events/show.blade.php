
<x-home-layout>

    <main class="main-container">
        <!--add a back button or arrow-->
        <a href="{{ route('events.index') }}" class="back-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="back-button-icon" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M10.707 4.293a1 1 0 0 1 1.414 1.414L8.414 10l3.707 3.707a1 1 0 1 1-1.414 1.414l-4-4a1 1 0 0 1 0-1.414l4-4z"
                      clip-rule="evenodd"/>
            </svg>
            <span class="back-button-text">{{__('nav.back')}}</span>
        </a>
        <div class="content-container">
            <article class="article-container">
                <header class="article-header">
                    <h1 class="article-title">{{$event->event_title}}</h1>
                    <address class="article-address">
                        <div class="author-info">
                            <div>
                                <p class="author-date"><time pubdate datetime="{{$event->event_date}}" title="{{$event->event_date}}">{{$event->event_date}}</time></p>
                            </div>
                        </div>
                    </address>
                </header>
                <p class="lead-text">{{$event->event_excerpt}}</p>
                @forelse($videos as $video)
                    <div class="video-container">
                        <video class="video-element" controls autoplay muted loop>
                            <source src="{{ $video->getUrl() }}" type="{{ $video->mime_type }}">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @empty
                    <div class="empty-image-container">
                        @if($firstImage)
                            <img src="{{$firstImage->getUrl()}}" alt="">
                        @else
                            <img src="{{asset('assets/imgs/apsf/news-updates/news-1.webp')}}" alt="">
                        @endif
                    </div>
                @endforelse
                <p class="description-text">{{$event->event_description}}</p>

                <!-- Image Carousel -->
                <div class="slider">
                    @if($images)
                    @foreach($images as $index => $image)
                        <img
                            id="img-{{ $index + 1 }}"
                            src="{{ $image->getUrl() }}"
                            alt="Image {{ $index + 1 }}"
                            class=""
{{--                            style="{{ $index == 0 ? 'opacity: 1;' : 'opacity: 0;' }}"--}}
                        />
                    @endforeach
                    @endif
                </div>
                <div class="navigation-button">
                    @foreach($images as $index => $image)
                        <span class="dot {{ $index == 0 ? 'active' : '' }}" onclick="changeSlide({{ $index }})"></span>
                    @endforeach
                </div>

{{--                <section class="discussion-section">--}}
{{--                    <div class="discussion-header">--}}
{{--                        <h2 class="discussion-title">Discussion (20)</h2>--}}
{{--                    </div>--}}
{{--                    <form class="comment-form">--}}
{{--                        <div class="comment-input-container">--}}
{{--                            <label for="comment" class="sr-only">Your comment</label>--}}
{{--                            <textarea id="comment" rows="6" class="comment-textarea" placeholder="Write a comment..." required></textarea>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="comment-button">Post comment</button>--}}
{{--                    </form>--}}
{{--                </section>--}}
            </article>
        </div>
    </main>

</x-home-layout>
<style>

    .main-container {
        margin-top: 3.5rem;
        padding-top: 2rem;
        padding-bottom: 4rem;
        background-color: #ffffff;
    }
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        margin: 1rem 4rem;
        color: #4d1506;
        text-decoration: none;
        border-radius: 0.375rem;
        background-color: rgba(3, 55, 51, 0.8);
        transition: all 0.3s ease;
    }
    .back-button-icon {
        width: 1.5rem;
        height: 1.5rem;
        fill: #d22912;
    }
    .back-button-text {
        font-size: 1.2rem;
        font-weight: 700;
        color: #d22912;
    }

    @media (min-width: 1024px) {
        .main-container {
            padding-top: 4rem;
            padding-bottom: 6rem;
        }
    }

    .content-container {
        display: flex;
        justify-content: space-between;
        padding-left: 1rem;
        padding-right: 1rem;
        max-width: 1200px;
        margin: auto;
    }

    .article-container {
        width: 100%;
        max-width: 700px;
        margin: auto;
    }

    @media (min-width: 1024px) {
        .article-container {
            max-width: 1200px;
        }
    }

    .article-header {
        margin: 1rem;
    }

    @media (min-width: 1024px) {
        .article-header {
            margin: 1.5rem;
        }
    }

    .article-address {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .author-info {
        display: inline-flex;
        align-items: center;
        gap: 1rem;
        margin-right: 0.75rem;
        color: #1a202c;
    }

    .author-img {
        width: 4rem;
        height: 4rem;
        border-radius: 9999px;
    }
    .empty-image-container{
        width: 100%;

    }

    .empty-image-container img{
        width: 100%;
        height: 35rem;
        object-fit: cover;
        border-radius: 1rem;

    }

    .author-name {
        font-size: 1.25rem;
        font-weight: bold;
        color: #1a202c;
    }

    .author-title, .author-date {
        font-size: 1rem;
        color: #6b7280;
    }

    .article-title {
        margin-bottom: 2rem;
        font-size: 1.875rem;
        font-weight: 800;
        line-height: 1.25;
        color: #1a202c;
    }

    @media (min-width: 1024px) {
        .article-title {
            margin-bottom: 1.5rem;
            font-size: 2.25rem;
        }
    }

    .lead-text {
        margin-top: 0.5rem;
        margin-bottom: 2rem;
        font-size: 1.4rem;
        line-height: 1.75rem;
        color: #1a202c;
    }

    .video-container {
        width: 100%;
        display: flex;
        z-index: 50;
    }

    .video-element {
        width: 100%;
        height: 35rem;
        object-fit: cover;
        border-radius: 0.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 50;
    }

    .image-caption {
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        text-align: center;
        color: #1a202c;
    }

    .description-text {
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-size: 1.125rem;
        line-height: 1.75rem;
        color: #1a202c;
    }

    @media (min-width: 1024px) {
        .description-text {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }
    }
/*carousel image*/
    .slider {
        width: 100%;
        height: auto;
        position: relative;
        margin-bottom: 4rem;
        overflow: hidden;
    }

    .slider::before {
        content: "";
        display: block;
        padding-top: 56.25%; /* 16:9 Aspect Ratio (e.g., 9 / 16 = 0.5625 or 56.25%) */
    }

    .slider img {
        width: 100%;
        height: 100%;
        position: absolute;
        object-fit: contain;
        object-position: center center;
        top: 0;
        left: 0;
        transition: all 0.5s ease-in-out;
    }

    .slider img:first-child {
        z-index: 1;
    }

    .slider img:nth-child(2) {
        z-index: 0;
    }

    .navigation-button {
        text-align: center;
        position: relative;
    }

    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }

    .discussion-section {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .discussion-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .discussion-title {
        font-size: 1.125rem;
        font-weight: bold;
        color: #1a202c;
    }

    @media (min-width: 1024px) {
        .discussion-title {
            font-size: 1.25rem;
        }
    }

    .comment-form {
        margin-bottom: 1.5rem;
    }

    .comment-input-container {
        padding: 0.5rem;
        background-color: #ffffff;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }

    .comment-textarea {
        width: 100%;
        padding: 0.5rem;
        font-size: 1rem;
        color: #1a202c;
        border: none;
        outline: none;
        background-color: #ffffff;
        resize: none;
    }

    .comment-textarea::placeholder {
        color: #9ca3af;
    }

    .comment-button {
        display: inline-flex;
        align-items: center;
        padding: 0.625rem 1rem;
        font-size: 0.75rem;
        font-weight: normal;
        color: #ffffff;
        background-color: #1d4ed8;
        border-radius: 0.5rem;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s;
    }

    .comment-button:hover {
        background-color: #1e40af;
    }

    @media only screen and (max-width: 768px) {
        .video-container video{
            height: 50vh;
        }
    }
</style>


<script>


    // $(document).ready(function() {
    //     console.log('dom ready for implementation');
    //     $('.carousel').carousel('cycle');
    // });

    document.addEventListener('DOMContentLoaded', function() {

        // carousel section start

        var currentImg = 0;
        var imgs = document.querySelectorAll('.slider img');
        let dots = document.querySelectorAll('.dot');
        var interval = 3000;


        var timer = setInterval(changeSlide, interval);
        function changeSlide(n) {
            for (var i = 0; i < imgs.length; i++) { // reset
                imgs[i].style.opacity = 0;
                dots[i].className = dots[i].className.replace(' active', '');
            }

            currentImg = (currentImg + 1) % imgs.length; // update the index number

            if (n != undefined) {
                clearInterval(timer);
                timer = setInterval(changeSlide, interval);
                currentImg = n;
            }

            imgs[currentImg].style.opacity = 1;
            dots[currentImg].className += ' active';
        }


        //carousel section end

        let videos = document.querySelectorAll('video');
        // console.log(videos);
        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.7
        };

        let observer = new IntersectionObserver(handleIntersect, options);

        videos.forEach(video => observer.observe(video));

        function handleIntersect(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting || entry.target === document.pictureInPictureElement) {
                    entry.target.play();
                } else {
                    entry.target.pause();
                }
            });
        }





    });
</script>
