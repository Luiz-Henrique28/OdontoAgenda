<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes dos Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- card 1 -->
                    <div class="container mx-auto p-2 overflow-x-auto">
                        <div class="flex flex-wrap gap-4">
                            <!-- Card 1 -->
                            <div class="bg-white shadow-md rounded-lg p-6 sm:w-1/2 lg:w-1/4 
                            cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                onclick="window.location.href=`{{ route('pacientes.index') }}`">
                                <h3 class="text-lg font-semibold">Total de Pacientes</h3>
                                <p class="text-2xl font-bold"> {{ count($pacientes) }} </p>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white shadow-md rounded-lg p-6 sm:w-1/2 lg:w-1/4 
                            cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                onclick="window.location.href=`{{ route('paciente.create') }}`">
                                <h3 class="text-lg font-semibold">Cadastrar</h3>
                                <p class="text-2xl font-bold">Paciente</p>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto mt-4">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Data de Nascimento</th>
                                    <th class="px-4 py-2">Telefone</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pacientes as $paciente)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">
                                        <a href=" {{  route('paciente.show', $paciente->id)  }} " class="text-blue-500 hover:underline">
                                            {{ $paciente->nome }}
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($paciente['data_nascimento'])->format('d/m/Y')  }}</td>

                                    <td class="border px-4 py-2">{{ $paciente->telefone }}</td>
                                    <td class="border px-4 py-2">{{ $paciente->email }}</td>

                                    <td class="border px-4 py-2 text-red-500">
                                        <form action="{{ route('paciente.delete', $paciente->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este paciente?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">X</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>