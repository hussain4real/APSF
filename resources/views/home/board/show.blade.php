<x-home-layout>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Team area start -->
    <section class="team__detail mt-10">
        <div class="container line pb-140">
            <div class="line-3"></div>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8 offset-lg-0 offset-md-2">
                    <div class="team__member-img rounded-lg">
                        <img src="{{$boardOfTrustee->media->first()->getUrl()}}" alt="Team Member Picture" data-speed="0.5">
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
                    <div class="sec-title-wrapper pt-120">
                        <h2 class="team__member-name-7 animation__char_come">{{$boardOfTrustee->name}}</h2>
                        <h3 class="team__member-role-7 animation__char_come">UX Researcher and Instructor, at
                            <span>Axtra</span>
                        </h3>
                        <p>Jassica Oliver is known for her ability to take a creative brief and run
                            with it, coming back
                            with
                            fresh ideas and a perfectly built design file every time. From digital design to long-format
                            layouts,
                            she blends beautiful and intuitive with each project she touches. She also happens to be the queen
                            of
                            deadline-crushing, all while maintaining a can-do, Zen attitude that keeps the whole Statement
                            team
                            centered.</p>
                        <p>When he’s not building strong alliances with other creatives, project
                            managers and stakeholders
                            alike, you’ll find him giving voice to client strategies with fresh, compelling concepts and
                            delightfully clever messaging.</p>
                    </div>
                    <div class="team__member-work">
                        <h4 class="work-title">Portfolio :</h4>
                        <ul>
                            <li><a href="#">Behance</a></li>
                            <li><a href="#">Dribble</a></li>
                            <li><a href="#">Meduim</a></li>
                        </ul>
                    </div>
                    <div class="team__member-social">
                        <h4 class="work-title">Follow :</h4>
                        <ul>
                            <li><a href="#"><span><i class="fa-brands fa-facebook-f"></i></span></a></li>
                            <li><a href="#"><span><i class="fa-brands fa-twitter"></i></span></a></li>
                            <li><a href="#"><span><i class="fa-brands fa-instagram"></i></span></a></li>
                            <li><a href="#"><span><i class="fa-brands fa-linkedin"></i></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team area end -->
</x-home-layout>
