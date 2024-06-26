<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-sm md:text-base text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Pengajuan
                </th>
                <th scope="col" class="px-6 py-3">
                    Kode Pengajuan
                <th scope="col" class="px-6 py-3">
                    Nama Poktan
                </th>
                <th scope="col" class="px-6 py-3">
                    Proposal
                </th>
                <th scope="col" class="px-6 py-3">
                    Surat SPKO Poktan
                </th>
                <th scope="col" class="px-6 py-3">
                    Status Tingkat 1
                </th>
                <th scope="col" class="px-6 py-3">
                    Status Tingkat 2
                </th>
                <th scope="col" class="px-6 py-3">
                    Penanggung Jawab
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengajuans as $pengajuan)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-sm md:text-base hover:bg-gray-100">
                    <td scope="row" class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pengajuan->created_at->format('d F Y') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pengajuan->kode }}
                    </td>
                    <td class="px-6 py-4">
                        <a class="underline text-green-700" href="{{ route('akun.show', $pengajuan->user) }}">{{ $pengajuan->user->nama }}</a>
                    </td>
                    <td class="px-6 py-4">
                        @if ($pengajuan->dokumen_pengajuan)
                            <a href="{{ asset('storage/dokumen_pengajuans/' . $pengajuan->dokumen_pengajuan) }}"
                                target="_blank"
                                class="text-center inline-flex items-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="w-[18px] h-[18px] text-white dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        Belum ada surat
                    </td>
                    <td class="px-6 py-4">
                        {{ $pengajuan->status_tk1 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pengajuan->status_tk2 }}
                    </td>
                    <td class="px-6 py-4">
                        @if (isset($pengajuan->penanggung_jawab->nama))
                            {{ $pengajuan->penanggung_jawab->nama }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('pengajuan.show', $pengajuan) }}"
                            class="focus:outline-none text-white inline-flex bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <svg class="w-[18px] h-[18px] text-white-800 dark:text-white mr-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                                    clip-rule="evenodd" />
                            </svg>Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-slate-700 text-base">Tidak ada data pengajuan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
