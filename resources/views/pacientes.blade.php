<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Usuário') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6 max-w-2xl bg-white shadow rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Editar Usuário</h1>

    <form method="POST" class="space-y-6">
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
                required
            >
        </div>

        <!-- E-mail -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $paciente->email) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                required
            >
        </div>

        <!-- Telefone -->
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $paciente->phone) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
        </div>

        <!-- Botão de Salvar -->
        <div class="flex justify-end">
            <button
                type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Salvar Alterações
            </button>
        </div>
    </form>
</div>

</x-app-layout>