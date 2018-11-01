@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="Contact {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Get in touch with {{ $page->siteName }}" />
@endpush

@section('body')
<div class="w-full max-w-xl mx-auto px-6 transition-sm md:px-0">
    <h1 class="font-bold text-black mb-6">Contact</h1>
    <!--
        You can't handle forms with static sites, but you can use a form
        service like Tighten's Fieldgoal.io to accept submissions, and
        redirect back to a thanks page
    -->
    <form action="https://fieldgoal.io/">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0 md:w-1/2">
                <label class="block text-grey-darkest text-sm font-semibold mb-2" for="contact-first-name">
                    First Name
                </label>

                <input type="text" id="contact-first-name" placeholder="Jane"
                    class="block w-full mb-2 p-4 border shadow rounded-lg outline-none">
            </div>

            <div class="w-full px-3 md:w-1/2">
                <label class="block text-grey-darkest text-sm font-semibold mb-2" for="contact-last-name">
                    Last Name
                </label>

                <input type="text" id="contact-last-name"  placeholder="Doe"
                    class="block w-full mb-2 p-4 border shadow rounded-lg outline-none">
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block text-grey-darkest text-sm font-semibold mb-2" for="contact-city">
                    City
                </label>

                <input type="text" id="contact-city" placeholder="Chicago"
                    class="block w-full mb-2 p-4 border shadow rounded-lg outline-none">
            </div>

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block text-grey-darkest text-sm font-semibold mb-2" for="contact-state">
                    State
                </label>

                <select id="contact-state" class="block w-full mb-2 p-4 border shadow rounded-lg outline-none appearance-none">
                    <option selected>Illionois</option>
                    <option>New York</option>
                    <option>California</option>
                </select>

                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block text-grey-darkest text-sm font-semibold mb-2" for="contact-zip">
                    Zip
                </label>

                <input type="text" id="contact-zip" placeholder="60622"
                    class="block w-full p-4 border shadow rounded-lg outline-none">
            </div>
        </div>

        <hr class="my-8">

        <div class="flex justify-end w-full">
            <input type="submit" id="contact-submit" value="Submit"
                class="block px-8 py-4 bg-blue-light text-white text-sm font-semibold tracking-wide uppercase shadow rounded-lg cursor-pointer transition hover:bg-blue-dark">
        </div>
    </form>
</div>
@endsection
