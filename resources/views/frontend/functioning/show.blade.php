<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $subject->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(isset($noTopics))
                        <p>Нет тем для этого предмета.</p>
                    @else
                        @foreach($topics as $topic)
                            <h2 class="text-xl text-gray-800 leading-tight mb-4">
                                {{ $topic->title }}
                            </h2>
                            @foreach($topic->lessons as $lesson)
                                <h4 class="card-title font-semibold mb-2">{{ $lesson->title }}</h4>
                                @foreach($lesson->answers as $answer)
                                    @if(strpos($answer->title, 'Лекция ') !== 0)
                                        <div class="mt-4">
                                            <a href="/functioning/showForm/{{$lesson->id}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Дать ответ на задание
                                            </a>
                                        </div>
                                    @endif
                                    <div class="mb-4">
                                        <div class="bg-gray-100 rounded-md p-4">
                                            <x-markdown>
                                                {{ $answer->body }}
                                            </x-markdown>
                                        </div>
                                    </div>
                                    {{ $lesson->answers->links() }}
                                @endforeach
                                {{ $topic->lessons->links() }}

                                @if ($lastLessonId == $lesson->id & $topic->id < 5)
                                    <div class="mt-4">
                                        <a href="/functioning/{{$topic->id+1}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Перейти к следующей теме
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
