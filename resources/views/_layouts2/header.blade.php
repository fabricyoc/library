<!--Header Section Starts Here-->
<header class="bg-nav">
    <div class="flex justify-between">
        <div class="p-1 mx-3 inline-flex items-center w-20">
            <i id="btnSidebar" class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
            <a href="{{ route('dashboard.index') }}">
                <h1 class="text-white p-2">Logo</h1>
                {{-- <img src="{{ Storage::url('imgs/logo.jpg') }}" alt=""> --}}
            </a>
        </div>
        <div class="p-1 flex flex-row items-center">
            {{-- <a href="https://github.com/tailwindadmin/admin" class="text-white p-2 mr-2 no-underline hidden md:block lg:block">Github</a> --}}


            <div id="btnProfileDropdown" class="inline-block flex">
                {{-- <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt=""> --}}
                {{-- <img class="h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt=""> --}}
                <img class="h-8 w-8 rounded-full"
                    src="
                        @if (isset(auth()->user()->photo))
                            @if (str_contains(auth()->user()->photo, '//'))
                                {{-- Photo do factory --}}
                                {{auth()->user()->photo}}
                            @else
                                {{-- Photo inserida pelo user --}}
                                {{Storage::url(auth()->user()->photo)}}
                            @endif
                        @else
                            {{-- Sem photo de nada! --}}
                            {{Storage::url('imgs/sem-foto.png')}}
                        @endif
                    ">
                {{-- <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Adam Wathan</a> --}}
                <a href="#" class="text-white p-2 no-underline hidden md:block lg:block">{{ucwords(auth()->user()->name)}}</a>

                <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                    <ul class="list-reset">
                    <li><a href="{{route('funcionarios.show', auth()->user()->id)}}" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Minha conta</a></li>
                    <li><hr class="border-t mx-2 border-grey-ligght"></li>
                    <li><a href="{{route('login.logout')}}" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!--/Header-->
