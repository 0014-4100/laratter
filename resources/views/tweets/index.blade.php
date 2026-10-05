  <h1>Tweet一覧</h1>

    <x-layouts.app :title="__('Tweet一覧')">
    <div class="p-6">
        <h2 class="font-semibold text-xl mb-4">{{ __('Tweet一覧') }}</h2>

        @foreach ($tweets as $tweet)
            <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                <p>{{ $tweet->tweet }}</p>

                <p class="text-sm text-gray-500">
                    投稿者: {{ $tweet->user->name }}
                </p>

                <a href="{{ route('tweets.show', $tweet) }}"
                   class="text-blue-500 hover:text-blue-700">
                    詳細を見る
                </a>
            </div>
        @endforeach
    </div>
</x-layouts.app>
