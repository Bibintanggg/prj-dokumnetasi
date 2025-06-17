@props(['id', 'title', 'action'])


<div id="{{ $id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-[30rem] relative">
        <h2 class="text-xl font-semibold mb-4">{{ $title }}</h2>

        <form method="POST" action="{{ $action }}">
            @csrf
            {{ $slot }}
            <div class="flex justify-end mt-4">
                <button type="button" onclick="togglemodal('{{ $id }}')"
                    class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>