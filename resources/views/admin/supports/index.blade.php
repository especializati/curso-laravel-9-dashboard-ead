@extends('admin.layouts.app')

@section('title', 'Dúvidas dos Alunos')

@section('content')

<h1 class="text-3xl text-black pb-6">
    Dúvidas dos Alunos
</h1>

<div class="w-full mt-12">

    <form action="" method="get" class="w-full max-w-lg">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="input-group relative flex flex-wrap items-stretch w-full md:w-1/2">
                <select name="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @foreach ($statusOptions as $status)
                        <option
                            value="{{ $status->name }}"
                            @if (request('status') == $status->name) selected @endif
                            >{{ $status->value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-1/2">
                <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-4 px-4 rounded">Filtrar</button>
            </div>
        </div>
    </form>

    <div class="bg-white overflow-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Aluno
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Aula
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($supports as $support)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                @if (isset($support->user['image']))
                                    <img class="w-full h-full rounded-full"
                                        src="{{ url("storage/{$support->user['image']}") }}"
                                        alt="{{ $support->user['name'] }}" />
                                @endif
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $support->user['name'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $support->lesson['name'] ?? '-' }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('supports.show', $support->id) }}">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">Detalhes</span>
                            </span>
                        </a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="1000">
                            Sem nenhuma dúvida
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@endsection
