<!--Sidebar-->
<aside id="sidebar" class="bg-side-nav w-2/5 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
    <ul class="list-reset flex flex-col">
        {{-- Dashboard --}}
        <a href="{{ route('dashboard.index') }}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
            <li
                @if (Request::url() == 'http://localhost:8000/dashboard')
                    class="w-full h-full py-3 px-2 border-b border-light-border bg-white"
                @else
                    class="w-full h-full py-3 px-2 border-b border-light-border"
                @endif
            >

                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                Dashboard
                <span><i class="fas fa-angle-right float-right"></i></span>
            </li>
        </a>

        {{-- estudantes --}}
        <a href="{{ route('estudantes.index') }}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
            <li
                @if (str_contains(Request::url(), 'http://localhost:8000/dashboard/estudantes'))
                    class="w-full h-full py-3 px-2 border-b border-light-border bg-white"
                @else
                    class="w-full h-full py-3 px-2 border-b border-light-border"
                @endif
            >

                <i class="fas fa-graduation-cap float-left mx-2"></i>
                Estudantes
                <span><i class="fa fa-angle-right float-right"></i></span>
            </li>
        </a>

        {{-- Funcionários --}}
        <a href="{{ route('funcionarios.index') }}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
            <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <i class="fas fa-user float-left mx-2"></i>
                    Funcionários
                    <span><i class="fa fa-angle-right float-right"></i></span>
            </li>
        </a>

        {{-- Livros --}}
        <a href="{{route('livros.index')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
            <li @if (str_contains(Request::url(), 'http://localhost:8000/dashboard/livros'))
                    class="w-full h-full py-3 px-2 border-b border-light-border bg-white"
                @else
                    class="w-full h-full py-3 px-2 border-b border-light-border"
                @endif
            >
                    <i class="fas fa-book float-left mx-2"></i>
                    Livros
                    <span><i class="fa fa-angle-right float-right"></i></span>
            </li>
        </a>

        {{-- Empréstimos --}}
        <a href="{{route('emprestimos.index')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
            <li @if (str_contains(Request::url(), 'http://localhost:8000/dashboard/emprestimos'))
                    class="w-full h-full py-3 px-2 border-b border-light-border bg-white"
                @else
                    class="w-full h-full py-3 px-2 border-b border-light-border"
                @endif
            >
                <i class="fas fa-book-open float-left mx-2"></i>
                Empréstimos
                <span><i class="fa fa-angle-right float-right"></i></span>
            </li>
        </a>
    </ul>
</aside>
<!--/Sidebar-->
