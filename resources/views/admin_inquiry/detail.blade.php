<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お問い合わせ詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($Inquiry as $Inquiry)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="ml-5 mt-3">
                            <p>{{ $Inquiry->name }}様からのお問い合わせ</p>
                            <p>メールアドレス： {{ $Inquiry->email }}</p>
                            <p>電話番号： {{ $Inquiry->phone_number }}</p>
                            <p>お問い合わせ内容:<br><br>
                                {{ $Inquiry->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
