<!-- Centered With a Form Modal -->
<div id='centeredFormModal' class="modal-wrapper @if ($errors->any()) modal-is-open @endif">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
               <div class="flex justify-between items-center">
                    CADASTRAR EMPRÉSTIMO
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
               </div>
            </div>
            <!-- Modal content -->
            <form id='form_id' class="w-full" method="post" action="#">
                @csrf

                {{-- Linha 1 :: Estudante --}}
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-full px-3 mb-1 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="name">
                            Estudante
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2 pr-6 rounded leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                id="name" name="name">
                                    <option value="{{null}}">Selecione um estudante</option>
                                    @foreach ($estudantes as $e)
                                        <option value="{{$e->name}}">{{ucwords($e->name)}}</option>
                                    @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Linha 2 :: Livro --}}
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-full px-3 mb-1 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="titulo">
                            Livro
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2 pr-6 rounded leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                id="titulo" name="titulo">
                                    <option value="{{null}}">Selecione um livro</option>
                                    @foreach ($livros as $l)
                                        <option value="{{$l->titulo}}">{{ucwords($l->titulo)}}</option>
                                    @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Linha 3 :: Data de devolução --}}
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-full px-3 mb-1 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="devolucao">
                            Data de devolução
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600" id="devolucao" name="devolucao" type="date" placeholder="Data de devolução" disabled value="{{ date('Y-m-d', strtotime('+15 days')) }}">
                    </div>
                </div>

                <div class="mt-3">
                    <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'>Emprestar</button>
                    <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                        Fechar
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
