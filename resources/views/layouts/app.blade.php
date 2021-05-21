<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Games</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-6">
            <div class="flex flex-col lg:flex-row items-center">
                <a href="/">
                    {{-- <img src="/logo.svg" alt="logo" class="w-32 flex-none"> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        width="24" 
                        height="24" 
                        viewBox="0 0 24 24" 
                        fill="none" 
                        stroke="currentColor" 
                        stroke-width="2" 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        display="block" 
                        id="GameController"
                    >
                        <path d="M9 15l-2.968 2.968A2.362 2.362 0 012 16.298V15l1.357-6.784A4 4 0 017.279 5h9.442a4 4 0 013.922 3.216L22 15v1.297a2.362 2.362 0 01-4.032 1.67L15 15H9z"/>
                        <path d="M9 5l1 2h4l1-2"/>
                    </svg>
                </a>
                <ul class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-0">
                    <li><a href="#" class="hover:text-gray-400">Games</a></li>
                    <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                    <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
                </ul>
            </div>
            <div class="flex items-center mt-6 lg:mt-0">
                <div class="relative">
                    <input type="text" class="bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline w-64 px-3 pl-8 py-1" placeholder="Search...">
                    <div class="absolute top-0 flex items-center h-full ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="fill-current text-gray-400 w-4"
                            viewBox="0 0 32 40">
                            <g data-name="Layer 33">
                                <path d="M28.1318,26.0537l-7.76-7.59a10.5782,10.5782,0,1,0-2.1525,2.0909l7.8151,7.6437a1.5,1.5,0,1,0,2.0976-2.1445ZM12.0381,19.5762a7.5381,7.5381,0,1,1,7.5381-7.5381A7.5467,7.5467,0,0,1,12.0381,19.5762Z"/>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="ml-6">
                    <a href="#">
                        {{-- <img src="" alt="avatar" class="rounded-full w-8"> --}}
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            width="24" 
                            height="24" 
                            viewBox="0 0 24 24" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="2" 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            display="block" 
                            id="Person"
                        >
                            <circle cx="12" cy="7" r="5"/>
                            <path d="M17 14h.352a3 3 0 012.976 2.628l.391 3.124A2 2 0 0118.734 22H5.266a2 2 0 01-1.985-2.248l.39-3.124A3 3 0 016.649 14H7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered By <a href="#" class="underline hover:text-gray-400">IGDB API</a>
        </div>
    </footer>
</body>
</html>