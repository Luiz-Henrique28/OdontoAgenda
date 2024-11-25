<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listar Atendimentos') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <!-- Mensagem de Sucesso -->
        @if (session('success'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md flex items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5 4V6a2 2 0 00-2-2H7a2 2 0 00-2 2v12a2 2 0 002 2h6" />
            </svg>
            <span>{{ session('success') }}</span>
            <button class="ml-4 text-green-500 hover:text-green-700" onclick="this.parentElement.remove();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @endif

        <!-- Mensagem de Erro -->
        @if (session('error'))
        <div class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-md flex items-center" role="alert">
            <span>{{ session('error') }}</span>
            <button class="ml-4 text-red-500 hover:text-red-700" onclick="this.parentElement.remove();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container mx-auto p-2 overflow-x-auto">
                        <div class="flex flex-wrap gap-4">

                            <!-- Card 1 -->
                            <div class="bg-white shadow-md rounded-lg p-6 sm:w-1/2 lg:w-1/4 
                            cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                onclick="window.location.href=`{{ route('atendimentos.index') }}`">
                                <h3 class="text-lg font-semibold">Total de atendimentos</h3>
                                <p class="text-2xl font-bold">{{ count($atendimentos) }}</p>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white shadow-md rounded-lg p-6 sm:w-1/2 lg:w-1/4
                            cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                onclick="window.location.href=`{{ route('atendimento.create') }}`">
                                <h3 class="text-lg font-semibold">Criar Atendimento</h3>
                                <p class="text-2xl font-bold"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Tabela de Atendimentos -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="px-4 py-2 border">Paciente</th>
                                    <th class="px-4 py-2 border">Dentista</th>
                                    <th class="px-4 py-2 border">Tipo</th>
                                    <th class="px-4 py-2 border">Data de Início</th>
                                    <th class="px-4 py-2 border">Status</th>
                                    <th class="px-4 py-2 border text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($atendimentos as $atendimento)
                                <tr>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('paciente.show', $atendimento->paciente_id) }}"
                                            class="text-blue-500 hover:underline">
                                            {{ $atendimento->paciente->nome }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-2 border">{{ $atendimento->dentista->nome }}</td>
                                    <td class="px-4 py-2 border">{{ ucfirst($atendimento->tipo) }}</td>
                                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($atendimento->data_inicio)->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 border">{{ ucfirst($atendimento->status) }}</td>
                                    <td class="px-4 py-2 border text-center">
                                        <a href="{{ route('atendimento.edit', $atendimento->id) }}"
                                            class="text-blue-500 hover:underline">Detalhes</a>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-2 text-center text-gray-500">Nenhum atendimento encontrado.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>