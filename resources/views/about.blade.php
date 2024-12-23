<x-layout>

    <!-- ====== About Section Start -->
    <x-about />
    <!-- ====== About Section End -->

    <!-- ====== Services Section Start -->
    <x-services />
    <!-- ====== Services Section End -->
    <!-- ====== CTA Section Start -->
    <section class="relative z-10 overflow-hidden bg-primary py-20 lg:py-[115px]">
        <div class="container mx-auto">
            <div class="relative overflow-hidden">
                <div class="-mx-4 flex flex-wrap items-stretch">
                    <div class="w-full px-4">
                        <div class="mx-auto max-w-[570px] text-center">
                            <h2 class="mb-2.5 text-3xl font-bold text-white md:text-[38px] md:leading-[1.44]">
                                <span>What Are You Looking For?</span>
                                <span class="text-3xl font-normal md:text-[40px]">
                                    Get Started Now
                                </span>
                            </h2>
                            <p class="mx-auto mb-6 max-w-[515px] text-base leading-[1.5] text-white">
                                There are many variations of passages of Lorem Ipsum but the
                                majority have suffered in some form.
                            </p>
                            <a href="javascript:void(0)"
                                class="inline-block rounded-md border border-transparent bg-secondary px-7 py-3 text-base font-medium text-white transition hover:bg-[#0BB489]">
                                Start using Play
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <span class="absolute left-0 top-0">
                <svg width="495" height="470" viewBox="0 0 495 470" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="55" cy="442" r="138" stroke="white" stroke-opacity="0.04"
                        stroke-width="50" />
                    <circle cx="446" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
                    <path d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z" stroke="white"
                        stroke-opacity="0.08" stroke-width="12" />
                </svg>
            </span>
            <span class="absolute bottom-0 right-0">
                <svg width="493" height="470" viewBox="0 0 493 470" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="462" cy="5" r="138" stroke="white" stroke-opacity="0.04"
                        stroke-width="50" />
                    <circle cx="49" cy="470" r="39" stroke="white" stroke-opacity="0.04"
                        stroke-width="20" />
                    <path d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z" stroke="white"
                        stroke-opacity="0.06" stroke-width="13" />
                </svg>
            </span>
        </div>
    </section>
    <!-- ====== CTA Section End -->

    <!-- ====== FAQ Section Start -->
    <x-faq />
    <!-- ====== FAQ Section End -->

    <!-- ====== Team Section Start -->
    <x-teams />
    <!-- ====== Brands Section End -->

    <!-- ====== Testimonial Section Start -->
    <x-testimonial />
    <!-- ====== Testimonial Section End -->
</x-layout>
