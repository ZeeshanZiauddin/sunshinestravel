@props(['active' => false])

<a class="{{ $active ? ' font-extrabold border-b-2 border-blue-600 text-primary' : ' ' }} h-14 mx-8 flex justify-center items-center py-2 text-base font-medium text-dark group-hover:text-primary dark:text-white lg:ml-7 lg:mr-0 lg:inline-flex lg:px-0 lg:py-4 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-10"
    {{ $attributes }}>{{ $slot }}</a>
