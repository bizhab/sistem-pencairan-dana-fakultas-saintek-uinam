<script setup>
import { computed } from 'vue'
import { usePage, router } from '@inertiajs/vue3'

const page = usePage()

// Ambil judul dari props Inertia
const pageTitle = computed(() => page.props?.title ?? 'Dashboard')

const logout = () => {
  router.post('/logout')
}
</script>

<template>
  <header class="bg-white border-b border-blue-100 px-6 py-3
                 flex items-center justify-between">

    <!-- Judul Halaman -->
    <h2 class="text-blue-900 font-semibold text-sm">
      {{ pageTitle }}
    </h2>

    <div class="flex items-center gap-3">

      <!-- Notifikasi -->
      <button class="relative text-blue-500 hover:text-blue-800 transition-colors">
        <i class="ti ti-bell text-lg"></i>
        <span class="absolute -top-1 -right-1 w-4 h-4
                     bg-red-500 text-white text-[9px]
                     rounded-full flex items-center justify-center">
          3
        </span>
      </button>

      <!-- Avatar + Nama -->
      <div class="flex items-center gap-2">
        <div class="w-8 h-8 rounded-full bg-blue-600
                    flex items-center justify-center
                    text-white text-xs font-bold">
          AK
        </div>
        <span class="text-sm font-medium text-blue-900">
          Admin Keuangan
        </span>
      </div>

      <!-- Logout -->
      <button
        @click="logout"
        class="text-blue-400 hover:text-red-500 transition-colors"
      >
        <i class="ti ti-logout text-lg"></i>
      </button>

    </div>
  </header>
</template>