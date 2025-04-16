<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('waitinglist.evaluate') }}" class="mt-6 space-y-6">
                    @csrf
                        <input type="hidden" name="user_id" value="{{ $wait->user_id }}">
                        <input type="hidden" name="lesson_id" value="{{ $wait->lesson_id }}">
                        <input type="hidden" name="title" value="{{ $wait->answer_title }}">

                        <div>
                            <x-input-label for="grade" :value="__('Оценка')" />
                            <x-text-input id="grade" name="grade" type="text" class="mt-1 block w-full" required autofocus/>
                            <x-input-error :messages="$errors->get('grade')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="body" :value="__('Ответ')" />
                            <x-markdown>
                                {{ $wait->answer_body }}
                            </x-markdown>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
