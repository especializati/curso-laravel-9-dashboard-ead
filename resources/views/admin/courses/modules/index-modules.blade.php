@extends('admin.layouts.app')

@section('title', "Módulos do Curso {$course->name}")

@section('content')

<h1 class="text-3xl text-black pb-6">
    Módulos do Curso {{ $course->name }}
    <a href="{{ route('modules.create', $course->id) }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
        <i class="fas fa-plus"></i>
    </a>
</h1>

<div class="w-full mt-12">

    @include('admin.includes.form-search', [
        'routerName' => 'modules.index',
        'params' => $course->id
    ])

    <div class="bg-white overflow-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nome
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($modules as $module)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $module->name }}
                            </p>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('modules.show', [$course->id, $module->id]) }}">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">Detalhes</span>
                            </span>
                        </a>
                        <a href="{{ route('modules.edit', [$course->id, $module->id]) }}">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                <span class="relative">Editar</span>
                            </span>
                        </a>

                        <a href="{{ route('lessons.index', $module->id) }}">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
                                <span class="relative">Aulas</span>
                            </span>
                        </a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="1000">
                            Sem nenhum módulo
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@endsection
