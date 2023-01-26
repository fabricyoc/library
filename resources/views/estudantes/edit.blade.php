@extends('_layouts2.default')

@section('content')
<!-- Stats Row Starts Here -->
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-full mx-2">
        <div class="p-4 flex flex-col">
            <a href="#" class="no-underline text-white text-2xl font-bold">
                Estudantes
            </a>
        </div>
    </div>
</div>
<!-- Stats Row Starts Here -->


<form action="{{route('estudantes.update', $user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!--Grid Form User-->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-4">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex-wrap">
                {{-- Form Grid --}}
                <img src="@if (isset($user->photo))
                            {{Storage::url($user->photo)}}
                        @else
                            {{Storage::url('imgs/sem-foto.png')}}
                        @endif"
                    alt="Sem foto" class="w-24 mx-auto p-2 rounded-full "
                >
                <div class="tracking-wide font-bold text-lg text-center">
                    {{ucwords($user->name)}}
                </div>
            </div>
            <div class="p-3">
                {{-- <form class="w-full"> --}}
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
                                id="name" name="name" type="text" placeholder="Nome do estudante" value="{{old('name', $user->name)}}">

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
                                id="email" name="email" type="text" placeholder="estudante@eeccam.com" value="{{old('email', $user->email)}}">
                            @error('email')
                                <p class="text-red-500 text-xs italic">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div>

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
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="password">
                                Senha
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
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="confirmPassword">
                                Confirme sua senha
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-grey-darker border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600
                                    @if ($errors->has('confirmPassword'))
                                        border-red-500
                                    @else
                                        border-gray-200
                                    @endif"
                                id="confirmPassword" name="confirmPassword" type="password" placeholder="Digite sua senha novamente">
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
                                        <option class="bg-gray-400" value="@if(isset($user->endereco)){{old('numero', $user->endereco->bairro)}}
                                            @endif">@if(isset($user->endereco)){{old('numero', $user->endereco->bairro)}}
                                            @endif</option>
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
                                id="cep" name="cep" type="text" placeholder="Digite o CEP" value="@if(isset($user->endereco)){{old('cep', $user->endereco->cep)}}@endif">

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
                                        (Anexo existente)
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
                    <div class="mt-3">
                        <button type="submit" class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'>
                            Editar
                        </button>
                        <a href="{{route('estudantes.index')}}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voltar</button>
                        </a>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
    <!--/Grid Form Endereço-->
</form>

@endsection