<!doctype html>
<html lang="en" data-theme="mhocelections">
    <head>
        <!--Metadata-->
        <meta charset="UTF-8">
        @if (isset($_pageTitle))
            <title>{{ $_pageTitle }} | MHoC Moderation</title>
        @else
            <title>MHoC Moderation</title>
        @endif
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token()}} ">

        <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex flex-col h-screen">
        <div class="flex-grow">
            <div class="drawer drawer-mobile">
                <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content h-full flex flex-col">
                    <div class="flex-grow">
                        @yield('content')
                    </div>
                    <footer class="footer footer-center p-4 text-gray-500 text-base-content">
                        <div>
                            <p>A publication of the Reddit Model House of Commons - <a class="text-mhoc-green hover:underline" href="https://reddit.com/mhoc" target="_blank">reddit.com/r/MHoC</a></p>
                        </div>
                    </footer>
                </div>
                <div class="drawer-side shadow-xl">
                    <label for="my-drawer-2" class="drawer-overlay"></label>
                    <ul class="menu p-4 space-y-3 overflow-y-auto w-80 text-base-content">
                        <div class="flex flex-row space-x-5 items-center mb-5">
                            <img src="https://static.files.bbci.co.uk/news-archive/news.files.bbci.co.uk/include/elections/ge2019/branding/election2019-2x.svg" alt="">
                            <div class="text-2xl"><span class="font-light">ELECTION</span><span class="ml-[5px]">XVIII</span></div>
                        </div>
                        <li>
                            <a class="flex flex-row justify-between {{ request()->is('/') ? 'active' : '' }}">
                                <span>Home</span>
                                <i class="material-icons">home</i>
                            </a>
                        </li>
                        <li>
                            <a class="flex flex-row justify-between {{ request()->is('/state') ? 'active' : '' }}">
                                <span>State of the Commons</span>
                                <i class="material-icons">groups</i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('local-constituencies.index') }}" class="flex flex-row justify-between {{ request()->is('constituencies*') ? 'active' : '' }}">
                                <span>Constituency Results</span>
                                <i class="material-icons">place</i>
                            </a>
                        </li>
                        <li>
                            <a class="flex flex-row justify-between {{ request()->is('/constituencies') ? 'active' : '' }}">
                                <span>Candidates</span>
                                <i class="material-icons">face</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
