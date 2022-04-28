@extends('admin.layouts.app')

@section('title', 'Detalhes da Dúvida')

@section('content')

<div class="w-full">

    <div class="bg-white overflow-auto">
        <!-- component -->
        <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
            <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
            <div class="relative flex items-center space-x-4">
                <div class="relative">
                <img src="{{ $support->user->image ? url("storage/{$support->user->image}") : url('images/user.png') }}" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
                </div>
                <div class="flex flex-col leading-tight">
                    <div class="text-2xl mt-1 flex items-center">
                        <span class="text-gray-700 mr-3">
                            {{ $support->user->name }}
                        </span>
                    </div>
                </div>
            </div>
            </div>
            <div class="flex sm:items-center justify-between py-6 border-b-2 border-gray-200">
                <div class="relative flex items-center space-x-4">
                    <span class="text-gray-700 mr-3">
                        {{ $support->description }}
                    </span>
                </div>
            </div>
            <div class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">

                @foreach ($support->replies as $reply)
                    <div class="chat-message">
                        @php
                            $user = $reply->user ?? $reply->admin;
                        @endphp
                        @if ($user->id == $support->user->id)
                            <div class="flex items-end">
                                <div class="flex flex-col space-y-2 max-w-xs mx-2 order-2 items-start">
                                    <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">
                                        {{ $reply->description }}
                                    </span></div>
                                </div>
                                <img src="{{ $user->image ? url("storage/{$user->image}") : url('images/user.png') }}" class="w-6 h-6 rounded-full order-1">
                            </div>
                        @else
                            <div class="flex items-end justify-end">
                                <div class="flex flex-col space-y-2 max-w-xs mx-2 order-1 items-end">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">
                                    {{ $reply->description }}
                                </span></div>
                                </div>
                                <img src="{{ $user->image ? url("storage/{$user->image}") : url('images/user.png') }}" alt="My profile" class="w-6 h-6 rounded-full order-2">
                            </div>
                        @endif
                    </div>
                @endforeach
                {{-- @foreach ($support->replies as $reply)
                    @php
                        $whenRepliesdIsAuthor = $reply->user->id == $support->user->id;
                        $classeChatMessage = $whenRepliesdIsAuthor ? '' : 'justify-end';
                        $bgChat = $whenRepliesdIsAuthor ? 'bg-gray-300 text-gray-600' : 'bg-blue-600 text-white';

                        $orderImage = $whenRepliesdIsAuthor ? 'order-1' : 'order-2';
                        $orderText = $whenRepliesdIsAuthor ? 'order-2' : 'order-1';

                        $image = $reply->user->image ?  url("storage/{$reply->user->image}") : url('images/user.png');
                    @endphp
                    <div class="chat-message">
                        <div class="flex items-end {{ $classeChatMessage }}">
                            <div class="flex flex-col space-y-2 max-w-xs mx-2 {{ $orderText }} items-start">
                                <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none {{ $bgChat }}">{{ $reply->description }}</span></div>
                            </div>
                            <img src="{{ $image }}" class="w-6 h-6 rounded-full {{ $orderImage }}">
                        </div>
                    </div>
                @endforeach --}}

            </div>
            <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
            <div class="relative flex">
                <form action="{{ route('replies.store', $support->id) }}" method="post" class="w-full">
                    @csrf
                    <input type="hidden" name="support_id" value="{{ $support->id }}">
                    <input type="text" name="description" placeholder="Escreva a sua resposta" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-2 bg-gray-200 rounded-md py-3">
                    <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                        <button type="submit" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                            <span class="font-bold">Responder</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>


    </div>
</div>

@endsection
