<x-layouts.app :title="__('Tweet作成')">
    <div class="p-6">
        <h2 class="font-semibold text-xl mb-4">{{ __('Tweet作成') }}</h2>

        <form action="{{ route('tweets.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="tweet" class="block mb-2">Tweet</label>
                <textarea
                    name="tweet"
                    id="tweet"
                    class="w-full border rounded-lg p-2"
                    rows="4"
                ></textarea>
            </div>

            <button
                type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded-lg"
            >
                投稿
            </button>
        </form>
    </div>
</x-layouts.app>