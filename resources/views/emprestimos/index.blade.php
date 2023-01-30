@extends('_layouts2.default')

@section('content')
<!-- Stats Row Starts Here -->
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="shadow-lg bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-full mx-2">
        <div class="p-4 flex flex-col">
            <a href="#" class="no-underline text-white text-2xl font-bold">
                Empréstimos
            </a>
        </div>
    </div>
</div>
<!-- Stats Row Starts Here -->



<!--Grid Form-->
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-4 mt-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b flex justify-between">
            <div >
                Full table
            </div>
            <div title="Cadastrar empréstimo">
                <button data-modal="centeredFormModal" class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="p-3">
            <table class="table-responsive w-full rounded">
                <thead>
                  <tr>
                    <th class="border w-1/6 px-4 py-2">Estudante</th>
                    <th class="border w-1/4 px-4 py-2">Livro</th>
                    <th class="border w-1/4 px-4 py-2">Devolução</th>
                    <th class="border w-1/6 px-4 py-2" title="É possível renovar?">Renovação</th>
                    <th class="border w-1/5 px-4 py-2">Ações</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">Nome do estudante</td>
                        <td class="border px-4 py-2">Título do livro</td>
                        <td class="border px-4 py-2">Data da devolução</td>
                        <td class="border px-4 py-2 text-center">É possível renovar?</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="#" title="Ver" class="bg-teal-300 cursor-pointer rounded-md p-1.5 mx-1 text-white">
                                    <i class="fas fa-eye sm:my-2.5"></i></a>
                            <a href="#" title="Editar" class="bg-teal-300 cursor-pointer rounded-md p-1.5 mx-1 text-white">
                                    <i class="fas fa-edit sm:my-2.5"></i></a>
                            <a title="Excluir" class="bg-teal-300 cursor-pointer rounded-md p-1.5 mx-1 text-red-500">
                                    <i class="fas fa-trash sm:my-2.5"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--/Grid Form-->



{{-- Modal create --}}
@include('emprestimos.create')
{{-- /Modal create --}}
@endsection
