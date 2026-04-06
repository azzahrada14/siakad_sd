<x-app-layout>
    <div class="p-6 bg-gray-100 min-h-screen flex justify-center">
        <div class="w-full max-w-2xl bg-white p-6 rounded-xl shadow">

            <h2 class="text-2xl font-bold mb-6">Edit Admin</h2>

            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Nama</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $admin->name) }}"
                           class="w-full border p-2 rounded"
                           required>
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $admin->email) }}"
                           class="w-full border p-2 rounded"
                           required>
                </div>

                {{-- Password Baru --}}
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Password Baru</label>
                    <input type="password"
                           name="password"
                           class="w-full border p-2 rounded">

                    <small class="text-gray-500">
                        Kosongkan jika tidak ingin mengganti password
                    </small>
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Update
                    </button>

                    <a href="{{ route('admin.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                        Kembali
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>