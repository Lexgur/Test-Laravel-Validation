<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About me') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Hey, I am Lex - an aspiring software developer. Not my first choice for a career, but since dragons are extinct - you make compromises. Enjoy!
It seems to me that this text automatically adjusts no matter how many words this contains. I have hobbies such as painting miniatures, fishing, playing dungeons and dragons as well as other
role-playing games. But I am taking my time to figure what sort of image I should add here to attract attention. Perhaps one of my family? We shall see.") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
