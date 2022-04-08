@extends('admin.layouts.app')

@section('title', "Editar o Módulo do Curso {$course->name}")

@section('content')
<h1 class="w-full text-3xl text-black pb-6">
    Editar o Módulo <strong>{{ $module->name }}</strong>
</h1>

<div class="flex flex-wrap">
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('modules.update', [$course->id, $module->id]) }}" method="POST">
                @method('PUT')
                @include('admin.courses.modules.partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
