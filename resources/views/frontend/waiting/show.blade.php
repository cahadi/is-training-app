<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Лист ожидания') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($waitList->isEmpty())
                        {{ __('Ничего нет') }}
                    @else
                        @foreach($waitList as $answer)

                            <div class="mb-4">
                                <div class="bg-gray-100 rounded-md p-4">
                                    <x-markdown>
                                        {{ $answer->answer_body }}
                                    </x-markdown>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="/waitinglist/form/{{$answer->id}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Выставить оценку
                                </a>
                            </div>
                        @endforeach

                            {{ $waitList->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
