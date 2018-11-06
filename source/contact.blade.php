@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="Contact {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Get in touch with {{ $page->siteName }}" />
@endpush

@section('body')
<h1 class="mb-6">Contact</h1>
<!--
    You can't handle forms with static sites, but you can use a form
    service like Tighten's Fieldgoal.io to accept submissions, and
    redirect back to a thanks page
-->
<form action="https://fieldgoal.io/">
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 md:mb-0 md:w-1/2">
            <label class="block mb-2 text-grey-darkest text-sm font-semibold" for="contact-name">
                Name
            </label>

            <input type="text" id="contact-name" placeholder="Jane Doe"
                class="block w-full mb-2 p-4 border shadow rounded-lg outline-none">
        </div>

        <div class="w-full px-3 md:w-1/2">
            <label class="block text-grey-darkest text-sm font-semibold mb-2" for="contact-email">
                Email Address
            </label>

            <input type="text" id="contact-email"  placeholder="email@domain.com"
                class="block w-full mb-2 p-4 border shadow rounded-lg outline-none">
        </div>
    </div>

    <div class="w-full">
        <label class="block text-grey-darkest text-sm font-semibold mb-2" for="contact-message">
            Message
        </label>

        <textarea id="contact-message" rows="4" class="block w-full mb-2 px-4 py-6 border shadow rounded-lg outline-none appearance-none"></textarea>
    </div>

    <hr class="my-8">

    <div class="flex justify-end w-full">
        <input type="submit" id="contact-submit" value="Submit"
            class="block px-8 py-4 bg-blue-light hover:bg-blue-dark text-white text-sm font-semibold tracking-wide uppercase shadow rounded-lg cursor-pointer transition">
    </div>
</form>
@endsection
