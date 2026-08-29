@if ($paginator->hasPages())
<div class="flex items-center justify-between px-4 py-4">

    {{-- Informasi --}}
    <div class="text-sm text-gray-600">
        Menampilkan
        <span class="font-semibold">{{ $paginator->firstItem() }}</span>
        -
        <span class="font-semibold">{{ $paginator->lastItem() }}</span>
        dari
        <span class="font-semibold">{{ $paginator->total() }}</span>
        data
    </div>

    {{-- Tombol pagination --}}
    <div class="flex items-center gap-1">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())

            <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg">
                ‹ Sebelumnya
            </span>

        @else

            <a href="{{ $paginator->previousPageUrl() }}"
               class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                ‹ Sebelumnya
            </a>

        @endif


        {{-- Nomor halaman --}}
        @foreach ($elements as $element)

            @if (is_string($element))

                <span class="px-3 py-2 text-sm text-gray-500">
                    {{ $element }}
                </span>

            @endif


            @if (is_array($element))

                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())

                        <span class="px-3 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg">
                            {{ $page }}
                        </span>

                    @else

                        <a href="{{ $url }}"
                           class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-blue-50 hover:text-blue-600">
                            {{ $page }}
                        </a>

                    @endif

                @endforeach

            @endif

        @endforeach


        {{-- Next --}}
        @if ($paginator->hasMorePages())

            <a href="{{ $paginator->nextPageUrl() }}"
               class="px-3 py-2 text-sm text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                Berikutnya ›
            </a>

        @else

            <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg">
                Berikutnya ›
            </span>

        @endif

    </div>

</div>
@endif