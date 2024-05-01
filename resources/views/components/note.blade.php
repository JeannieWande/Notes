<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
</head>
<body>
<header class="bg-teal-500 w-ful h-16">
    
    @if (Auth::check())
    <form method="POST" action="{{ route('logout') }}">
        @csrf
       <div class="flex justify-end  items-center mx-1">
         <button  class="text-xl p-2 text-black ">{{ __('Log Out') }}</button>   
       </div>
    </form>
    
    @else
    <div class="flex justify-end items-center">
        <div class="grid grid-cols-2 items-center gap-2">
            @if (Route::has('login'))
                <nav class="-mx-10 flex flex-1 justify-end">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-3 text-white text-xl ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>
    
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-3 text-white text-xl ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
            </div>
    </div>
   
    @endif
   
</header>
    @if (session('message'))
        <div class="alert alert-success w-full h-15 text-start text-xl bg-blue-400 text-white" >
            {{ session('message') }}
        </div>    
    @endif

    @if (session('success'))
        <div class="alert alert-success  w-full h-15 text-start text-xl bg-green-400 text-white" >
            {{ session('success') }}
        </div>    
    @endif

    @if (session('delete'))
        <div class="alert alert-success  w-full h-15 text-start text-xl bg-red-400 text-white" >
            {{ session('delete') }}
        </div>    
    @endif
    <div class="wrapper">
        {{ $slot }}
    </div>


    
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
               error
            } );
    </script>
    
    
</body>
</html>