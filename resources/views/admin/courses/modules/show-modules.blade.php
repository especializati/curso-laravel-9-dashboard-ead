@extends('admin.layouts.app')

@section('title', "Detalhes do Módulo <strong>{$module->name}")

@section('content')
<h1 class="w-full text-3xl text-black pb-6">
    Detalhes do Módulo <strong>{{ $module->name }}</strong>
</h1>

<div class="flex flex-wrap">
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('modules.destroy', [$course->id, $module->id]) }}" method="POST">
                <ul>
                    <li><strong>Nome: </strong>{{ $course->name }}</li>
                </ul>
                @method('DELETE')
                @csrf
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-red-900 rounded" type="submit">
                        Deletar o Módulo {{ $module->name }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
