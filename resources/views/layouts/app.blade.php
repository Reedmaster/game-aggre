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
        <nav class="container mx-auto flex items-center justify-between px-4 py-6">
            <div class="flex items-center">
                <a href="/">
                    <img src="/logo.svg" alt="logo" class="w-32 flex-none">
                </a>
                <ul class="flex ml-16 space-x-8">
                    <li><a href="#" class="hover:text-gray-400">Games</a></li>
                    <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                    <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
                </ul>
            </div>
            <div class="flex items-center">
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
                    <a href="#"><img src="/avatar.jpg" alt="avatar" class="rounded-full w-8"></a>
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