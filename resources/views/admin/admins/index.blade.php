@extends('admin.layouts.app')

@section('title', 'Administradores')

@section('content')

<h1 class="text-3xl text-black pb-6">
    Administradores
    <a href="{{ route('admins.create') }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
        <i class="fas fa-plus"></i>
    </a>
</h1>

<div class="w-full mt-12">

    @include('admin.includes.form-search', ['routerName' => 'admins.index'])

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
                        E-mail
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Data de Criação
                    </th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($admins as $admin)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-full h-full rounded-full"
                                    src="{{ $admin->image ?? url('images/user.png') }}"
                                    alt="{{ $admin->name }}" />
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $admin->name }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $admin->email }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">
                            {{ $admin->created_at }}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('admins.show', $admin->id) }}">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <span class="relative">Detalhes</span>
                            </span>
                        </a>
                        <a href="{{ route('admins.change.image', $admin->id) }}">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
                                <span class="relative">Imagem</span>
                            </span>
                        </a>
                        <a href="{{ route('admins.edit', $admin->id) }}">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                <span class="relative">Editar</span>
                            </span>
                        </a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="1000">
                            Sem nenhum administrador
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@endsection
