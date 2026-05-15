<script setup>
import MainLayout from '@/Layouts/MainLayout.vue'

const pengajuan = [
  { id: 1, kegiatan: 'Seminar Nasional', dana: 'Rp 5.200.000', status: 'Disetujui' },
  { id: 2, kegiatan: 'Workshop Dosen',   dana: 'Rp 3.800.000', status: 'Menunggu'  },
  { id: 3, kegiatan: 'Pengadaan ATK',    dana: 'Rp 1.200.000', status: 'Disetujui' },
  { id: 4, kegiatan: 'Kunjungan Studi',  dana: 'Rp 8.500.000', status: 'Menunggu'  },
  { id: 5, kegiatan: 'Pelatihan K3',     dana: 'Rp 2.000.000', status: 'Ditolak'   },
]

const statusClass = (status) => {
  if (status === 'Disetujui') return 'bg-green-100 text-green-700'
  if (status === 'Menunggu')  return 'bg-yellow-100 text-yellow-700'
  if (status === 'Ditolak')   return 'bg-red-100 text-red-700'
}
</script>

<template>
  <MainLayout>

    <div class="mb-6">
      <h2 class="text-xl font-bold text-blue-900">Dashboard</h2>
      <p class="text-sm text-blue-600 mt-1">Selamat datang di Sistem Pencairan Dana Fakultas</p>
    </div>

    <div class="grid grid-cols-4 gap-4 mb-6">
      <div class="bg-white rounded-xl border border-blue-100 p-4">
        <p class="text-xs font-bold text-blue-600 uppercase tracking-wide mb-2">Total Pengajuan</p>
        <p class="text-3xl font-bold text-blue-900">47</p>
      </div>
      <div class="bg-white rounded-xl border border-blue-100 p-4">
        <p class="text-xs font-bold text-blue-600 uppercase tracking-wide mb-2">Menunggu</p>
        <p class="text-3xl font-bold text-yellow-600">12</p>
      </div>
      <div class="bg-white rounded-xl border border-blue-100 p-4">
        <p class="text-xs font-bold text-blue-600 uppercase tracking-wide mb-2">Disetujui</p>
        <p class="text-3xl font-bold text-green-600">29</p>
      </div>
      <div class="bg-white rounded-xl border border-blue-100 p-4">
        <p class="text-xs font-bold text-blue-600 uppercase tracking-wide mb-2">Ditolak</p>
        <p class="text-3xl font-bold text-red-600">6</p>
      </div>
    </div>

    <div class="bg-white rounded-xl border border-blue-100 overflow-hidden">
      <div class="px-5 py-4 border-b border-blue-100">
        <h3 class="text-sm font-semibold text-blue-900">Pengajuan Terbaru</h3>
      </div>
      <table class="w-full text-sm">
        <thead>
          <tr class="bg-blue-50 text-blue-600 text-xs uppercase tracking-wide">
            <th class="px-5 py-3 text-left">Kegiatan</th>
            <th class="px-5 py-3 text-left">Total Dana</th>
            <th class="px-5 py-3 text-left">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="item in pengajuan"
            :key="item.id"
            class="border-t border-blue-50 hover:bg-blue-50 transition-colors"
          >
            <td class="px-5 py-3 font-medium text-blue-900">{{ item.kegiatan }}</td>
            <td class="px-5 py-3 text-blue-700 font-semibold">{{ item.dana }}</td>
            <td class="px-5 py-3">
              <span :class="statusClass(item.status)" class="px-3 py-1 rounded-full text-xs font-semibold">
                {{ item.status }}
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </MainLayout>
</template>