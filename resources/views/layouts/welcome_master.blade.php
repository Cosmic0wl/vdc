<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('includes.head')

</head>


<body>
    <div id="app">
        <main id="main" class="container-fluid">

            @include('includes.navbar')

            

            <div id="hero" class=" border border-alert">
                <img src="/backgrounds/bg1.jpg" class="img-fluid w-100 " style="width: 100%;">
            </div>
            @yield('account')
            @yield('video')



            <div id="references" class="w-100 shadow" >
             
                <div class="row ">
                    <div class="p-3 col-lg-4 ">
                        <div class="reference_img">
                            <img src="images_static/references/img1.jpg" alt="">
                        </div>
                        <div class="references p-2">
                            <h3 class="text-center  my-5">Lorem Ipsum</h3>
                            <p class="text-white p-3">
                                "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </p>
                            <h1 class="virgolette text-center p-2">"</h1>
                        </div>
                    </div>

                    <div class="p-3 col-lg-4 ">
                        <div class="reference_img">
                            <img src="images_static/references/img2.jpg" alt="">
                        </div>
                        <div class="references p-2">
                            <h3 class="text-center my-5">Lorem Ipsum</h3>
                            <p class="text-white p-3">
                                "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </p>
                            <h1 class="virgolette text-center p-2">"</h1>
                        </div>
                    </div>

                    <div class="p-3 col-lg-4 ">
                        <div class="reference_img">
                            <img src="images_static/references/img3.jpg" alt="">
                        </div>
                        <div class="references p-2">
                            <h3 class="text-center   my-5">Lorem Ipsum</h3>
                            <p  class="text-white  p-3">
                                "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </p>
                            <h1 class="virgolette text-center p-2">"</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div id="blog" class="w-100 shadow my-3">
                <a class="text-white" href="{{ url('blog') }}">
                    <h2 class="text-white text-center p-1">Latest Posts</h2>
                </a>
                <div class="row">
                    @foreach ($post as $post)
                        <div class="p-3 col-lg-4 ">
                            <div class="bg-light-c p-2">
                                <a href="{{ url('/blog/'.$post->id) }}">
                                    <h3 class="text-center  my-5">{{ $post->title }}</h3>
                                </a>
                                @if ($post->image != null)
                                <div class="">
                                    <img class=" img-fluid" src="{{ $post->image}}">
                                </div>
                                @endif
                                <p class="text-white p-3">
                             "{{ str_limit($post->content, $limit = 160, $end = '...') }}"
                                </p>
                                    <h1 class="virgolette text-center p-2 m-3">#</h1>
                            </div>
                        </div>
                    @endforeach
              
                </div>  <!-- Row                   ends here -->
            </div>
            
            <!-- Parntner Companies Slideshow -->
            <div class="w-100 my-3 slideshow-cont">
                <div class="mySlides" id="slide_1">
                    <div class="slideContainer">
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/cf.png">
                            </div>
                        </a>
                        <a class="py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/sn.png">
                            </div>
                        </a>
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/bfi1.png">
                            </div>
                        </a>
                    </div>                       
                </div>

                <div class="mySlides" id="slide_2">
                    <div class="slideContainer">
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/sn.png">
                            </div>
                        </a>
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/waff.png">
                            </div>
                        </a>
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/cf.png">
                            </div>
                        </a>
                    </div>                        
                </div>

                <div class="mySlides" id="slide_3">
                    <div class="slideContainer">
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/waff.png">
                            </div>
                        </a>
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/cf.png">
                            </div>
                        </a>
                        <a class="col-3 py-5" href="">
                            <div class="text-center" id="logo">
                                <img src="/logos/sn.png">
                            </div>
                        </a>
                    </div>                   
                </div>
                <a class="prev"><i class="fas fa-chevron-left"></i></a>
                <a class="next"><i class="fas fa-chevron-right"></i></a> 
            </div>

            @include('includes.footer')
        </main>


    </div>
    
</body>
</html>
