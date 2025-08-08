@extends('layouts.app')

@section('content')
<div class="p-6">
  <div class="bg-white rounded-2xl shadow-md p-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
      <div>
        <h2 class="text-2xl font-semibold">Recruitment Management</h2>
        <p class="text-sm text-gray-500">Kelola proses rekrutmen karyawan</p>
      </div>

      <div class="flex items-center gap-3">
        <input type="search" placeholder="Cari berdasarkan nama..." class="border rounded-lg px-3 py-2 w-80 focus:outline-none" />
        <button class="px-4 py-2 border rounded-lg">Export</button>
        <button class="px-4 py-2 bg-white border rounded-lg">Filter</button>
        <a href="{{ route('recruitment.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">+ Tambah</a>
      </div>
    </div>

    <!-- Summary pills -->
    <div class="grid grid-cols-4 gap-4 mb-6">
      <div class="p-4 border rounded-lg flex items-center gap-3">
        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
          <!-- Ikon dokumen -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m-6-8h6m2-6H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2z" />
          </svg>
        </div>
        <div>
          <div class="text-sm text-gray-500">3 Posisi</div>
          <div class="font-medium">Proses Administrasi</div>
        </div>
      </div>
      <div class="p-4 border rounded-lg flex items-center gap-3">
        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
          <!-- Ikon kesehatan -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <div>
          <div class="text-sm text-gray-500">2 Posisi</div>
          <div class="font-medium">Proses Psikotes & Kesehatan</div>
        </div>
      </div>
      <div class="p-4 border rounded-lg flex items-center gap-3">
        <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
          <!-- Ikon kalender -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-10 4h6m5 4H5a2 2 0 01-2-2V7h18v10a2 2 0 01-2 2z" />
          </svg>
        </div>
        <div>
          <div class="text-sm text-gray-500">8 Jadwal</div>
          <div class="font-medium">Wawancara Minggu Ini</div>
        </div>
      </div>
      <div class="p-4 border rounded-lg flex items-center gap-3">
        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
          <!-- Ikon peringatan -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M5.07 19h13.86A2 2 0 0021 17.14L12.93 4.64a2 2 0 00-3.46 0L3 17.14A2 2 0 005.07 19z" />
          </svg>
        </div>
        <div>
          <div class="text-sm text-gray-500">1 Posisi</div>
          <div class="font-medium">Butuh Finalisasi</div>
        </div>
      </div>
    </div>

    <!-- Tabs -->
    <div class="mb-4">
      <nav class="flex items-center gap-6 border-b pb-3">
        <a href="#" class="text-blue-600 border-b-2 border-blue-600 pb-2">Berjalan <span class="bg-blue-100 ml-2 text-blue-600 rounded-full px-2 text-sm">5</span></a>
        <a href="#" class="text-gray-500">Selesai <span class="bg-gray-100 ml-2 rounded-full px-2 text-sm">15</span></a>
        <a href="#" class="text-gray-500">Kebutuhan <span class="bg-gray-100 ml-2 rounded-full px-2 text-sm">3</span></a>
        <a href="#" class="text-gray-500">Draft <span class="bg-gray-100 ml-2 rounded-full px-2 text-sm">3</span></a>
      </nav>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full table-auto">
        <thead>
          <tr class="text-left text-sm text-gray-500 border-b">
            <th class="py-3 pl-3">No</th>
            <th class="py-3">Status</th>
            <th class="py-3">Nama Posisi</th>
            <th class="py-3">Medis/Non Medis</th>
            <th class="py-3">Status Kepegawaian</th>
            <th class="py-3">Regional/Direktorat</th>
            <th class="py-3">Jumlah Lowongan</th>
            <th class="py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="text-sm">
          @foreach($positions as $p)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-3 pl-3">{{ $loop->iteration }}</td>
            <td class="py-3">
              <div class="flex items-center gap-1">
                @for($i=0; $i < 5; $i++)
                  @php
                      $color = match(true) {
                          $i < $p->progress && $p->progress <= 2 => 'bg-red-500',
                          $i < $p->progress && $p->progress == 3 => 'bg-yellow-500',
                          $i < $p->progress && $p->progress >= 4 => 'bg-green-500',
                          default => 'bg-gray-200'
                      };
                  @endphp
                  <span class="w-3 h-3 rounded-full {{ $color }}"></span>
                @endfor
              </div>
            </td>
            <td class="py-3">{{ $p->title }}</td>
            <td class="py-3">{{ $p->is_medical ? 'Medis' : 'Non Medis' }}</td>
            <td class="py-3">{{ $p->employment_status ?? '-' }}</td>
            <td class="py-3">{{ $p->directorate ?? '-' }}</td>
            <td class="py-3">{{ $p->vacancy_count }} Orang</td>
            <td class="py-3">
              <a href="{{ route('recruitment.show', $p->id) }}" class="px-3 py-1 rounded-full border hover:bg-gray-100">Lihat</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between mt-4">
      <div class="text-sm text-gray-500">Menampilkan
        <select class="border rounded px-2 py-1"> 
          <option>10</option>
          <option>25</option>
          <option>50</option>
        </select>
        entri dari {{ $positions->total() }} entri
      </div>

      <div>
        {{ $positions->links() }}
      </div>
    </div>

  </div>
</div>
@endsection
