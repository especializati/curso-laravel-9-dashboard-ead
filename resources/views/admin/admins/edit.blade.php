@extends('admin.layouts.app')

@section('title', "Editar o Administrador {$admin->name}")

@section('content')
<h1 class="w-full text-3xl text-black pb-6">
    Editar o Administrador {{ $admin->name }}
</h1>

<div class="flex flex-wrap">
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('admins.update', $admin->id) }}" method="POST">
                @method('PUT')
                @include('admin.admins._partials.form')
            </form>
        </div>
    </div>
</div>
@endsection
