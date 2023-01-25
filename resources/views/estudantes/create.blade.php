<!-- Centered With a Form Modal -->
<div id='centeredFormModal' class="modal-wrapper @if ($errors->any()) modal-is-open @endif">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
               <div class="flex justify-between items-center">
                    CADASTRAR ESTUDANTE
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
               </div>
            </div>
            <!-- Modal content -->
            <form id='form_id' class="w-full" method="post" action="{{route('estudantes.store')}}">
                @csrf
                {{-- Linha 1 --}}
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="name">
                            Nome
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                @if ($errors->has('name'))
                                    border-red-500
                                @else
                                    border-gray-200
                                @endif"
                            id="name" name="name" type="text" placeholder="Nome do estudante">

                            @error('name')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror

                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="cpf">
                            CPF
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @if ($errors->has('cpf'))
                                border-red-500
                            @else
                                border-gray-200
                            @endif"
                            id="cpf" name="cpf" type="text" placeholder="123.456.789-77" maxlength="14" minlength="14">
                        @error('cpf')
                            <p class="text-red-500 text-xs italic">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                </div>

                {{-- Linha 2 --}}
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="email">
                            E-mail
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                @if ($errors->has('email'))
                                    border-red-500
                                @else
                                    border-gray-200
                                @endif"
                            id="email" name="email" type="text" placeholder="estudante@eeccam.com">
                        @error('email')
                            <p class="text-red-500 text-xs italic">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="telephone">
                            Telefone
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                            @if ($errors->has('telephone'))
                                border-red-500
                            @else
                                border-gray-200
                            @endif"
                            id="telephone" name="telephone" type="text" placeholder="(00)9.1111-2222" maxlength="14" minlength="14">
                        @error('telephone')
                            <p class="text-red-500 text-xs italic">
                                {{$message}}
                            </p>
                        @enderror
                    </div>
                </div>

                {{-- Linha 3 --}}
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="logradouro">
                            Logradouro
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-3 mb-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="logradouro" name="logradouro" type="text" placeholder="Nome da rua">
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="numero">
                            Número
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                            id="numero" name="numero" type="text" placeholder="Nº da residência" maxlength="6">
                    </div>
                </div>

                {{-- Linha 4 --}}
                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="bairro">
                            Bairro
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2 pr-6 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="bairro" name="bairro">
                                    <option value="{{null}}">Selecione um bairro</option>
                                    <option value="Acampamento">Acampamento</option>
                                    <option value="Adjunto Dias">Adjunto Dias</option>
                                    <option value="Alto da Boa Vista">Alto da Boa Vista</option>
                                    <option value="Barra Nova">Barra Nova</option>
                                    <option value="Barra Nova II">Barra Nova II</option>
                                    <option value="Bento XVI">Bento XVI</option>
                                    <option value="Boa Passagem">Boa Passagem</option>
                                    <option value="Canuto e Filhos">Canuto e Filhos</option>
                                    <option value="Casas Populares">Casas Populares</option>
                                    <option value="Castelo Branco">Castelo Branco</option>
                                    <option value="Centro">Centro</option>
                                    <option value="Darcy Fonseca">Darcy Fonseca</option>
                                    <option value="Frei Damião">Frei Damião</option>
                                    <option value="Itans">Itans</option>
                                    <option value="Jardim Satélite - IPE">Jardim Satélite - IPE</option>
                                    <option value="João Paulo II">João Paulo II</option>
                                    <option value="João XXIII">João XXIII</option>
                                    <option value="Loteamento Graciosa">Loteamento Graciosa</option>
                                    <option value="Loteamento Santa Clara">Loteamento Santa Clara</option>
                                    <option value="Loteamento Serrote Branco">Loteamento Serrote Branco</option>
                                    <option value="Loteamento Serrote Branco II">Loteamento Serrote Branco II</option>
                                    <option value="Loteamento Serrote Branco III">Loteamento Serrote Branco III</option>
                                    <option value="Loteamento Severiano Alves dos Santos">Loteamento Severiano Alves dos Santos</option>
                                    <option value="Maynard">Maynard</option>
                                    <option value="Nova Caicó">Nova Caicó</option>
                                    <option value="Nova Descoberta">Nova Descoberta</option>
                                    <option value="Novo Horizonte">Novo Horizonte</option>
                                    <option value="Outro">Outro</option>
                                    <option value="Paraíba">Paraíba</option>
                                    <option value="Paulo VI">Paulo VI</option>
                                    <option value="Penedo">Penedo</option>
                                    <option value="Recreio">Recreio</option>
                                    <option value="Salviano Santos">Salviano Santos</option>
                                    <option value="Samanaú">Samanaú</option>
                                    <option value="Santa Costa">Santa Costa</option>
                                    <option value="Soledade">Soledade</option>
                                    <option value="Vila Altiva">Vila Altiva</option>
                                    <option value="Vila do Príncipe">Vila do Príncipe</option>
                                    <option value="Walfredo Gurgel">Walfredo Gurgel</option>
                                    <option value="Zona Rural">Zona Rural</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="referencia">
                            Referência
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                            id="referencia" name="referencia" type="text" placeholder="Ponto de referência">
                    </div>
                </div>

                <div class="mt-3">
                    <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'>Cadastrar</button>
                    <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                        Fechar
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
