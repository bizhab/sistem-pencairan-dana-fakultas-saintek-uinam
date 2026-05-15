<script setup>
import { Link } from '@inertiajs/vue3'

const menus = [
  { label: 'Dashboard',   path: '/dashboard',   icon: 'ti ti-layout-dashboard' },
  { label: 'Pengajuan',   path: '/pengajuan',   icon: 'ti ti-file-invoice'     },
  { label: 'Persetujuan', path: '/persetujuan', icon: 'ti ti-checks'           },
  { label: 'Pencairan',   path: '/pencairan',   icon: 'ti ti-cash'             },
  { label: 'Laporan',     path: '/laporan',     icon: 'ti ti-chart-bar'        },
  { label: 'Pengaturan',  path: '/pengaturan',  icon: 'ti ti-settings'         },
  { label: 'Profil',      path: '/profil',      icon: 'ti ti-user-circle'      },
]
</script>

<template>
  <aside class="w-60 bg-blue-950 flex flex-col">
    <div class="p-5 border-b border-blue-900">
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-lg bg-blue-500 flex items-center justify-center">
          <i class="ti ti-building-bank text-white text-base"></i>
        </div>
        <div>
          <h1 class="text-white font-bold text-sm">SAPDF</h1>
          <p class="text-blue-300 text-xs">Pencairan Dana</p>
        </div>
      </div>
    </div>

    <nav class="flex-1 py-3">
      <Link
        v-for="menu in menus"
        :key="menu.path"
        :href="menu.path"
        class="flex items-center gap-3 px-5 py-2.5
               text-blue-300 text-sm font-medium
               border-l-2 border-transparent
               hover:bg-blue-900 hover:text-white
               transition-colors"
      >
        <i :class="menu.icon + ' text-base'"></i>
        <span>{{ menu.label }}</span>
      </Link>
    </nav>

    <div class="p-4 border-t border-blue-900">
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-full bg-blue-600
                    flex items-center justify-center
                    text-white text-xs font-bold">
          AK
        </div>
        <div>
          <p class="text-white text-xs font-semibold">Admin Keuangan</p>
          <p class="text-blue-300 text-xs">Staf Administrasi</p>
        </div>
      </div>
    </div>
  </aside>
</template>