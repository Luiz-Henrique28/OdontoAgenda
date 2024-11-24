<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container mx-auto p-2 overflow-x-auto">
                        <div class="flex flex-wrap gap-4">
                            <!-- Card 1 -->
                            <div class="bg-white shadow-md rounded-lg p-6 w-full sm:w-1/2 lg:w-1/4 
                            cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                            onclick="window.location.href=`{{ route('pacientes.index') }}`">
                                <h3 class="text-lg font-semibold">Total de Pacientes</h3>
                                <p class="text-2xl font-bold">{{ $dados['totalPacientes'] }}</p>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-white shadow-md rounded-lg p-6 w-full sm:w-1/2 lg:w-1/4
                            cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                            onclick="window.location.href=`{{ route('dentistas.index') }}`">
                                <h3 class="text-lg font-semibold">Total de Dentistas</h3>
                                <p class="text-2xl font-bold">{{ $dados['totalDentistas'] }}</p>
                            </div>

                            <!-- Card 3 -->
                            <div class="bg-white shadow-md rounded-lg p-6 w-full sm:w-1/2 lg:w-1/4 
                            cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                            onclick="window.location.href=`{{ route('atendimentos.index') }}`">
                                <h3 class="text-lg font-semibold">Consultas Agendadas Hoje</h3>
                                <p class="text-2xl font-bold">{{ $dados['consultasAgendadas'] }}</p>
                            </div>

                            <!-- Card 4 -->
                            <div class="bg-white shadow-md rounded-lg p-6 w-full sm:w-1/2 lg:w-1/4 ">
                                <h3 class="text-lg font-semibold">Outro Card</h3>
                                <p class="text-2xl font-bold">42</p>
                            </div>
                        </div>
                    </div>


                    <!-- Lista de Atendimentos Próximos -->
                    <div class="overflow-x-auto mt-4">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">Paciente</th>
                                    <th class="px-4 py-2">Data</th>
                                    <th class="px-4 py-2">Dentista</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dados['atendimentosProximos'] as $atendimento)
                                <tr class="text-center">
                                    <!-- Nome do Paciente como Link -->
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('paciente.show', $atendimento['paciente']['id']) }}" class="text-blue-500 hover:underline">
                                            {{ $atendimento['paciente']['nome'] }}
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($atendimento['data_inicio'])->format('d/m/Y') }}</td>
                                    <td class="border px-4 py-2">{{ $atendimento['dentista']['nome'] }}</td>
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