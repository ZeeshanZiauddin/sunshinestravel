<x-layout>
    <!-- ====== Banner Section Start -->
    <div class="relative z-10 overflow-hidden pt-[120px] pb-[60px] md:pt-[130px] lg:pt-[160px] dark:bg-dark">
        <div
            class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-stroke/0 via-stroke dark:via-dark-3 to-stroke/0">
        </div>
        <div class="container">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4">
                    <div class="text-center">
                        <h1
                            class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl md:text-[40px] md:leading-[1.2]">
                            Airlines</h1>
                        <p class="mb-5 text-base text-body-color dark:text-dark-6">
                            Below are all the airline that we work with pick your favourits
                        </p>

                        <ul class="flex items-center justify-center gap-[10px]">
                            <li>
                                <a href="/"
                                    class="flex items-center gap-[10px] text-base font-medium text-dark dark:text-white">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="flex items-center gap-[10px] text-base font-medium text-body-color">
                                    <span class="text-body-color dark:text-dark-6"> / </span>
                                    Airlines
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== Banner Section End -->

    <!-- ====== Airline Section Start -->
    <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20 dark:bg-dark">
        <div class="container">
            <div class="flex flex-wrap -mx-4">

                @for ($i = 1; $i <= 10; $i++)
                    <div class="w-full px-4 md:w-1/3 ">
                        <div class="mb-10 wow fadeInUp group" data-wow-delay=".1s">
                            <div class="mb-8 overflow-hidden rounded-[5px]  shadow border flex justify-center items-center"
                                style="width: 300px;height: 220px">
                                <a href="/" class="block">
                                    <img src="images/airlines/{{ $i }}.png" alt="image"
                                        class="w-full  transition group-hover:rotate-6 group-hover:scale-125" />
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- ====== Services Section Start -->
    <x-services />
    <!-- ====== Services Section End -->

    <!-- ====== FAQ Section Start -->
    <x-faq />
    <!-- ====== FAQ Section End -->
</x-layout>
