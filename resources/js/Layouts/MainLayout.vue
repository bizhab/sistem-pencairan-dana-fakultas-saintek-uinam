<template>
  <!-- Wrapper full screen -->
  <div class="flex h-screen bg-gray-100 overflow-hidden">

    <!-- SIDEBAR kiri -->
    <Sidebar />

    <!-- Area konten kanan -->
    <div class="flex flex-col flex-1 overflow-hidden">

      <!-- TOPBAR atas -->
      <Topbar />

      <!-- ISI HALAMAN -->
      <main class="flex-1 overflow-y-auto p-6">
        <slot />
      </main>

    </div>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue'
import Topbar from '@/Components/Topbar.vue'
</script>