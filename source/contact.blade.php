@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="Contact {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Get in touch with {{ $page->siteName }}" />
@endpush

@section('body')
<div class="md:flex -mx-4">
    <div class="mb-8 lg:mb-0 px-4 md:w-full">
        <h1 class="page-title">Contact</h1>
        <!--
            You can't handle forms with static sites, but you can use a form
            service like Tighten's Fieldgoal.io to accept submissions, and
            redirect back to a thanks page
        -->
        <form action="https://fieldgoal.io/" class="w-full max-w-md mt-8">
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-grey-darkest text-xs font-normal mb-1" for="grid-first-name">
                        First Name
                    </label>
                    <input class="appearance-none block w-full rounded-lg text-grey-darker shadow border border-grey-light outline-none py-3 px-4 mb-2"
                        id="grid-first-name" type="text" placeholder="Jane">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block tracking-wide text-grey-darkest text-xs font-normal mb-1" for="grid-last-name">
                        Last Name
                    </label>
                    <input class="appearance-none block w-full rounded-lg border border-grey-light shadow text-grey-darker outline-none py-3 px-4" id="grid-last-name" type="text" placeholder="Doe">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-grey-darkest text-xs font-normal mb-1" for="grid-city">
                        City
                    </label>
                    <input class="appearance-none block w-full text-grey-darker shadow rounded-lg border border-grey-light outline-none py-3 px-4"
                        id="grid-city" type="text" placeholder="Albuquerque">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-grey-darkest text-xs font-normal mb-1" for="grid-state">
                        State
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full border border-grey-light text-grey-darker outline-none shadow py-3 px-4 pr-8" id="grid-state">
                            <option>New Mexico</option>
                            <option>Missouri</option>
                            <option>Texas</option>
                        </select>
                        <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-grey-darkest text-xs font-normal mb-1" for="grid-zip">
                        Zip
                    </label>
                    <input class="appearance-none block w-full rounded-lg shadow text-grey-darker border border-grey-light outline-none py-3 px-4"
                        id="grid-zip" type="text" placeholder="90210">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-1/2 px-3">
                    <input class="appearance-none block bg-blue-light font-light text-xs tracking-wide uppercase text-white rounded-lg cursor-pointer py-4 px-4 mb-3"
                        id="grid-submit" type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
