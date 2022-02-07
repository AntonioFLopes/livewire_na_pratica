<div class="max-w-7xl mx-auto py-15 px-4">
    <x-slot name="header">Planos</x-slot>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-12 lg:-mx-12">
            <div class="py-2 align-middle inline-block w-full sm:px-12 lg:px-12">
                <div class="w-full mx-auto text-right mb-4 py-3">
                    <a href="{{route('plans.create')}}"
                       class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">Cadastrar Plano</a>
                </div>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Plano
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Valor
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Criado Em
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <!-- TO-DO: receber planos do componente-->

                        @foreach($plans as $plan)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$plan->id}}</div>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$plan->name}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">R$ {{number_format($plan->price,2,',','.')}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$plan->created_at->format('d/m/Y H:i:s')}}
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
