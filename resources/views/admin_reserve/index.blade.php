<x-app-layout>
    <x-slot name="header">
        <div class="d-flex">
            <div class="mr-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('予約枠一覧') }}
                </h2>
            </div>
            <div class="mr-4 d-flex text-right">
                <a type="button" class="btn btn-outline-success mr-4"
                    href="{{ route('admin_reserve_create') }}">予約枠作成へ</a>
                <a type="button" class="btn btn-outline-success"
                    href="{{ route('admin_reserve_bulk_create') }}">予約枠一括作成へ</a>
            </div>
        </div>
    </x-slot>

     {{-- フラッシュメッセージ始まり --}}
    {{-- 成功の時 --}}
    @if (session('successMessage'))
    <div class="alert alert-success text-center">
    {{ session('successMessage') }}
    </div>
    @endif
    {{-- 失敗の時 --}}
    @if (session('errorMessage'))
    <div class="alert alert-danger text-center">
    {{ session('errorMessage') }}
    </div>
    @endif
    {{-- フラッシュメッセージ終わり --}}

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @foreach ($ReserveSpaces as $ReserveSpace)
                <div class="text-muted mt-3">{{ $ReserveSpace->date }}</div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white border-b border-gray-200">
                        <div class="d-flex justify-content-between mt-3">
                            <div>
                                <p class="my-2 ml-5">{{ $ReserveSpace->room->name }}</p>
                            </div>
                            <div class="d-flex">
                                <div class="mr-3">
                                    @if ($ReserveSpace->reserve_type === 0)
                                        <form class="admin_inquiry_update"
                                            action="{{ route('admin_reserve_space_update', $ReserveSpace->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <button type="submit" class="btn btn btn-outline-success"
                                                    name="id" value="{{ $ReserveSpace->id }}">予約可</button>
                                            </div>
                                        </form>
                                    @else
                                        <form class="admin_inquiry_update"
                                            action="{{ route('admin_reserve_space_update', $ReserveSpace->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline-secondary active"
                                                    name="id" value="{{ $ReserveSpace->id }}">予約済み</button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                                <div class="mr-5">
                                    <form class="admin_reserve_space_destroy" method="POST"
                                        action="{{ route('admin_reserve_space_destroy', $ReserveSpace->id) }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $ReserveSpace->id }}">
                                        <button type="submit" class="btn btn-outline-secondary">削除</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
