@extends('layouts.app-dashboard')

@section('content')
    <div class="grid grid-cols-2 max-w-5xl gap-x-10 gap-y-6 ml-10">
        <div>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Kode Pengajuan</p>
        </div>
        <div>
            <p class="text-xl text-gray-900 dark:text-white">{{ $pengajuan->kode }}</p>
        </div>
        <div>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Nomor Registrasi</p>
        </div>
        <div>
            <p class="text-xl text-gray-900 dark:text-white">{{ $pengajuan->user->no_reg }}</p>
        </div>
        <div>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Nama Kelompok Tani</p>
        </div>
        <div>
            <p class="text-xl text-gray-900 dark:text-white">{{ $pengajuan->user->nama }}</p>
        </div>
        <div>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Desa</p>
        </div>
        <div>
            <p class="text-xl text-gray-900 dark:text-white">{{ $pengajuan->user->desa->nama }}</p>
        </div>
        <div>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Alamat Sekretariat</p>
        </div>
        <div>
            <p class="text-xl text-gray-900 dark:text-white">{{ $pengajuan->user->alamat }}</p>
        </div>
        <div>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Jumlah Anggota</p>
        </div>
        <div>
            <p class="text-xl text-gray-900 dark:text-white">{{ $pengajuan->user->jml_anggota }}</p>
        </div>
        <div>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Nama Alsintan</p>
        </div>
        <div>
            <p class="text-xl text-gray-900 dark:text-white">{{ $pengajuan->nama_alsintan }}</p>
        </div>
        <div>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Jenis Alsintan</p>
        </div>
        <div>
            <p class="text-xl text-gray-900 dark:text-white">{{ $pengajuan->jenis_alsintan }}</p>
        </div>
        <div>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Alasan Pengajuan</p>
        </div>
        <div>
            <p class="text-xl text-gray-900 dark:text-white">{{ $pengajuan->alasan_pengajuan }}</p>
        </div>
        <div>
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Tanggal Pengajuan</p>
        </div>
        <div>
            <p class="text-xl text-gray-900 dark:text-white">{{ $pengajuan->created_at->format('d F Y') }}</p>
        </div>
        <div class="col-span-1 flex items-center">
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Dokumen Pendukung</p>
        </div>
        <div class="flex items-center">
            <a href="{{ asset('storage/dokumen_pengajuans/' . $pengajuan->dokumen_pengajuan) }}" target="_blank"
                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-[18px] h-[18px] text-white dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        <div class="col-span-1 flex items-center">
            <p class="text-xl font-semibold text-gray-900 dark:text-white">Surat SPKO Poktan</p>
        </div>
        <div class="flex items-center">
            -
        </div>
    </div>

        <div class="ml-10 mt-6 grid grid-cols-2 max-w-5xl gap-x-10 gap-y-6">
            <div>
                <p class="text-xl font-semibold text-gray-900 dark:text-white">Status</p>
            </div>
            <div>
                <form action="{{ route('pengajuan.update-status', $pengajuan) }}" method="POST">
                    @csrf
                    <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Belum Disetujui">Belum Disetujui</option>
                        <option value="Disetujui BPP">Disetujui BPP</option>
                    </select>
            </div>
            <div>
                <p class="text-xl font-semibold text-gray-900 dark:text-white">Keterangan</p>
            </div>
            <div>
                <input type="text" id="tanggapan_bpp" name="tanggapan_bpp"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Tuliskan keterangan" required />
            </div>
            <div>
                <button type="submit"
                    class="max-w-xs focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Ubah Status</button>
            </div>
            </form>
        </div>
@endsection
