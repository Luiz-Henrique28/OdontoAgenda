<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Atendimento') }}
        </h2>
    </x-slot>

    <!-- Classe para centralizar ao centro -->
    <div class="mt-8 flex items-center justify-center bg-gray-100">
        <div class="p-6 bg-white shadow-lg rounded-lg max-w-2xl w-full">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Novo Atendimento</h1>

            <!-- Exibição de erros -->
            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('atendimento.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Paciente -->
                <div>
                    <label for="paciente_id" class="block text-sm font-medium text-gray-700">Paciente</label>
                    <select
                        id="paciente_id"
                        name="paciente_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                        <option value="" disabled selected>Selecione um paciente</option>
                        @foreach ($pacientes as $paciente)
                            <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                {{ $paciente->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Dentista -->
                <div>
                    <label for="dentista_id" class="block text-sm font-medium text-gray-700">Dentista</label>
                    <select
                        id="dentista_id"
                        name="dentista_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                        <option value="" disabled selected>Selecione um dentista</option>
                        @foreach ($dentistas as $dentista)
                            <option value="{{ $dentista->id }}" {{ old('dentista_id') == $dentista->id ? 'selected' : '' }}>
                                {{ $dentista->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tipo -->
                <div>
                    <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <select
                        id="tipo"
                        name="tipo"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                        <option value="" disabled selected>Selecione o tipo de atendimento</option>
                        <option value="consulta" {{ old('tipo') == 'consulta' ? 'selected' : '' }}>Consulta</option>
                        <option value="tratamento" {{ old('tipo') == 'tratamento' ? 'selected' : '' }}>Tratamento</option>
                    </select>
                </div>

                <!-- Data de Início -->
                <div>
                    <label for="data_inicio" class="block text-sm font-medium text-gray-700">Data de Início</label>
                    <input
                        type="date"
                        id="data_inicio"
                        name="data_inicio"
                        value="{{ old('data_inicio') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Data de Fim -->
                <div>
                    <label for="data_fim" class="block text-sm font-medium text-gray-700">Data de Fim</label>
                    <input
                        type="date"
                        id="data_fim"
                        name="data_fim"
                        value="{{ old('data_fim') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Botões -->
                <div class="flex justify-between">
                    <a
                        href="{{ route('atendimentos.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancelar
                    </a>
                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
