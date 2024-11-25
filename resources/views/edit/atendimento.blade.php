<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Atendimento') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="p-6 bg-white shadow-lg rounded-lg max-w-2xl w-full">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Editar Atendimento</h1>

            <form action="{{ route('atendimento.update', $atendimento->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Paciente -->
                <div>
                    <label for="paciente_id" class="block text-sm font-medium text-gray-700">Paciente</label>
                    <select
                        id="paciente_id"
                        name="paciente_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                        @foreach ($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ $paciente->id == $atendimento->paciente_id ? 'selected' : '' }}>
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
                        @foreach ($dentistas as $dentista)
                        <option value="{{ $dentista->id }}" {{ $dentista->id == $atendimento->dentista_id ? 'selected' : '' }}>
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
                        <option value="consulta" {{ $atendimento->tipo == 'consulta' ? 'selected' : '' }}>Consulta</option>
                        <option value="tratamento" {{ $atendimento->tipo == 'tratamento' ? 'selected' : '' }}>Tratamento</option>
                    </select>
                </div>

                <!-- Data de Início -->
                <div>
                    <label for="data_inicio" class="block text-sm font-medium text-gray-700">Data de Início</label>
                    <input
                        type="date"
                        id="data_inicio"
                        name="data_inicio"
                        value="{{ old('data_inicio', \Carbon\Carbon::parse($atendimento->data_inicio)->format('Y-m-d')) }}"
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
                        value="{{ old('data_fim', \Carbon\Carbon::parse($atendimento->data_fim)->format('Y-m-d')) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select
                        id="status"
                        name="status"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                        <option value="agendado" {{ $atendimento->status == 'agendado' ? 'selected' : '' }}>Agendado</option>
                        <option value="cancelado" {{ $atendimento->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        <option value="concluido" {{ $atendimento->status == 'concluido' ? 'selected' : '' }}>Concluído</option>
                        <option value="em andamento" {{ $atendimento->status == 'em andamento' ? 'selected' : '' }}>Em Andamento</option>
                    </select>
                </div>

                <!-- Observações -->
                <div>
                    <label for="observacoes" class="block text-sm font-medium text-gray-700">Observações</label>
                    <textarea
                        id="observacoes"
                        name="observacoes"
                        rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('observacoes', $atendimento->observacoes) }}</textarea>
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
                        Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>