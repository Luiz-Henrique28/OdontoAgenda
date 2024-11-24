<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cadastrar Usuário') }}
            </h2>
        </x-slot>

        <div class="min-h-screen flex items-center justify-center bg-gray-100">
            <div class="p-6 bg-white shadow-lg rounded-lg max-w-2xl w-full">
                <h1 class="text-2xl font-bold mb-6 text-gray-800">Novo Usuário</h1>

                <form method="POST" action="" class="space-y-6">
                    @csrf

                    <!-- Nome -->
                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            value="{{ old('nome') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
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
                            value="{{ old('telefone') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <!-- Senha -->
                    <div>
                        <label for="senha" class="block text-sm font-medium text-gray-700">Senha</label>
                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                    </div>

                    <!-- Confirmação de Senha -->
                    <div>
                        <label for="senha_confirmation" class="block text-sm font-medium text-gray-700">Confirme a Senha</label>
                        <input
                            type="password"
                            id="senha_confirmation"
                            name="senha_confirmation"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                    </div>

                    <!-- Papel -->
                    <div>
                        <label for="papel" class="block text-sm font-medium text-gray-700">Papel</label>
                        <select
                            id="papel"
                            name="papel"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                            <option value="gestor" {{ old('papel') == 'gestor' ? 'selected' : '' }}>Gestor</option>
                            <option value="recepcionista" {{ old('papel') == 'recepcionista' ? 'selected' : '' }}>Recepcionista</option>
                        </select>
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
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>