<div class="max-w-7xl mx-auto py-15 px-4"><br>
    <h2 class="font-semibold text-2xl text-green-700">Lista de Registros</h2>
    <div class="w-full mx-auto text-right mb-4">
        <a href="{{route('expenses.create')}}"
           class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">Criar
            Registro</a>
    </div>

    @include('includes.message')

    <table class="table-auto w-full mx-auto">
        <thead>
        <tr class="text-left">
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">Descrição</th>
            <th class="px-4 py-2">Valor</th>
            <th class="px-4 py-2">Data Registro</th>
            <th class="px-4 py-2">Ações</th>
        </tr>
        </thead>

        <tbody>
        @foreach($expenses as $key => $exp)
            <tr @if($key % 2) class="bg-gray-200" @endif>
                <td class="px-4 py-2 border">{{$exp->id}}</td>
                <td class="px-4 py-2 border">{{$exp->description}}</td>
                <td class="px-4 py-2 border">
                    <span
                        class="@if($exp->type == 1) text-green-600 @else text-red-600 @endif">R$ {{number_format($exp->amount, 2, ',', '.')}} </span>
                </td>
                <td class="px-4 py-2 border">{{$exp->created_at->format('d/m/Y H:i:s')}}</td>
                <td class="px-4 py-4 border">
                    <a href="{{route('expenses.edit', $exp->id)}}" class="btn-sm btn-primary">Editar</a>
                    <a href="#"
                       onclick="return confirm('Você realmente deseja remover esse registro?') || event.stopImmediatePropagation()"
                       wire:click.prevent="remove({{$exp->id}})" class="btn-sm btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="w-full mx-auto mt-10">
        @if(count($expenses) > 0)
            {{$expenses->links()}}
        @endif
    </div>

</div>

