<x-guests-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お問い合わせ内容確認') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="create_inquiry" method="POST" action="{{ route('store') }}">
                        @csrf
                        <div class="form-group">
                            <div class="mt-3">
                                <label for="name" class="required-tag">名前</label><br>
                                <p>{{ $inquiry['name'] }}</p>
                                <input type="hidden" name="name" id="name" value="{{ $inquiry['name'] }}">
                            </div>
                            <div class="mt-3">
                                <label for="email" class="required-tag mt-3">メールアドレス</label><br>
                                <p>{{ $inquiry['email'] }}</p>
                                <input type="hidden" name="email" id="email" value="{{ $inquiry['email'] }}">
                            </div>
                            <div class="mt-3">
                                <label for="phone_number" class="required-tag mt-3">電話番号</label><br>
                                <p>{{ $inquiry['phone_number'] }}</p>
                                <input type="hidden" name="phone_number" id="phone_number" value="{{ $inquiry['phone_number'] }}">
                            </div>
                            <div class="mt-3">
                                <label for="content" class="required-tag mt-3">お問い合せ内容</label><br>
                                <p>{{ $inquiry['content'] }}</p>
                                <input type="hidden" name="content" id="content" value="{{ $inquiry['content'] }}">
                            </div>
                        </div>
                        <div class="text-right">
                        <button class="btn btn-outline-info mt-3" type="submit">送信する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guests-layout>
