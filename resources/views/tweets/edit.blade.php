<x-layouts.app :title="__('Tweet編集')">
    <div class="p-6">

        <a href="{{ route('tweets.show', $tweet) }}"
           class="text-blue-500 hover:text-blue-700">
            ← 詳細に戻る
        </a>

        <form method="POST" action="{{ route('tweets.update', $tweet) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="tweet" class="block mb-2">
                    Tweet
                </label>

                <input
                    type="text"
                    name="tweet"
                    id="tweet"
                    value="{{ $tweet->tweet }}"
                    class="w-full border rounded-lg p-2"
                >

                @error('tweet')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <button
                type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded-lg"
            >
                更新
            </button>
        </form>

    </div>
</x-layouts.app>