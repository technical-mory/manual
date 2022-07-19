<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            マニュアルの名前を記入して、確定ボタンを押してください
        </h2>

        <x-validation-errors class="mb-4" :errors="$errors" />

        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="post" action="{{route('manual.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold leading-none mt-4">マニュアルの名前</label>
                    <textarea name="title" class="w-auto h-9 py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" cols="30" rows="10" placeholder="マニュアルの名前を記入してください。（最大30文字）">{{old('title')}}</textarea>
                </div>

                <x-button2 class="mt-4">
                    マニュアルの名前を確定させる
                </x-button2>

            </form>
        </div>
    </div>

</x-app-layout>
