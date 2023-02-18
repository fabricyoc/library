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
            <div class="no-underline text-white text-2xl font-bold" title="Editar informações do funcionário">
                Editar
            </div>
        </div>
    </div>
</div>
<!-- Stats Row Starts Here -->

<form action="{{route('funcionarios.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!--Grid Form User-->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-4">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
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
                {{-- <form class="w-full"> --}}
                    {{-- Name, CPF e E-mail --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        {{-- Name --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
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
                                id="name" name="name" type="text" placeholder="Nome do funcionário" value="{{old('name', $user->name)}}">

                                @error('name')
                                    <p class="text-red-500 text-xs italic">
                                        {{$message}}
                                    </p>
                                @enderror

                        </div>
                        {{-- CPF --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
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
                                id="cpf" name="cpf" type="text" placeholder="123.456.789-77" maxlength="14" minlength="14" value="{{old('cpf', $user->cpf)}}">
                            @error('cpf')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        {{-- E-mail --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
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
                                id="email" name="email" type="text" placeholder="funcionario@eeccam.com" value="{{old('email', $user->email)}}">
                            @error('email')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- Telephone, birthDate, photo --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        {{-- Telephone --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
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
                                id="telephone" name="telephone" type="text" placeholder="(00)9.1111-2222" maxlength="14" minlength="14" value="{{old('telephone', $user->telephone)}}">
                            @error('telephone')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        {{-- birthDate --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="birthDate">
                                Data de Nascimento
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border-gray-200 border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                id="birthDate" name="birthDate" type="date" value="{{old('birthDate', $user->birthDate)}}">
                            @error('birthDate')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        {{-- photo --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="photo">
                                Foto
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border-gray-200 border rounded py-2.5 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                id="photo" name="photo" type="file">
                            @error('photo')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- Type, password, confirmPassword --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        {{-- Type --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="type">
                                Tipo de Conta
                            </label>
                            <div class="flex appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                @if ($errors->has('type'))
                                    border-red-500
                                @else
                                    border-gray-200
                                @endif"
                            >
                                <input type="radio" id="admin" name="type" value="admin" @if ($user->type == 'admin')
                                    checked
                                @endif>
                                <label for="admin">Funcionário</label><br>

                                <input class="ml-3" type="radio" id="common" name="type" value="common" @if ($user->type == 'common')
                                checked
                                @endif>
                                <label for="common">Estudante</label><br>
                            </div>

                            @error('type')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        {{-- Password --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="password">
                                Nova senha
                                <svg id="verPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="flex ml-1 w-4 h-4 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </label>

                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('password'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="password" name="password" type="password" placeholder="Digite sua senha">

                            @error('password')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        {{-- Confirm password --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="flex block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="confirmPassword">
                                Confirme sua nova senha
                                <svg id="verConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="flex ml-1 w-4 h-4 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('confirmPassword'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="confirmPassword" name="confirmPassword" type="password" placeholder="Digite sua senha novamente">

                            <p id="senhasDiferentes" class="text-red-500 text-xs italic"></p>
                            @error('confirmPassword')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    <!--/Grid Form User-->



    <!--Grid Form Endereço-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-4">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex-wrap tracking-wide font-bold text-lg text-center">
                ENDEREÇO
            </div>
            <div class="p-3">
                {{-- <form class="w-full"> --}}
                    {{-- Logradouro, Número e Bairro --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        {{-- Logradouro --}}
                        <div class="w-full md:w-1/2 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="logradouro">
                                Logradouro
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('logradouro'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="logradouro" name="logradouro" type="text" placeholder="Digite o logradouro" value="@if(isset($user->endereco)){{old('logradouro', $user->endereco->logradouro)}}@endif">

                                @error('logradouro')
                                    <p class="text-red-500 text-xs italic">
                                        {{$message}}
                                    </p>
                                @enderror
                        </div>
                        {{-- Número --}}
                        <div class="w-full md:w-1/6 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="numero">
                                Número
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('numero'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="numero" name="numero" type="text" placeholder="Nº da residência" value="@if(isset($user->endereco)){{old('numero', $user->endereco->numero)}}@endif">

                                @error('numero')
                                    <p class="text-red-500 text-xs italic">
                                        {{$message}}
                                    </p>
                                @enderror
                        </div>
                        {{-- Bairro --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="bairro">
                                Bairro
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-2 pr-6 rounded leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                    id="bairro" name="bairro">
                                        <option class="bg-gray-400" value="@if(isset($user->endereco)){{old('numero', $user->endereco->bairro)}}@else {{null}} @endif">@if(isset($user->endereco)){{old('numero', $user->endereco->bairro)}}@else Selecione um bairro @endif</option>
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
                    </div>

                    {{-- Cidade, CEP, Referência e Comprovante --}}
                    <div class="flex flex-wrap -mx-3 mb-2">
                        {{-- Cidade --}}
                        <div class="w-full md:w-1/6 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="cidade">
                                Cidade
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('cidade'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="cidade" name="cidade" type="text" placeholder="Digite a cidade" value="@if(isset($user->endereco)){{old('cidade', $user->endereco->cidade)}}@endif">

                                @error('cidade')
                                    <p class="text-red-500 text-xs italic">
                                        {{$message}}
                                    </p>
                                @enderror
                        </div>
                        {{-- CEP --}}
                        <div class="w-full md:w-1/6 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="cep">
                                CEP
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('cep'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="cep" name="cep" type="text" placeholder="Digite o CEP" maxlength="9" value="@if(isset($user->endereco)){{old('cep', $user->endereco->cep)}}@endif">

                                @error('cep')
                                    <p class="text-red-500 text-xs italic">
                                        {{$message}}
                                    </p>
                                @enderror
                        </div>
                        {{-- Referência --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="referencia">
                                Referência
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-3 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('referencia'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="referencia" name="referencia" type="text" placeholder="Digite a referência" value="@if(isset($user->endereco)){{old('referencia', $user->endereco->referencia)}}@endif">
                                @error('cep')
                                    <p class="text-red-500 text-xs italic">
                                        {{$message}}
                                    </p>
                                @enderror
                        </div>
                        {{-- Comprovante --}}
                        <div class="w-full md:w-1/3 px-3 mb-2 md:mb-1">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1 flex justify-between" for="comprovante">
                                Comprovante
                                @if (isset($user->endereco->comprovante))
                                    <div class="text-green-500">
                                        <a target="_blank" href="
                                            @if (str_contains($user->endereco->comprovante, 'http'))
                                                {{$user->endereco->comprovante}}
                                            @else
                                                {{Storage::url($user->endereco->comprovante)}}
                                            @endif"
                                        >
                                            (Anexo existente)
                                        </a>
                                    </div>
                                @else
                                    <div class="text-red-500">
                                        (Não existe)
                                    </div>
                                @endif
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border-gray-200 border rounded py-2.5 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                id="comprovante" name="comprovante" type="file">
                            @error('comprovante')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>

                    {{-- Botões --}}
                    <div class="mt-3 flex justify-between">
                        <div>
                            <button type="submit" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'>
                                Editar
                            </button>
                            <a href="{{ route('funcionarios.index') }}">
                                <input type="button" value="Voltar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('funcionarios.destroy', $user->id) }}">
                                <input type="button" value="Excluir" class='bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded cursor-pointer' title="Essa ação excluirá o registro do funcionário">
                            </a>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    <!--/Grid Form Endereço-->
</form>

@endsection
