@php
    // Determine the class based on time of day
    $hour = now()->hour;
    if ($hour >= 6 && $hour < 12) {
        $backgroundClass = 'bg-hero-morning';
    } elseif ($hour >= 12 && $hour < 18) {
        $backgroundClass = 'bg-hero-afternoon';
    } elseif ($hour >= 18 && $hour < 21) {
        $backgroundClass = 'bg-hero-evening';
    } else {
        $backgroundClass = 'bg-hero-night';
    }
@endphp

<div id="home"
    class="relative overflow-hidden {{ $backgroundClass }} bg-cover bg-center pt-[120px] md:pt-[130px] lg:pt-[160px]">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-blue-950 bg-opacity-65"></div>
    <div class="container relative z-10 pb-10">
        <div class="-mx-4 flex flex-wrap items-center">
            <div class="w-full px-4">
                <div class="hero-content wow fadeInUp mx-auto max-w-[780px] text-center" data-wow-delay=".2s">
                    <h1 x-data="{
                        startingAnimation: { opacity: 0, y: 50, rotation: '25deg' },
                        endingAnimation: { opacity: 1, y: 0, rotation: '0deg', stagger: 0.02, duration: 0.7, ease: 'back' },
                        addCNDScript: true,
                        splitCharactersIntoSpans(element) {
                            text = element.innerHTML;
                            modifiedHTML = [];
                            for (var i = 0; i < text.length; i++) {
                                attributes = '';
                                if (text[i].trim()) { attributes = 'class=\'inline-block\''; }
                                modifiedHTML.push('<span ' + attributes + '>' + text[i] + '</span>');
                            }
                            element.innerHTML = modifiedHTML.join('');
                        },

                        addScriptToHead(url) {
                            script = document.createElement('script');
                            script.src = url;
                            document.head.appendChild(script);
                        },
                        animateText() {
                            $el.classList.remove('invisible');
                            gsap.fromTo($el.children, this.startingAnimation, this.endingAnimation);
                        }
                    }" x-init="splitCharactersIntoSpans($el);
                    if (addCNDScript) {
                        addScriptToHead('https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js');
                    }
                    gsapInterval2 = setInterval(function() {
                        if (typeof gsap !== 'undefined') {
                            animateText();
                            clearInterval(gsapInterval2);
                        }
                    }, 5);"
                        class="mb-6 text-3xl font-extrabold leading-snug text-white sm:text-4xl sm:leading-snug lg:text-5xl lg:leading-[1.2]">
                        Find Cheapest flights around the world on Sunshine travels
                    </h1>
                    <p class=" mx-auto mb-9 max-w-[600px] text-base font-medium text-gray-300  sm:leading-[1.44]">
                        Sunshine Travels offers affordable flights between the UK and Africa, including destinations
                        like Sierra Leone and Nigeria. We ensure smooth, hassle-free journeys with exceptional customer
                        service. Explore with us for a seamless travel experience.
                    </p>
                </div>
            </div>

            <div class="w-full px-4">
                <div class="wow fadeInUp relative z-10 mx-auto max-w-[845px]" data-wow-delay=".25s">
                    <div class="mt-0">
                        <div class=" w-full z-50">
                            <div class="  flex flex-col justify-center ">
                                <div class="relative py-3 sm:mx-auto w-full">

                                    <!-- Content Container with Fade-Up Animation -->
                                    <div
                                        class="relative px-4 bg-white border shadow-lg sm:rounded-3xl container fade-up">
                                        <div class="mx-auto">
                                            <div class="divide-y divide-gray-200">
                                                <div
                                                    class="py-4 text-base leading-6 text-gray-700 sm:text-lg sm:leading-7">
                                                    <form method="POST" action="{{ route('query.submit') }}">
                                                        @csrf
                                                        <div class="relative grid grid-cols-5 gap-4">
                                                            <!-- Input Fields (no animation applied) -->
                                                            <div class="col-span-4 ">
                                                                <div class="grid grid-cols-4 gap-4">
                                                                    <div>
                                                                        <input autocomplete="off" id="name"
                                                                            name="name" type="text"
                                                                            class="peer h-10 w-full border-b-2 border-gray-400 text-gray-900 focus:outline-none focus:border-blue-700"
                                                                            placeholder="Name" />
                                                                    </div>
                                                                    <div>
                                                                        <input autocomplete="off" id="email"
                                                                            name="email" type="email"
                                                                            class="peer h-10 w-full border-b-2 border-gray-400 text-gray-900 focus:outline-none focus:border-blue-700"
                                                                            placeholder="Email" />
                                                                    </div>
                                                                    <div>
                                                                        <input autocomplete="off" id="phone"
                                                                            name="phone" type="text"
                                                                            class="peer h-10 w-full border-b-2 border-gray-400 text-gray-900 focus:outline-none focus:border-blue-700"
                                                                            placeholder="Phone" />
                                                                    </div>
                                                                    <div>
                                                                        <input autocomplete="off" id="passengers"
                                                                            name="passengers" type="text"
                                                                            class="peer h-10 w-full border-b-2 border-gray-400 text-gray-900 focus:outline-none focus:border-blue-700"
                                                                            placeholder="Passengers" />
                                                                    </div>
                                                                    <div>
                                                                        <select autocomplete="off" id="departure"
                                                                            name="departure"
                                                                            class="peer h-10 w-full border-b-2 border-gray-400 text-gray-900 focus:outline-none focus:border-blue-700"
                                                                            placeholder="departure">

                                                                            @if ($destinations)
                                                                                <option disabled selected>Select...
                                                                                </option>

                                                                                @foreach ($destinations as $destination)
                                                                                    <option
                                                                                        value="{{ $destination['city'] . ', ' . $destination['country'] }}">
                                                                                        {{ $destination['city'] . ', ' . $destination['country'] }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @else
                                                                                <option>No destination Found</option>
                                                                            @endif

                                                                        </select>
                                                                    </div>
                                                                    <div>
                                                                        <select autocomplete="off" id="destination"
                                                                            name="destination"
                                                                            class="peer h-10 w-full border-b-2 border-gray-400 text-gray-900 focus:outline-none focus:border-blue-700"
                                                                            placeholder="Destination">

                                                                            @if ($destinations)
                                                                                <option disabled selected>Select...
                                                                                </option>

                                                                                @foreach ($destinations as $destination)
                                                                                    <option
                                                                                        value="{{ $destination['city'] . ', ' . $destination['country'] }}">
                                                                                        {{ $destination['city'] . ', ' . $destination['country'] }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @else
                                                                                <option>No destination Found</option>
                                                                            @endif

                                                                        </select>
                                                                    </div>
                                                                    <div>
                                                                        <input autocomplete="off" id="date"
                                                                            name="date" type="date"
                                                                            class="peer h-10 w-full border-b-2 border-gray-400 text-gray-900 focus:outline-none focus:border-blue-700"
                                                                            placeholder="arrilval" />

                                                                    </div>
                                                                    <div>
                                                                        <select autocomplete="off" id="flight_type"
                                                                            name="flight_type"
                                                                            class="peer h-10 w-full border-b-2 border-gray-400 text-gray-900 focus:outline-none focus:border-blue-700"
                                                                            placeholder="departure">
                                                                            <option disabled selected>Select...
                                                                            </option>
                                                                            <option value="One-way" selected>One Way
                                                                            </option>
                                                                            <option "round-trip">Roundtrip
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <!-- Submit Button -->
                                                            <div class="relative">
                                                                <button
                                                                    class="bg-primary text-white rounded-md px-2 py-1 h-full w-full">
                                                                    Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -left-9 bottom-0 z-[-1]">
                        <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="1.66667" cy="104" r=" 1.66667" transform="rotate(-90 1.66667 104)"
                                fill="white" />
                            <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"
                                fill="white" />
                            <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"
                                fill="white" />
                            <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"
                                fill="white" />
                            <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)"
                                fill="white" />
                            <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"
                                fill="white" />
                            <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"
                                fill="white" />
                            <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"
                                fill="white" />
                            <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)"
                                fill="white" />
                            <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)"
                                fill="white" />
                            <circle cx="1.66667" cy="89.3333" r="1.66667" transform="rotate(-90 1.66667 89.3333)"
                                fill="white" />
                            <circle cx="16.3333" cy="89.3333" r="1.66667" transform="rotate(-90 16.3333 89.3333)"
                                fill="white" />
                            <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)"
                                fill="white" />
                            <circle cx="45.6667" cy="89.3333" r="1.66667" transform="rotate(-90 45.6667 89.3333)"
                                fill="white" />
                            <circle cx="60.3333" cy="89.3338" r="1.66667" transform="rotate(-90 60.3333 89.3338)"
                                fill="white" />
                            <circle cx="88.6667" cy="89.3338" r="1.66667" transform="rotate(-90 88.6667 89.3338)"
                                fill="white" />
                            <circle cx="117.667" cy="89.3338" r="1.66667" transform="rotate(-90 117.667 89.3338)"
                                fill="white" />
                            <circle cx="74.6667" cy="89.3338" r="1.66667" transform="rotate(-90 74.6667 89.3338)"
                                fill="white" />
                            <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"
                                fill="white" />
                            <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"
                                fill="white" />
                            <circle cx="1.66667" cy="74.6673" r="1.66667" transform="rotate(-90 1.66667 74.6673)"
                                fill="white" />
                            <circle cx="1.66667" cy="31.0003" r="1.66667" transform="rotate(-90 1.66667 31.0003)"
                                fill="white" />
                            <circle cx="16.3333" cy="74.6668" r="1.66667" transform="rotate(-90 16.3333 74.6668)"
                                fill="white" />
                            <circle cx="16.3333" cy="31.0003" r="1.66667" transform="rotate(-90 16.3333 31.0003)"
                                fill="white" />
                            <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)"
                                fill="white" />
                            <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)"
                                fill="white" />
                            <circle cx="45.6667" cy="74.6668" r="1.66667" transform="rotate(-90 45.6667 74.6668)"
                                fill="white" />
                            <circle cx="45.6667" cy="31.0003" r="1.66667" transform="rotate(-90 45.6667 31.0003)"
                                fill="white" />
                            <circle cx="60.3333" cy="74.6668" r="1.66667" transform="rotate(-90 60.3333 74.6668)"
                                fill="white" />
                            <circle cx="60.3333" cy="31.0001" r="1.66667" transform="rotate(-90 60.3333 31.0001)"
                                fill="white" />
                            <circle cx="88.6667" cy="74.6668" r="1.66667" transform="rotate(-90 88.6667 74.6668)"
                                fill="white" />
                            <circle cx="88.6667" cy="31.0001" r="1.66667" transform="rotate(-90 88.6667 31.0001)"
                                fill="white" />
                            <circle cx="117.667" cy="74.6668" r="1.66667" transform="rotate(-90 117.667 74.6668)"
                                fill="white" />
                            <circle cx="117.667" cy="31.0001" r="1.66667" transform="rotate(-90 117.667 31.0001)"
                                fill="white" />
                            <circle cx="74.6667" cy="74.6668" r="1.66667" transform="rotate(-90 74.6667 74.6668)"
                                fill="white" />
                            <circle cx="74.6667" cy="31.0001" r="1.66667" transform="rotate(-90 74.6667 31.0001)"
                                fill="white" />
                            <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"
                                fill="white" />
                            <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)"
                                fill="white" />
                            <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"
                                fill="white" />
                            <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)"
                                fill="white" />
                            <circle cx="1.66667" cy="60.0003" r="1.66667" transform="rotate(-90 1.66667 60.0003)"
                                fill="white" />
                            <circle cx="1.66667" cy="16.3336" r="1.66667" transform="rotate(-90 1.66667 16.3336)"
                                fill="white" />
                            <circle cx="16.3333" cy="60.0003" r="1.66667" transform="rotate(-90 16.3333 60.0003)"
                                fill="white" />
                            <circle cx="16.3333" cy="16.3336" r="1.66667" transform="rotate(-90 16.3333 16.3336)"
                                fill="white" />
                            <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)"
                                fill="white" />
                            <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)"
                                fill="white" />
                            <circle cx="45.6667" cy="60.0003" r="1.66667" transform="rotate(-90 45.6667 60.0003)"
                                fill="white" />
                            <circle cx="45.6667" cy="16.3336" r="1.66667" transform="rotate(-90 45.6667 16.3336)"
                                fill="white" />
                            <circle cx="60.3333" cy="60.0003" r="1.66667" transform="rotate(-90 60.3333 60.0003)"
                                fill="white" />
                            <circle cx="60.3333" cy="16.3336" r="1.66667" transform="rotate(-90 60.3333 16.3336)"
                                fill="white" />
                            <circle cx="88.6667" cy="60.0003" r="1.66667" transform="rotate(-90 88.6667 60.0003)"
                                fill="white" />
                            <circle cx="88.6667" cy="16.3336" r="1.66667" transform="rotate(-90 88.6667 16.3336)"
                                fill="white" />
                            <circle cx="117.667" cy="60.0003" r="1.66667" transform="rotate(-90 117.667 60.0003)"
                                fill="white" />
                            <circle cx="117.667" cy="16.3336" r="1.66667" transform="rotate(-90 117.667 16.3336)"
                                fill="white" />
                            <circle cx="74.6667" cy="60.0003" r="1.66667" transform="rotate(-90 74.6667 60.0003)"
                                fill="white" />
                            <circle cx="74.6667" cy="16.3336" r="1.66667" transform="rotate(-90 74.6667 16.3336)"
                                fill="white" />
                            <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"
                                fill="white" />
                            <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)"
                                fill="white" />
                            <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"
                                fill="white" />
                            <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)"
                                fill="white" />
                            <circle cx="1.66667" cy="45.3336" r="1.66667" transform="rotate(-90 1.66667 45.3336)"
                                fill="white" />
                            <circle cx="1.66667" cy="1.66683" r="1.66667" transform="rotate(-90 1.66667 1.66683)"
                                fill="white" />
                            <circle cx="16.3333" cy="45.3336" r="1.66667" transform="rotate(-90 16.3333 45.3336)"
                                fill="white" />
                            <circle cx="16.3333" cy="1.66683" r="1.66667" transform="rotate(-90 16.3333 1.66683)"
                                fill="white" />
                            <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)"
                                fill="white" />
                            <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)"
                                fill="white" />
                            <circle cx="45.6667" cy="45.3336" r="1.66667" transform="rotate(-90 45.6667 45.3336)"
                                fill="white" />
                            <circle cx="45.6667" cy="1.66683" r="1.66667" transform="rotate(-90 45.6667 1.66683)"
                                fill="white" />
                            <circle cx="60.3333" cy="45.3338" r="1.66667" transform="rotate(-90 60.3333 45.3338)"
                                fill="white" />
                            <circle cx="60.3333" cy="1.66707" r="1.66667" transform="rotate(-90 60.3333 1.66707)"
                                fill="white" />
                            <circle cx="88.6667" cy="45.3338" r="1.66667" transform="rotate(-90 88.6667 45.3338)"
                                fill="white" />
                            <circle cx="88.6667" cy="1.66707" r="1.66667" transform="rotate(-90 88.6667 1.66707)"
                                fill="white" />
                            <circle cx="117.667" cy="45.3338" r="1.66667" transform="rotate(-90 117.667 45.3338)"
                                fill="white" />
                            <circle cx="117.667" cy="1.66707" r="1.66667" transform="rotate(-90 117.667 1.66707)"
                                fill="white" />
                            <circle cx="74.6667" cy="45.3338" r="1.66667" transform="rotate(-90 74.6667 45.3338)"
                                fill="white" />
                            <circle cx="74.6667" cy="1.66707" r="1.66667" transform="rotate(-90 74.6667 1.66707)"
                                fill="white" />
                            <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"
                                fill="white" />
                            <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)"
                                fill="white" />
                            <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"
                                fill="white" />
                            <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)"
                                fill="white" />
                        </svg>
                    </div>
                    <div class="absolute -right-6 -top-6 z-[-1]">
                        <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)"
                                fill="white" />
                            <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"
                                fill="white" />
                            <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"
                                fill="white" />
                            <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"
                                fill="white" />
                            <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)"
                                fill="white" />
                            <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"
                                fill="white" />
                            <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"
                                fill="white" />
                            <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"
                                fill="white" />
                            <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)"
                                fill="white" />
                            <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)"
                                fill="white" />
                            <circle cx="1.66667" cy="89.3333" r="1.66667" transform="rotate(-90 1.66667 89.3333)"
                                fill="white" />
                            <circle cx="16.3333" cy="89.3333" r="1.66667" transform="rotate(-90 16.3333 89.3333)"
                                fill="white" />
                            <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)"
                                fill="white" />
                            <circle cx="45.6667" cy="89.3333" r="1.66667" transform="rotate(-90 45.6667 89.3333)"
                                fill="white" />
                            <circle cx="60.3333" cy="89.3338" r="1.66667" transform="rotate(-90 60.3333 89.3338)"
                                fill="white" />
                            <circle cx="88.6667" cy="89.3338" r="1.66667" transform="rotate(-90 88.6667 89.3338)"
                                fill="white" />
                            <circle cx="117.667" cy="89.3338" r="1.66667" transform="rotate(-90 117.667 89.3338)"
                                fill="white" />
                            <circle cx="74.6667" cy="89.3338" r="1.66667" transform="rotate(-90 74.6667 89.3338)"
                                fill="white" />
                            <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"
                                fill="white" />
                            <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"
                                fill="white" />
                            <circle cx="1.66667" cy="74.6673" r="1.66667" transform="rotate(-90 1.66667 74.6673)"
                                fill="white" />
                            <circle cx="1.66667" cy="31.0003" r="1.66667" transform="rotate(-90 1.66667 31.0003)"
                                fill="white" />
                            <circle cx="16.3333" cy="74.6668" r="1.66667" transform="rotate(-90 16.3333 74.6668)"
                                fill="white" />
                            <circle cx="16.3333" cy="31.0003" r="1.66667" transform="rotate(-90 16.3333 31.0003)"
                                fill="white" />
                            <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)"
                                fill="white" />
                            <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)"
                                fill="white" />
                            <circle cx="45.6667" cy="74.6668" r="1.66667" transform="rotate(-90 45.6667 74.6668)"
                                fill="white" />
                            <circle cx="45.6667" cy="31.0003" r="1.66667" transform="rotate(-90 45.6667 31.0003)"
                                fill="white" />
                            <circle cx="60.3333" cy="74.6668" r="1.66667" transform="rotate(-90 60.3333 74.6668)"
                                fill="white" />
                            <circle cx="60.3333" cy="31.0001" r="1.66667" transform="rotate(-90 60.3333 31.0001)"
                                fill="white" />
                            <circle cx="88.6667" cy="74.6668" r="1.66667" transform="rotate(-90 88.6667 74.6668)"
                                fill="white" />
                            <circle cx="88.6667" cy="31.0001" r="1.66667" transform="rotate(-90 88.6667 31.0001)"
                                fill="white" />
                            <circle cx="117.667" cy="74.6668" r="1.66667" transform="rotate(-90 117.667 74.6668)"
                                fill="white" />
                            <circle cx="117.667" cy="31.0001" r="1.66667" transform="rotate(-90 117.667 31.0001)"
                                fill="white" />
                            <circle cx="74.6667" cy="74.6668" r="1.66667" transform="rotate(-90 74.6667 74.6668)"
                                fill="white" />
                            <circle cx="74.6667" cy="31.0001" r="1.66667" transform="rotate(-90 74.6667 31.0001)"
                                fill="white" />
                            <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"
                                fill="white" />
                            <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)"
                                fill="white" />
                            <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"
                                fill="white" />
                            <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)"
                                fill="white" />
                            <circle cx="1.66667" cy="60.0003" r="1.66667" transform="rotate(-90 1.66667 60.0003)"
                                fill="white" />
                            <circle cx="1.66667" cy="16.3336" r="1.66667" transform="rotate(-90 1.66667 16.3336)"
                                fill="white" />
                            <circle cx="16.3333" cy="60.0003" r="1.66667" transform="rotate(-90 16.3333 60.0003)"
                                fill="white" />
                            <circle cx="16.3333" cy="16.3336" r="1.66667" transform="rotate(-90 16.3333 16.3336)"
                                fill="white" />
                            <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)"
                                fill="white" />
                            <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)"
                                fill="white" />
                            <circle cx="45.6667" cy="60.0003" r="1.66667" transform="rotate(-90 45.6667 60.0003)"
                                fill="white" />
                            <circle cx="45.6667" cy="16.3336" r="1.66667" transform="rotate(-90 45.6667 16.3336)"
                                fill="white" />
                            <circle cx="60.3333" cy="60.0003" r="1.66667" transform="rotate(-90 60.3333 60.0003)"
                                fill="white" />
                            <circle cx="60.3333" cy="16.3336" r="1.66667" transform="rotate(-90 60.3333 16.3336)"
                                fill="white" />
                            <circle cx="88.6667" cy="60.0003" r="1.66667" transform="rotate(-90 88.6667 60.0003)"
                                fill="white" />
                            <circle cx="88.6667" cy="16.3336" r="1.66667" transform="rotate(-90 88.6667 16.3336)"
                                fill="white" />
                            <circle cx="117.667" cy="60.0003" r="1.66667" transform="rotate(-90 117.667 60.0003)"
                                fill="white" />
                            <circle cx="117.667" cy="16.3336" r="1.66667" transform="rotate(-90 117.667 16.3336)"
                                fill="white" />
                            <circle cx="74.6667" cy="60.0003" r="1.66667" transform="rotate(-90 74.6667 60.0003)"
                                fill="white" />
                            <circle cx="74.6667" cy="16.3336" r="1.66667" transform="rotate(-90 74.6667 16.3336)"
                                fill="white" />
                            <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"
                                fill="white" />
                            <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)"
                                fill="white" />
                            <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"
                                fill="white" />
                            <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)"
                                fill="white" />
                            <circle cx="1.66667" cy="45.3336" r="1.66667" transform="rotate(-90 1.66667 45.3336)"
                                fill="white" />
                            <circle cx="1.66667" cy="1.66683" r="1.66667" transform="rotate(-90 1.66667 1.66683)"
                                fill="white" />
                            <circle cx="16.3333" cy="45.3336" r="1.66667" transform="rotate(-90 16.3333 45.3336)"
                                fill="white" />
                            <circle cx="16.3333" cy="1.66683" r="1.66667" transform="rotate(-90 16.3333 1.66683)"
                                fill="white" />
                            <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)"
                                fill="white" />
                            <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)"
                                fill="white" />
                            <circle cx="45.6667" cy="45.3336" r="1.66667" transform="rotate(-90 45.6667 45.3336)"
                                fill="white" />
                            <circle cx="45.6667" cy="1.66683" r="1.66667" transform="rotate(-90 45.6667 1.66683)"
                                fill="white" />
                            <circle cx="60.3333" cy="45.3338" r="1.66667" transform="rotate(-90 60.3333 45.3338)"
                                fill="white" />
                            <circle cx="60.3333" cy="1.66707" r="1.66667" transform="rotate(-90 60.3333 1.66707)"
                                fill="white" />
                            <circle cx="88.6667" cy="45.3338" r="1.66667" transform="rotate(-90 88.6667 45.3338)"
                                fill="white" />
                            <circle cx="88.6667" cy="1.66707" r="1.66667" transform="rotate(-90 88.6667 1.66707)"
                                fill="white" />
                            <circle cx="117.667" cy="45.3338" r="1.66667" transform="rotate(-90 117.667 45.3338)"
                                fill="white" />
                            <circle cx="117.667" cy="1.66707" r="1.66667" transform="rotate(-90 117.667 1.66707)"
                                fill="white" />
                            <circle cx="74.6667" cy="45.3338" r="1.66667" transform="rotate(-90 74.6667 45.3338)"
                                fill="white" />
                            <circle cx="74.6667" cy="1.66707" r="1.66667" transform="rotate(-90 74.6667 1.66707)"
                                fill="white" />
                            <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"
                                fill="white" />
                            <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)"
                                fill="white" />
                            <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"
                                fill="white" />
                            <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)"
                                fill="white" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
