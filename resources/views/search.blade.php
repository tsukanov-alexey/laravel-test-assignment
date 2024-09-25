@extends('layout')

@section('title', 'Поиск')

@section('main')
    <div class="container mx-auto my-10">
        <h1 class="text-center text-3xl font-semibold mb-4">
            Поиск пользователей
        </h1>
        <div class="md:w-1/2 mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form id="search-form" action="{{ route('search') }}">
                    <div class="flex">
                        <input value="{{ old('query', isset($query) ? $query : '') }}"
                            type="text" name="query" id="query" placeholder="Введите имя или его часть..." required
                            class="w-full py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Найти
                        </button>
                    </div>
                    @error('query')
                        <p class="text-red-500 mt-1 text-center">{{ $message }}</p>
                    @enderror
                </form>

                @if (isset($users))
                    @if (count($users) > 0)
                        <ul id="users" class="mt-4">
                            @foreach ($users as $user)
                                <li class="flex items-center justify-between py-2">
                                    <span>{{ $user->name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-1 text-center">Пользователи с таким именем не найдены...</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection