<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $lesson->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('answers.store') }}" class="mt-6 space-y-6">
                    @csrf
                    <!-- Убедитесь, что вы используете правильный метод (POST) для сохранения данных -->
                        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">

                        <div>
                            <x-input-label for="title" :value="__('Заголовок')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus/>
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="body" :value="__('Ответ')" />
                            <textarea id="body" name="body" class="mt-1 block w-full" rows="4" required></textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Сохранить ответ') }}</x-primary-button>

                            @if (session('status') === 'answer-saved')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Ответ сохранен.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
