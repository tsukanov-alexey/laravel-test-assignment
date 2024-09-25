@extends('layout')

@section('title', 'Поиск')

@section('main')
    <div class="container mx-auto my-10">
        <h1 class="text-center text-3xl font-semibold mb-4">
            Поиск пользователей
        </h1>
        <div class="md:w-1/2 mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form id="search-form">
                    <div class="flex">
                        <input type="text" id="query" placeholder="Введите имя или его часть..." required
                            class="w-full px-4 py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Найти
                        </button>
                    </div>
                </form>

                @if (isset($users))
                    @if (count($users) > 0)
                        <ul id="users">
                        
                        </ul>
                    @else
                        <p>Пользователи с таким именем не найдены...</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection