<div class="ud-header absolute left-0 top-0 z-40 flex w-full items-center bg-transparent">
    <div class="container">
        <div class="relative -mx-4 flex items-center justify-between">
            <div class="w-96 max-w-full px-4">
                <a href="{{ route('home') }}" class="navbar-logo block w-full py-5">
                    <img src="/images/logo/logo-white.svg" alt="logo" class=" header-logo w-full" />
                </a>
            </div>
            <div class="flex w-full items-center justify-between px-4">
                <div>
                    <button id="navbarToggler"
                        class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                    </button>
                    <nav id="navbarCollapse"
                        class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:bg-dark-2 lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:px-4 lg:py-0 lg:shadow-none dark:lg:bg-transparent xl:px-6">
                        <ul class="blcok lg:flex 2xl:ml-20">

                            <li class="group relative">
                                <x-nav-link href="/" :active="request()->is('/')">
                                    Home
                                </x-nav-link>
                            </li>

                            <li class="group relative">

                                <x-nav-link href="/about" :active="request()->is('about')">
                                    About
                                </x-nav-link>
                            </li>
                            <li class="group relative">

                                <x-nav-link href="/contact" :active="request()->is('contact')">
                                    Contact
                                </x-nav-link>
                            </li>
                            <li class="group relative">
                                <x-nav-link href="/airlines" :active="request()->is('airlines')">
                                    Airlines
                                </x-nav-link>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="flex items-center justify-end pr-16 lg:pr-0">
                    <div class="hidden sm:flex">

                        <a href="tel:443301131318"
                            class="signUpBtn flex items-center justify-center rounded-md bg-white bg-opacity-20 px-6 py-2 text-base font-medium text-white duration-300 ease-in-out hover:bg-opacity-100 hover:text-dark">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 3.75v4.5m0-4.5h-4.5m4.5 0-6 6m3 12c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 0 1 4.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 0 0-.38 1.21 12.035 12.035 0 0 0 7.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 0 1 1.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 0 1-2.25 2.25h-2.25Z" />
                            </svg>
                            <span class="ms-2">
                                +443301131318
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
