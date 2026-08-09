@csrf

<div class="bg-white rounded-xl shadow border">

    {{-- =========================================================
         HEADER
    ========================================================== --}}
    <div class="px-6 py-5 border-b">

        <h2 class="text-xl font-semibold text-slate-800">
            Informasi Jadwal Pelajaran
        </h2>

        <p class="text-gray-500 mt-1">
            Lengkapi data jadwal pelajaran.
        </p>

    </div>


    {{-- =========================================================
         FORM
    ========================================================== --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">


        {{-- =====================================================
             KELAS
        ====================================================== --}}
        <div id="kelas-group">

            <label
                for="kelas_id"
                class="block text-sm font-medium text-gray-700 mb-2">

                Kelas

            </label>

            <select
                id="kelas_id"
                name="kelas_id"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <option value="">
                    -- Pilih Kelas --
                </option>

                @foreach($kelas as $item)

                    <option
                        value="{{ $item->id }}"
                        {{ old('kelas_id', $jadwal->kelas_id ?? '') == $item->id ? 'selected' : '' }}>

                        {{ $item->nama_kelas }}

                    </option>

                @endforeach

            </select>

            @error('kelas_id')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- =====================================================
             TAHUN AJARAN
        ====================================================== --}}
        <div>

            <label
                for="tahun_ajaran"
                class="block text-sm font-medium text-gray-700 mb-2">

                Tahun Ajaran

            </label>

            <input
                id="tahun_ajaran"
                type="text"
                class="w-full rounded-lg border-gray-300 bg-gray-100"
                value="{{ $tahunAktif->tahun_ajaran ?? '-' }}"
                readonly>

            <input
                type="hidden"
                name="tahun_ajaran_id"
                value="{{ $tahunAktif->id ?? '' }}">

            @error('tahun_ajaran_id')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- =====================================================
             HARI
        ====================================================== --}}
        <div>

            <label
                for="hari"
                class="block text-sm font-medium text-gray-700 mb-2">

                Hari

            </label>

            <select
                id="hari"
                name="hari"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                @foreach([
                    'Senin',
                    'Selasa',
                    'Rabu',
                    'Kamis',
                    'Jumat'
                ] as $hari)

                    <option
                        value="{{ $hari }}"
                        {{ old('hari', $jadwal->hari ?? '') == $hari ? 'selected' : '' }}>

                        {{ $hari }}

                    </option>

                @endforeach

            </select>

            @error('hari')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- =====================================================
             JAM KE
        ====================================================== --}}
        <div>

            <label
                for="jam_ke"
                class="block text-sm font-medium text-gray-700 mb-2">

                Jam Ke

            </label>

            <select
                id="jam_ke"
                name="jam_ke"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                @for($i = 1; $i <= 10; $i++)

                    <option
                        value="{{ $i }}"
                        {{ old('jam_ke', $jadwal->jam_ke ?? '') == $i ? 'selected' : '' }}>

                        Jam Ke {{ $i }}

                    </option>

                @endfor

            </select>

            @error('jam_ke')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- =====================================================
             WAKTU
        ====================================================== --}}
        <div>

            <label
                for="waktu"
                class="block text-sm font-medium text-gray-700 mb-2">

                Waktu

            </label>

            <input
                id="waktu"
                type="text"
                name="waktu"
                value="{{ old('waktu', $jadwal->waktu ?? '') }}"
                placeholder="07.00 - 07.30"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

            @error('waktu')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- =====================================================
             JENIS JADWAL
        ====================================================== --}}
        <div>

            <label
                for="jenis_jadwal"
                class="block text-sm font-medium text-gray-700 mb-2">

                Jenis Jadwal

            </label>

            <select
                id="jenis_jadwal"
                name="jenis_jadwal"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <option
                    value="Wajib"
                    {{ old('jenis_jadwal', $jadwal->jenis_jadwal ?? 'Wajib') == 'Wajib' ? 'selected' : '' }}>

                    Wajib

                </option>

                <option
                    value="Kokurikuler"
                    {{ old('jenis_jadwal', $jadwal->jenis_jadwal ?? '') == 'Kokurikuler' ? 'selected' : '' }}>

                    Kokurikuler

                </option>

                <option
                    value="Kegiatan"
                    {{ old('jenis_jadwal', $jadwal->jenis_jadwal ?? '') == 'Kegiatan' ? 'selected' : '' }}>

                    Kegiatan

                </option>

            </select>

            @error('jenis_jadwal')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

            <p class="mt-2 text-xs text-gray-500">

                Wajib = Jam pelajaran utama.<br>

                Kokurikuler = Pendalaman materi mata pelajaran.<br>

                Kegiatan = Kegiatan sekolah seperti Upacara,
                Sholat Dhuha, dan Istirahat.

            </p>

        </div>


        {{-- =====================================================
             MATA PELAJARAN
        ====================================================== --}}
        <div id="mapel-group">

            <label
                for="mapel_id"
                class="block text-sm font-medium text-gray-700 mb-2">

                Mata Pelajaran

            </label>

            <select
                id="mapel_id"
                name="mapel_id"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <option value="">
                    -- Pilih Kelas Terlebih Dahulu --
                </option>

            </select>

            @error('mapel_id')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- =====================================================
             GURU
        ====================================================== --}}
        <div id="guru-group">

            <label
                for="guru_id"
                class="block text-sm font-medium text-gray-700 mb-2">

                Guru

            </label>

            <select
                id="guru_id"
                name="guru_id"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <option value="">
                    -- Pilih Guru --
                </option>

                @foreach($gurus as $guru)

                    <option
                        value="{{ $guru->id }}"
                        {{ old('guru_id', $jadwal->guru_id ?? '') == $guru->id ? 'selected' : '' }}>

                        {{ $guru->nama_guru }}

                    </option>

                @endforeach

            </select>

            @error('guru_id')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- =====================================================
             NAMA KEGIATAN
        ====================================================== --}}
        <div id="kegiatan-group">

            <label
                for="nama_kegiatan"
                class="block text-sm font-medium text-gray-700 mb-2">

                Nama Kegiatan

            </label>

            <select
                id="nama_kegiatan"
                name="nama_kegiatan"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <option value="">
                    -- Pilih Kegiatan --
                </option>

                <option
                    value="Upacara"
                    {{ old('nama_kegiatan', $jadwal->nama_kegiatan ?? '') == 'Upacara' ? 'selected' : '' }}>

                    Upacara

                </option>

                <option
                    value="Sholat Dhuha"
                    {{ old('nama_kegiatan', $jadwal->nama_kegiatan ?? '') == 'Sholat Dhuha' ? 'selected' : '' }}>

                    Sholat Dhuha

                </option>

                <option
                    value="Istirahat"
                    {{ old('nama_kegiatan', $jadwal->nama_kegiatan ?? '') == 'Istirahat' ? 'selected' : '' }}>

                    Istirahat

                </option>

            </select>

            @error('nama_kegiatan')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- =====================================================
             STATUS
        ====================================================== --}}
        <div id="status-group">

            <label
                for="status"
                class="block text-sm font-medium text-gray-700 mb-2">

                Status

            </label>

            <select
                id="status"
                name="status"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                <option
                    value="Aktif"
                    {{ old('status', $jadwal->status ?? 'Aktif') == 'Aktif' ? 'selected' : '' }}>

                    Aktif

                </option>

                <option
                    value="Nonaktif"
                    {{ old('status', $jadwal->status ?? '') == 'Nonaktif' ? 'selected' : '' }}>

                    Nonaktif

                </option>

            </select>

            @error('status')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>


    {{-- =========================================================
         FOOTER
    ========================================================== --}}
    <div class="px-6 py-5 border-t flex justify-end gap-3">

        <a
            href="{{ route('jadwal.index') }}"
            class="px-5 py-2 rounded-lg bg-gray-400 hover:bg-gray-500 text-white">

            Batal

        </a>

        <button
            type="submit"
            class="px-6 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

            {{ isset($jadwal->id) ? 'Simpan Perubahan' : 'Simpan' }}

        </button>

    </div>

</div>


{{-- =========================================================
     JAVASCRIPT
========================================================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const kelas = document.getElementById('kelas_id');
    const mapel = document.getElementById('mapel_id');
    const guru = document.getElementById('guru_id');
    const jenis = document.getElementById('jenis_jadwal');
    const kegiatan = document.getElementById('nama_kegiatan');
    const status = document.getElementById('status');

    const mapelGroup = document.getElementById('mapel-group');
    const guruGroup = document.getElementById('guru-group');
    const kegiatanGroup = document.getElementById('kegiatan-group');
    const statusGroup = document.getElementById('status-group');

    const selectedMapel =
        "{{ old('mapel_id', $jadwal->mapel_id ?? '') }}";


    /*
    |--------------------------------------------------------------------------
    | LOAD MAPEL BERDASARKAN KELAS
    |--------------------------------------------------------------------------
    */

    function loadMapel(kelasId, selected = '') {

        if (!kelasId) {

            mapel.innerHTML =
                '<option value="">-- Pilih Kelas Terlebih Dahulu --</option>';

            return;
        }


        mapel.innerHTML =
            '<option value="">Memuat data...</option>';


        fetch('/jadwal/mapel/' + kelasId)

            .then(function (response) {

                if (!response.ok) {

                    throw new Error(
                        'Gagal mengambil data mata pelajaran.'
                    );

                }

                return response.json();

            })

            .then(function (data) {

                mapel.innerHTML =
                    '<option value="">-- Pilih Mata Pelajaran --</option>';


                data.forEach(function (item) {

                    const option =
                        document.createElement('option');

                    option.value = item.id;

                    option.textContent = item.nama_mapel;


                    if (item.id == selected) {

                        option.selected = true;

                    }


                    mapel.appendChild(option);

                });

            })

            .catch(function (error) {

                console.error(error);

                mapel.innerHTML =
                    '<option value="">Gagal memuat mata pelajaran</option>';

            });

    }


    /*
    |--------------------------------------------------------------------------
    | TOGGLE FORM
    |--------------------------------------------------------------------------
    */

    function toggleForm() {

        /*
        |--------------------------------------------------------------------------
        | KEGIATAN SEKOLAH
        |--------------------------------------------------------------------------
        */

        if (jenis.value === 'Kegiatan') {

            // Mapel tidak diperlukan
            mapelGroup.style.display = 'none';

            // Guru tidak diperlukan
            guruGroup.style.display = 'none';

            // Nama kegiatan ditampilkan
            kegiatanGroup.style.display = 'block';

            // Status tetap Aktif
            statusGroup.style.display = 'none';

            // Kosongkan mapel
            mapel.value = '';

            // Kosongkan guru
            guru.value = '';

            // Status otomatis Aktif
            status.value = 'Aktif';

        }


        /*
        |--------------------------------------------------------------------------
        | WAJIB / KOKURIKULER
        |--------------------------------------------------------------------------
        */

        else {

            // Mapel ditampilkan
            mapelGroup.style.display = 'block';

            // Guru ditampilkan
            guruGroup.style.display = 'block';

            // Nama kegiatan disembunyikan
            kegiatanGroup.style.display = 'none';

            // Status ditampilkan
            statusGroup.style.display = 'block';

            // Kosongkan nama kegiatan
            kegiatan.value = '';

        }

    }


    /*
    |--------------------------------------------------------------------------
    | JENIS JADWAL BERUBAH
    |--------------------------------------------------------------------------
    */

    jenis.addEventListener(
        'change',
        function () {

            toggleForm();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | KELAS BERUBAH
    |--------------------------------------------------------------------------
    */

    kelas.addEventListener(
        'change',
        function () {

            loadMapel(
                this.value
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | LOAD MAPEL SAAT EDIT
    |--------------------------------------------------------------------------
    */

    if (kelas.value) {

        loadMapel(
            kelas.value,
            selectedMapel
        );

    }


    /*
    |--------------------------------------------------------------------------
    | KONDISI AWAL
    |--------------------------------------------------------------------------
    */

    toggleForm();

});

</script>