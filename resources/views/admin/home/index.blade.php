@extends('admin.layouts.app')

@section('title', 'Home')

@section('content')
<h1 class="w-full text-3xl text-black pb-6">Dashboard</h1>

<div class="grid grid-cols-12 gap-6 mb-6">
    @include('admin.home._partials.statistic', [
        'total' => $totalUsers,
        'icon' => 'fas fa-users',
        'text' => 'Total Usuários'
    ])
    @include('admin.home._partials.statistic', [
        'total' => $totalAdmins,
        'icon' => 'fas fa-robot',
        'text' => 'Total Admins'
    ])
    @include('admin.home._partials.statistic', [
        'total' => $totalCourses,
        'icon' => 'fas fa-video',
        'text' => 'Total Cursos'
    ])
    @include('admin.home._partials.statistic', [
        'total' => $totalSupports,
        'icon' => 'fas fa-headset',
        'text' => 'Dúvidas Pendentes'
    ])
</div>
@endsection
