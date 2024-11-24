<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Usuário') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="p-6 bg-white shadow-lg rounded-lg max-w-2xl w-full">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Editar Usuário</h1>

            <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nome -->
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        value="{{ old('nome', $paciente->nome) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Telefone -->
                <div>
                    <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                    <input
                        type="text"
                        id="telefone"
                        name="telefone"
                        value="{{ old('telefone', $paciente->telefone) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $paciente->email) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Endereço -->
                <div>
                    <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço</label>
                    <textarea
                        id="endereco"
                        name="endereco"
                        rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('endereco', $paciente->endereco) }}</textarea>
                </div>

                <!-- Histórico Médico -->
                <div>
                    <label for="historico_medico" class="block text-sm font-medium text-gray-700">Histórico Médico</label>
                    <textarea
                        id="historico_medico"
                        name="historico_medico"
                        rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('historico_medico', $paciente->historico_medico) }}</textarea>
                </div>

                <!-- Botões -->
                <div class="flex justify-between">
                    <a
                        href="{{ route('dashboard') }}"
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