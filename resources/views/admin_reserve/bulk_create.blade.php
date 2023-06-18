<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予約枠一括作成') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="admin_reserve_create" method="POST" action="{{ route('admin_reserve_bulk_store') }}">
                        @csrf
                        <div class="form-group">
                            <label>部屋タイプ</label>
                            <select class="form-control w-25" name="room">
                                @foreach ($Rooms as $Room)
                                    <option value="{{ $Room->id }}">{{ $Room->name }}</option>
                                @endforeach
                            </select>
                            <label class="mt-4">開始日</label>
                            <input id="first_date" class="form-control mb-3 w-25" type="date" name="first_date" value="{{ old('first_date') }}">
                            <label class="mt-3">終了日</label>
                            <input id="last_date" class="form-control mb-3 w-25" type="date" name="last_date" value="{{ old('last_date') }}">
                        </div>
                        <button class="btn btn-outline-info mt-2" type="submit">作成する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
