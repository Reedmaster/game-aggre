@extends('layouts.app')

@section('content')
    <div class="container px-4 mx-auto">
        <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Popular Games</h2>
        {{-- Livewire allows you to load these components asynchronously, you don't have to load every component before you see the page --}}
        {{-- You load the inital page first, livewire makes ajax request with data and re-renders component --}}
        <livewire:popular-games />

        <div class="flex flex-col my-10 lg:flex-row">
            <div class="w-full mr-0 recently-reviewed lg:w-3/4 lg:mr-32">
                <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Recently Reviewed</h2>
                <livewire:recently-reviewed />
            </div> {{-- end recently reviewed --}}

            <div class="mt-12 most-anticipated lg:w-1/4 lg:mt-0">
                <h2 class="font-semibold tracking-wide text-blue-500 uppercase">Most Anticipated</h2>
                <livewire:most-anticipated />

                <h2 class="mt-12 font-semibold tracking-wide text-blue-500 uppercase">Coming Soon</h2>
                <livewire:coming-soon />
            </div> {{-- end most anticipated --}}

        </div>
    </div>{{-- end container --}}
@endsection
