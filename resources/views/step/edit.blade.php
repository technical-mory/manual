<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ステップの修正画面
        </h2>

        <x-validation-errors class="mb-4" :errors="$errors" />

        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="post" action="{{route('step.update', $step)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold leading-none mt-4">ステップの手順</label>
                    <textarea name="body" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="body" cols="30" rows="10" placeholder="このステップの手順を修正してください。（最大500文字）">{{old('body', $step->body)}}</textarea>
                </div>

                <div class="w-full flex flex-col">
                    @if($step->image)
                        <div>
                            (画像ファイル：{{$step->image}})
                        </div>
                        <img src="{{ asset('storage/images/'.$step->image)}}" class="mx-auto" style="height:300px;">
                    @endif

                    <label for="image" class="font-semibold leading-none mt-4">参考画像を添付する（任意） </label>
                    <div>
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <x-button1 class="mt-4">
                    修正内容を確定させる
                </x-button1>
            </form>
        </div>
    </div>

</x-app-layout>
