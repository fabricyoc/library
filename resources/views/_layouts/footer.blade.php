<div class="bottom-0 fixed w-full">
    <hr class="h-0.5 bg-cyan-100">
    <div class="text-sm flex flex-nowrap justify-between space-x-6 h-44 p-5">

        {{-- Logo da Escola com Endereço --}}
        <div class="flex space-x-2">
            <div>
                <img
                    class="w-40"
                    src="{{ Storage::url('imgs/logo.jpg') }}"
                    alt="Sem logo"
                >
            </div>
            <div>
                <ul>
                    <li class="font-bold">Escola Estadual Professora Calpúrnia Caldas de Amorim</li>
                    <li>Rua Manoel Gonçalves de Melo, nº 42</li>
                    <li>CEP 59300-000</li>
                    <li>Caicó/RN - Brasil</li>
                </ul>
            </div>
        </div>
        {{-- // Logo da Escola com Endereço --}}

        {{-- Redes Sociais --}}
        <div class="flex">
            <ul>
                <li class="font-bold" id="contatos">Contatos:</li>
                <li class="flex space-x-2 mt-1">
                    <a href="https://www.facebook.com/people/EECCAM/100063468046184/">
                        <img
                            class="w-12"
                            src="{{ Storage::url('imgs/facebook.png') }}"
                            alt="Sem logo"
                        >
                    </a>
                    <a href="https://www.instagram.com/eeccamoficial/">
                        <img
                            class="w-12"
                            src="{{ Storage::url('imgs/instagram.png') }}"
                            alt="Sem logo"
                        >
                    </a>
                    <a href="#">
                        <img
                            class="w-12"
                            src="{{ Storage::url('imgs/whatsapp.png') }}"
                            alt="Sem logo"
                        >
                    </a>
                </li>
            </ul>
        </div>
        {{-- // Redes Sociais --}}


        {{-- Informação do desenvolvedor --}}
        <div class="flex">
            <ul>
                <li class="font-bold">Desenvolvido por:</li>
                <li class="flex space-x-2 mt-1">
                    <a href="https://github.com/fabricyoc">
                        <img
                            class="w-12"
                            src="{{ Storage::url('imgs/github.png') }}"
                            alt="Sem logo"
                        >
                    </a>
                    <a href="https://www.instagram.com/fabricyoc/">
                        <img
                            class="w-12"
                            src="{{ Storage::url('imgs/instagram.png') }}"
                            alt="Sem logo"
                        >
                    </a>
                    <a href="https://www.linkedin.com/in/fabricyoc/">
                        <img
                            class="w-12"
                            src="{{ Storage::url('imgs/linkedin.png') }}"
                            alt="Sem logo"
                        >
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
