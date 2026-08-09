@csrf

<div class="bg-white rounded-xl shadow border">

    {{-- Header --}}
    <div class="px-6 py-5 border-b">
        <h2 class="text-xl font-semibold text-slate-800">
            Informasi Ekstrakurikuler
        </h2>

        <p class="text-gray-500 mt-1">
            Lengkapi data ekstrakurikuler siswa.
        </p>
    </div>

    {{-- Form --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">

        {{-- Siswa --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Siswa
            </label>

            <select
                name="siswa_id"
                class="w-full h-11 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                <option value="">-- Pilih Siswa --</option>

                @foreach($siswas as $siswa)

                    <option
                        value="{{ $siswa->id }}"
                        {{ old('siswa_id',$ekstrakurikuler->siswa_id ?? '')==$siswa->id ? 'selected' : '' }}>

                        {{ $siswa->nama_siswa }}

                    </option>

                @endforeach

            </select>

            @error('siswa_id')

                <p class="mt-1 text-sm text-red-600">

                    {{ $message }}

                </p>

            @enderror

        </div>

        {{-- Tahun Ajaran --}}
        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">

                Tahun Ajaran

            </label>

            <select
                name="tahun_ajaran_id"
                class="w-full h-11 rounded-lg border-gray-300">

                <option value="">-- Pilih Tahun Ajaran --</option>

                @foreach($tahunAjarans as $tahun)

                    <option
                        value="{{ $tahun->id }}"
                        {{ old('tahun_ajaran_id',$ekstrakurikuler->tahun_ajaran_id ?? '')==$tahun->id ? 'selected':'' }}>

                        {{ $tahun->tahun_ajaran }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- Semester --}}
        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">

                Semester

            </label>

            <select
                name="semester"
                class="w-full h-11 rounded-lg border-gray-300">

                <option value="Ganjil"
                    {{ old('semester',$ekstrakurikuler->semester ?? '')=='Ganjil' ? 'selected':'' }}>

                    Ganjil

                </option>

                <option value="Genap"
                    {{ old('semester',$ekstrakurikuler->semester ?? '')=='Genap' ? 'selected':'' }}>

                    Genap

                </option>

            </select>

        </div>

        {{-- Nama Ekstrakurikuler --}}
        <div>

            <label class="block text-sm font-medium text-gray-700 mb-2">

                Nama Ekstrakurikuler

            </label>

            <select
                name="nama_kegiatan"
                class="w-full h-11 rounded-lg border-gray-300">

                <option value="">-- Pilih Ekstrakurikuler --</option>

                @php

                    $ekskul = [
                        'Pramuka',
                        'PMR',
                        'Paskibra',
                        'Futsal',
                        'Tari',
                        'Marawis',
                        'Karawitan'
                    ];

                @endphp

                @foreach($ekskul as $item)

                    <option
                        value="{{ $item }}"
                        {{ old('nama_kegiatan',$ekstrakurikuler->nama_kegiatan ?? '')==$item?'selected':'' }}>

                        {{ $item }}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- Deskripsi --}}
        <div class="md:col-span-2">

            <label class="block text-sm font-medium text-gray-700 mb-2">

                Deskripsi

            </label>

            <textarea
                name="keterangan"
                rows="5"
                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ old('keterangan',$ekstrakurikuler->keterangan ?? '') }}</textarea>

            <p class="mt-2 text-xs text-gray-500">

                Contoh:
                Aktif mengikuti kegiatan Pramuka dan menunjukkan sikap disiplin serta tanggung jawab yang baik.

            </p>

        </div>

    </div>

    {{-- Footer --}}
    <div class="px-6 py-5 border-t flex justify-end gap-3">

        <a
            href="{{ route('ekstrakurikuler.index') }}"
            class="px-5 py-2 rounded-lg bg-gray-300 hover:bg-gray-400">

            Batal

        </a>

        <button
            type="submit"
            class="px-6 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

            {{ isset($ekstrakurikuler) ? 'Simpan Perubahan' : 'Simpan' }}

        </button>

    </div>

</div>