@extends('layout')

@section('title', __('search.title'))

@section('main')
    <div class="container mx-auto my-10">
        <h1 class="text-center text-3xl font-semibold mb-4">
            {{ __('search.header') }}
        </h1>
        <div class="md:w-1/2 mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form id="search-form" action="{{ route('search') }}">
                    <div class="flex">
                        <input value="{{ old('query', isset($query) ? $query : '') }}"
                            type="text" name="query" id="query" placeholder="{{ __('search.placeholder') }}" required
                            class="w-full py-2 mr-2 rounded-lg border-gray-300 focus:outline-none focus:border-blue-500">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('search.find') }}
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
                                    <div>
                                        <button class="text-blue-500 hover:text-blue-700 store-btn">
                                            {{ __('search.add') }}
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mt-1 text-center">{{ __('search.not-found') }}</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.store-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                let name = btn.parentNode.parentNode.querySelector('span').innerText;

                btn.disabled = true;
                btn.classList.remove('text-blue-500', 'hover:text-blue-700');
                btn.classList.add('text-gray-500', 'cursor-default');

                axios.post("{{ route('users.store') }}", {"name": name})
                    .then(response => {
                        if (response.status === 201) {
                            btn.innerText = '{{ __("search.added") }}';
                            btn.classList.remove('text-gray-500');
                            btn.classList.add('text-green-500');
                        }
                    })
                    .catch(error => {
                        console.log(error);
                        btn.disabled = false;
                        btn.classList.remove('text-gray-500', 'cursor-default');
                        btn.classList.add('text-blue-500', 'hover:text-blue-700');
                    });
            });
        });
    </script>
@endsection