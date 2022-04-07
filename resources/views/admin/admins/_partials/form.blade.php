@include('admin.includes.alerts')

@csrf
<div class="">
    <label class="block text-sm text-gray-600" for="name">Nome</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Nome" aria-label="Name" name="name" value="{{ $admin->name ?? old('name') }}">
</div>
<div class="mt-2">
    <label class="block text-sm text-gray-600" for="email">E-mail</label>
    <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" id="email" type="email" placeholder="E-mail" aria-label="Email" name="email" value="{{ $admin->email ?? old('email') }}">
</div>
<div class="mt-2">
    <label class=" block text-sm text-gray-600" for="message">Senha</label>
    <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" type="password" placeholder="Senha" aria-label="Email" name="password">
</div>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Enviar</button>
</div>
