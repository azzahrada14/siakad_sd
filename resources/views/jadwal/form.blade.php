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
        class="w-full rounded-lg border-gray-300
               focus:ring-blue-500 focus:border-blue-500">

        <option value="">
            -- Pilih Kelas dan Hari Terlebih Dahulu --
        </option>

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
        placeholder="Waktu otomatis"
        readonly
        class="w-full rounded-lg border-gray-300
               bg-gray-100 text-gray-600">

    <p class="mt-2 text-xs text-gray-400">
        Waktu ditentukan otomatis berdasarkan jam pelajaran kelas.
    </p>

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
        class="w-full rounded-lg border-gray-300"
    >
        <option value="">
            -- Pilih Mata Pelajaran Dahulu --
        </option>
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
    const hari = document.getElementById('hari');

    const mapel = document.getElementById('mapel_id');
    const guru = document.getElementById('guru_id');

    const jamKe = document.getElementById('jam_ke');
    const waktu = document.getElementById('waktu');

    const jenis = document.getElementById('jenis_jadwal');
    const kegiatan = document.getElementById('nama_kegiatan');
    const status = document.getElementById('status');

    const mapelGroup = document.getElementById('mapel-group');
    const guruGroup = document.getElementById('guru-group');
    const kegiatanGroup = document.getElementById('kegiatan-group');
    const statusGroup = document.getElementById('status-group');

    /*
    |--------------------------------------------------------------------------
    | DATA SAAT EDIT
    |--------------------------------------------------------------------------
    */

    const selectedMapel =
        "{{ old('mapel_id', $jadwal->mapel_id ?? '') }}";

    const selectedJam =
        "{{ old('jam_ke', $jadwal->jam_ke ?? '') }}";

    const selectedGuru =
        "{{ old('guru_id', $jadwal->guru_id ?? '') }}";


    /*
    |--------------------------------------------------------------------------
    | LOAD GURU BERDASARKAN KELAS + MAPEL
    |--------------------------------------------------------------------------
    */

    function loadGuru(kelasValue, mapelValue, selected = '') {

        if (!kelasValue || !mapelValue) {

            guru.innerHTML =
                '<option value="">-- Pilih Mata Pelajaran Dahulu --</option>';

            return;
        }

        guru.innerHTML =
            '<option value="">Memuat guru...</option>';

        fetch(
            '/jadwal/guru/' +
            kelasValue +
            '/' +
            mapelValue
        )
        .then(function (response) {

            if (!response.ok) {
                throw new Error('Gagal mengambil data guru.');
            }

            return response.json();

        })
        .then(function (data) {

            guru.innerHTML =
                '<option value="">-- Pilih Guru --</option>';

            if (data.length === 0) {

                guru.innerHTML =
                    '<option value="">-- Guru Tidak Tersedia --</option>';

                return;
            }

            data.forEach(function (item) {

                const option =
                    document.createElement('option');

                option.value = item.id;

                option.textContent = item.nama_guru;

                if (item.id == selected) {
                    option.selected = true;
                }

                guru.appendChild(option);

            });

        })
        .catch(function (error) {

            console.error(error);

            guru.innerHTML =
                '<option value="">Gagal memuat guru</option>';

        });
    }


    /*
    |--------------------------------------------------------------------------
    | LOAD JAM BERDASARKAN KELAS + HARI
    |--------------------------------------------------------------------------
    */

    function loadJam(kelasValue, hariValue, selected = '') {

        if (!kelasValue || !hariValue) {

            jamKe.innerHTML =
                '<option value="">-- Pilih Kelas dan Hari Terlebih Dahulu --</option>';

            waktu.value = '';

            return;
        }

        jamKe.innerHTML =
            '<option value="">Memuat jam...</option>';

        waktu.value = '';

        fetch(
            '/jadwal/jam/' +
            kelasValue +
            '/' +
            encodeURIComponent(hariValue)
        )
        .then(function (response) {

            if (!response.ok) {
                throw new Error(
                    'Gagal mengambil jam pelajaran.'
                );
            }

            return response.json();

        })
        .then(function (data) {

            jamKe.innerHTML =
                '<option value="">-- Pilih Jam Ke --</option>';

            if (data.length === 0) {

                jamKe.innerHTML =
                    '<option value="">-- Jam belum tersedia --</option>';

                waktu.value = '';

                return;
            }

            data.forEach(function (item) {

                const option =
                    document.createElement('option');

                option.value = item.jam_ke;

                option.textContent =
                    'Jam Ke ' +
                    item.jam_ke +
                    ' (' +
                    item.waktu +
                    ')';

                option.dataset.waktu =
                    item.waktu || '';

                if (item.jam_ke == selected) {
                    option.selected = true;
                }

                jamKe.appendChild(option);

            });

            tampilkanWaktu();

        })
        .catch(function (error) {

            console.error(error);

            jamKe.innerHTML =
                '<option value="">Gagal memuat jam</option>';

            waktu.value = '';

        });
    }


    /*
    |--------------------------------------------------------------------------
    | LOAD MAPEL BERDASARKAN KELAS
    |--------------------------------------------------------------------------
    */

    function loadMapel(kelasValue, selected = '') {

        if (!kelasValue) {

            mapel.innerHTML =
                '<option value="">-- Pilih Kelas Terlebih Dahulu --</option>';

            guru.innerHTML =
                '<option value="">-- Pilih Mata Pelajaran Dahulu --</option>';

            return;
        }

        mapel.innerHTML =
            '<option value="">Memuat data...</option>';

        fetch('/jadwal/mapel/' + kelasValue)
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

                /*
                |----------------------------------------------------------
                | Kalau edit dan mapel sudah dipilih,
                | otomatis load guru
                |----------------------------------------------------------
                */

                if (selected) {

                    loadGuru(
                        kelasValue,
                        selected,
                        selectedGuru
                    );

                }

            })
            .catch(function (error) {

                console.error(error);

                mapel.innerHTML =
                    '<option value="">Gagal memuat mata pelajaran</option>';

            });
    }


    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN WAKTU
    |--------------------------------------------------------------------------
    */

    function tampilkanWaktu() {

        const selectedOption =
            jamKe.options[jamKe.selectedIndex];

        if (
            selectedOption &&
            selectedOption.dataset.waktu
        ) {

            waktu.value =
                selectedOption.dataset.waktu;

        } else {

            waktu.value = '';

        }
    }


    /*
    |--------------------------------------------------------------------------
    | TOGGLE FORM
    |--------------------------------------------------------------------------
    */

    function toggleForm() {

        if (jenis.value === 'Kegiatan') {

            // Sembunyikan mapel
            mapelGroup.style.display = 'none';

            // Sembunyikan guru
            guruGroup.style.display = 'none';

            // Tampilkan kegiatan
            kegiatanGroup.style.display = 'block';

            // Status disembunyikan
            statusGroup.style.display = 'none';

            // Kosongkan mapel
            mapel.value = '';

            // Kosongkan guru
            guru.value = '';

            // Status otomatis aktif
            status.value = 'Aktif';

        } else {

            // Tampilkan mapel
            mapelGroup.style.display = 'block';

            // Tampilkan guru
            guruGroup.style.display = 'block';

            // Sembunyikan kegiatan
            kegiatanGroup.style.display = 'none';

            // Tampilkan status
            statusGroup.style.display = 'block';

            // Kosongkan kegiatan
            kegiatan.value = '';
        }
    }


    /*
    |--------------------------------------------------------------------------
    | EVENT JENIS JADWAL
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
    | EVENT KELAS BERUBAH
    |--------------------------------------------------------------------------
    */

    kelas.addEventListener(
        'change',
        function () {

            const kelasValue = this.value;

            // Load mapel sesuai kelas
            loadMapel(kelasValue);

            // Reset guru
            guru.innerHTML =
                '<option value="">-- Pilih Mata Pelajaran Dahulu --</option>';

            // Reset jam
            jamKe.innerHTML =
                '<option value="">-- Pilih Hari Terlebih Dahulu --</option>';

            // Reset waktu
            waktu.value = '';

        }
    );


    /*
    |--------------------------------------------------------------------------
    | EVENT HARI BERUBAH
    |--------------------------------------------------------------------------
    */

    hari.addEventListener(
        'change',
        function () {

            loadJam(
                kelas.value,
                this.value
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | EVENT JAM BERUBAH
    |--------------------------------------------------------------------------
    */

    jamKe.addEventListener(
        'change',
        function () {

            tampilkanWaktu();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | EVENT MAPEL BERUBAH
    |--------------------------------------------------------------------------
    */

    mapel.addEventListener(
        'change',
        function () {

            loadGuru(
                kelas.value,
                this.value
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | KONDISI AWAL / CREATE / EDIT
    |--------------------------------------------------------------------------
    */

    if (kelas.value) {

        // Load mapel
        loadMapel(
            kelas.value,
            selectedMapel
        );

    }

    if (kelas.value && hari.value) {

        // Load jam otomatis
        loadJam(
            kelas.value,
            hari.value,
            selectedJam
        );

    }


    /*
    |--------------------------------------------------------------------------
    | KONDISI AWAL FORM
    |--------------------------------------------------------------------------
    */

    toggleForm();

});

</script>