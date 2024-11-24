<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes dos Dentistas') }}
        </h2>
    </x-slot>

    <div class="py-12">

        @if (session('success'))
        <div class="fixed top-4 right-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded shadow-md flex items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 17h0m8-1V5a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2h3l4 4 4-4h3a2 2 0 002-2z" />
            </svg>
            <span>{{ session('success') }}</span>
            <button class="ml-4 text-blue-500 hover:text-blue-700" onclick="this.parentElement.remove();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        @endif



        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- card 1 -->
                    <div class="container mx-auto p-2 overflow-x-auto">
                        <div class="flex flex-wrap gap-4">
                            <!-- Card 1 -->
                            <div class="bg-white shadow-md rounded-lg p-6 sm:w-1/2 lg:w-1/4 
                            cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                onclick="window.location.href=`{{ route('dentistas.index') }}`">
                                <h3 class="text-lg font-semibold">Total de Dentista</h3>
                                <p class="text-2xl font-bold"> {{ count($dentistas) }} </p>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white shadow-md rounded-lg p-6 sm:w-1/2 lg:w-1/4 
                            cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                onclick="window.location.href=`{{ route('dentista.create') }}`">
                                <h3 class="text-lg font-semibold">Cadastrar</h3>
                                <p class="text-2xl font-bold">Dentista</p>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto mt-4">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Especialidade</th>
                                    <th class="px-4 py-2">Telefone</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dentistas as $dentista)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">
                                        <a href=" {{  route('dentista.show', $dentista->id)  }} " class="text-blue-500 hover:underline">
                                            {{ $dentista->nome }}
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2">{{ $dentista->especialidade }}</td>

                                    <td class="border px-4 py-2">{{ $dentista->telefone }}</td>
                                    <td class="border px-4 py-2">{{ $dentista->email }}</td>

                                    <td class="border px-4 py-2 text-red-500">
                                        <form action="{{ route('dentista.delete', $dentista->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este Dentista?');">
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