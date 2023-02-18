@extends('_layouts2.default')

@section('content')
<!-- Stats Row Starts Here -->
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="shadow-lg bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-full mx-2">
        <div class="p-4 flex justify-between">
            <div class="no-underline text-white text-2xl font-bold">
                Funcionários
            </div>
            <div class="no-underline text-white text-2xl font-bold">
                ~
            </div>
            <div class="no-underline text-white text-2xl font-bold" title="Exibir informações do funcionário">
                Exibir
            </div>
        </div>
    </div>
</div>
<!-- Stats Row Starts Here -->





<form action="{{route('funcionarios.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!--Grid User-->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-4">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            {{-- Cabeçalho dos dados do funcionário --}}
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex-wrap">
                {{-- Form Grid --}}
                <img src="@if (isset($user->photo))
                            @if (str_contains($user->photo, 'http'))
                                {{$user->photo}}
                            @else
                                {{Storage::url($user->photo)}}
                            @endif
                        @else
                            {{Storage::url('imgs/sem-foto.png')}}
                        @endif"
                    alt="Sem foto" class="w-20 h-20 mx-auto rounded-full"
                >
                <div class="tracking-wide font-bold text-lg text-center">
                    {{ucwords($user->name)}}
                </div>
            </div>
            <div class="p-3">
                    {{-- Name, CPF e E-mail --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        {{-- Name --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="name">
                                Nome
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                                id="name" name="name" type="text" value="{{old('name', $user->name)}}" disabled>
                        </div>
                        {{-- CPF --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="cpf">
                                CPF
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                                id="cpf" name="cpf" type="text" maxlength="14" minlength="14" value="{{old('cpf', $user->cpf)}}" disabled>
                        </div>
                        {{-- E-mail --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="email">
                                E-mail
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                                id="email" name="email" type="text" value="{{old('email', $user->email)}}" disabled>
                        </div>
                    </div>

                    {{-- Telephone, birthDate, type --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        {{-- Telephone --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="telephone">
                                Telefone
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                                id="telephone" name="telephone" type="text"  maxlength="14" minlength="14" value="{{old('telephone', $user->telephone)}}" disabled>
                        </div>
                        {{-- birthDate --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="birthDate">
                                Data de Nascimento
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border-gray-200 border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                id="birthDate" name="birthDate" type="date" value="{{old('birthDate', $user->birthDate)}}" disabled>
                        </div>
                        {{-- Type --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="name">
                                Tipo de Conta
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200" type="text" value="@if($user->type == 'common')Estudante @else Funcionário @endif" disabled>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    <!--/Grid User-->



    <!--Grid Endereço-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-4">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex-wrap tracking-wide font-bold text-lg text-center">
                ENDEREÇO
            </div>
            <div class="p-3">
                    @if (!empty($user->endereco->logradouro))
                        {{-- Logradouro, Número e Bairro --}}
                        <div class="flex flex-wrap -mx-3 mb-2">
                            {{-- Logradouro --}}
                            <div class="w-full md:w-1/2 px-3 mb-2 md:mb-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="logradouro">
                                    Logradouro
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                                    id="logradouro" name="logradouro" type="text" value="@if(isset($user->endereco)){{old('logradouro', $user->endereco->logradouro)}}@endif" disabled>
                            </div>
                            {{-- Número --}}
                            <div class="w-full md:w-1/6 px-3 mb-2 md:mb-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="numero">
                                    Número
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                                    id="numero" name="numero" type="text" value="@if(isset($user->endereco)){{old('numero', $user->endereco->numero)}}@endif" disabled>
                            </div>
                            {{-- Bairro --}}
                            <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="bairro">
                                    Bairro
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                                    id="bairro" name="bairro" type="text" value="@if(isset($user->endereco)){{old('bairro', $user->endereco->bairro)}}@endif" disabled>
                            </div>
                        </div>

                        {{-- Cidade, CEP, Referência e Comprovante --}}
                        <div class="flex flex-wrap -mx-3 mb-2">
                            {{-- Cidade --}}
                            <div class="w-full md:w-1/6 px-3 mb-2 md:mb-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="cidade">
                                    Cidade
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                                    id="cidade" name="cidade" type="text" value="@if(isset($user->endereco)){{old('cidade', $user->endereco->cidade)}}@endif" disabled>
                            </div>
                            {{-- CEP --}}
                            <div class="w-full md:w-1/6 px-3 mb-2 md:mb-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="cep">
                                    CEP
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                                    id="cep" name="cep" type="text" maxlength="9" value="@if(isset($user->endereco)){{old('cep', $user->endereco->cep)}}@endif" disabled>
                            </div>
                            {{-- Referência --}}
                            <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="referencia">
                                    Referência
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200"
                                    id="referencia" name="referencia" type="text" value="@if(isset($user->endereco)){{old('referencia', $user->endereco->referencia)}}@endif" disabled>
                            </div>
                            {{-- Comprovante --}}
                            <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1 flex justify-between" for="comprovante">
                                    Comprovante
                                </label>
                                <div
                                    class="appearance-none block w-full bg-gray-200 text-grey-darker border-gray-200 border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                    id="comprovante" name="comprovante" disabled>
                                        @if (isset($user->endereco->comprovante))
                                            <div class="text-green-500 hover:underline hover:underline-offset-4">
                                                <a target="_blank" href="
                                                    @if (str_contains($user->endereco->comprovante, 'http'))
                                                        {{$user->endereco->comprovante}}
                                                    @else
                                                        {{Storage::url($user->endereco->comprovante)}}
                                                    @endif"
                                                >
                                                    Clique aqui para ver o anexo
                                                </a>
                                            </div>
                                        @else
                                            <div class="text-red-500">
                                                Anexo inexistente
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="flex flex-wrap -mx-3 mb-2">
                            {{-- Usuário sem endereço --}}
                            <div class="w-full md:w-full px-3 mb-2 md:mb-1">
                                <div class="appearance-none block w-full bg-red-200 text-red-600 text-center border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600 border-gray-200 tracking-wide hover:tracking-widest">
                                    Funcionário sem endereço
                                </div>
                            </div>
                        </div>
                    @endif


                    {{-- Botões --}}
                    <div class="mt-3 flex justify-between">
                        <div>
                            <a href="{{ url()->previous() }}">
                                <input type="button" value="Voltar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                            </a>

                        </div>
                        <div>
                            <a href="{{ route('funcionarios.edit', $user->id) }}">
                                <input type="button" value="Editar" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded cursor-pointer' title="Ir editar o funcionário">
                            </a>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    <!--/Grid Endereço-->
</form>

@endsection
