<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

const username = ref('')
const password = ref('')
const showPassword = ref(false)
const remember = ref(false)
const errorMsg = ref('')
const loading = ref(false)

const login = () => {
  if (!username.value || !password.value) {
    errorMsg.value = 'Username dan password wajib diisi.'
    return
  }

  // Simulasi login (nanti diganti API backend)
  loading.value = true
  errorMsg.value = ''

  setTimeout(() => {
    if (username.value === 'admin' && password.value === 'admin123') {
      localStorage.setItem('token', 'dummy-token')
      router.visit('/dashboard')
    } else {
      errorMsg.value = 'Username atau password salah.'
      loading.value = false
    }
  }, 1000)
}
</script>

<template>
  <div class="min-h-screen flex bg-gray-100">

    <!-- KIRI - Info Sistem -->
    <div class="w-5/12 bg-blue-950 flex flex-col items-center justify-center px-10 relative overflow-hidden">

      <!-- Lingkaran dekorasi -->
      <div class="absolute w-72 h-72 rounded-full bg-blue-800 opacity-20 -top-16 -left-16"></div>
      <div class="absolute w-48 h-48 rounded-full bg-blue-700 opacity-20 -bottom-10 -right-10"></div>

      <!-- Logo -->
      <div class="w-16 h-16 rounded-2xl bg-blue-500 flex items-center justify-center mb-6 relative z-10">
        <i class="ti ti-building-bank text-white text-3xl"></i>
      </div>

      <!-- Judul -->
      <h1 class="text-white text-2xl font-bold text-center leading-snug mb-3 relative z-10">
        Sistem Administrasi<br>Pencairan Dana
      </h1>
      <p class="text-blue-300 text-sm text-center leading-relaxed mb-10 relative z-10">
        Platform terpadu pengelolaan pengajuan dan pencairan dana Fakultas secara digital dan transparan.
      </p>

      <!-- Fitur -->
      <div class="flex flex-col gap-3 w-full relative z-10">
        <div class="flex items-center gap-3 bg-white bg-opacity-5 border border-white border-opacity-10 rounded-xl px-4 py-3">
          <div class="w-8 h-8 rounded-lg bg-blue-500 bg-opacity-30 flex items-center justify-center flex-shrink-0">
            <i class="ti ti-file-invoice text-blue-200 text-sm"></i>
          </div>
          <div>
            <p class="text-white text-xs font-semibold">Pengajuan Digital</p>
            <p class="text-blue-400 text-xs">Formulir online tanpa kertas</p>
          </div>
        </div>
        <div class="flex items-center gap-3 bg-white bg-opacity-5 border border-white border-opacity-10 rounded-xl px-4 py-3">
          <div class="w-8 h-8 rounded-lg bg-blue-500 bg-opacity-30 flex items-center justify-center flex-shrink-0">
            <i class="ti ti-checks text-blue-200 text-sm"></i>
          </div>
          <div>
            <p class="text-white text-xs font-semibold">Persetujuan Berjenjang</p>
            <p class="text-blue-400 text-xs">Staf → Kepala TU → Dekan</p>
          </div>
        </div>
        <div class="flex items-center gap-3 bg-white bg-opacity-5 border border-white border-opacity-10 rounded-xl px-4 py-3">
          <div class="w-8 h-8 rounded-lg bg-blue-500 bg-opacity-30 flex items-center justify-center flex-shrink-0">
            <i class="ti ti-chart-bar text-blue-200 text-sm"></i>
          </div>
          <div>
            <p class="text-white text-xs font-semibold">Pelaporan & Arsip</p>
            <p class="text-blue-400 text-xs">Ekspor Excel & PDF otomatis</p>
          </div>
        </div>
      </div>

      <!-- Versi -->
      <p class="text-blue-800 text-xs mt-10 relative z-10">© 2026 Tata Usaha Fakultas · v2.1.0</p>
    </div>

    <!-- KANAN - Form Login -->
    <div class="flex-1 flex items-center justify-center px-12">
      <div class="w-full max-w-sm">

        <!-- Badge -->
        <div class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100
                    text-blue-700 text-xs font-bold px-3 py-1.5 rounded-full mb-4 uppercase tracking-wide">
          <i class="ti ti-lock text-xs"></i>
          Akses Terproteksi
        </div>

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-blue-900 mb-1">Selamat Datang 👋</h2>
        <p class="text-sm text-blue-600 mb-6">Masuk dengan akun resmi Anda untuk melanjutkan.</p>

        <!-- Alert Error -->
        <div
          v-if="errorMsg"
          class="flex items-center gap-2 bg-red-50 border border-red-200
                 text-red-600 text-sm px-4 py-3 rounded-xl mb-4"
        >
          <i class="ti ti-alert-circle text-base flex-shrink-0"></i>
          <span>{{ errorMsg }}</span>
        </div>

        <!-- Form -->
        <div class="flex flex-col gap-4">

          <!-- Username -->
          <div>
            <label class="text-xs font-bold text-blue-800 uppercase tracking-wide mb-1.5 block">
              Username
            </label>
            <div class="relative">
              <i class="ti ti-user absolute left-3 top-1/2 -translate-y-1/2 text-blue-400 text-base"></i>
              <input
                v-model="username"
                type="text"
                placeholder="Masukkan username Anda..."
                class="w-full pl-9 pr-4 py-2.5 bg-blue-50 border border-blue-100
                       rounded-xl text-sm text-blue-900 placeholder-blue-300
                       focus:outline-none focus:border-blue-400 focus:bg-white
                       transition-colors"
                @keyup.enter="login"
              />
            </div>
          </div>

          <!-- Password -->
          <div>
            <label class="text-xs font-bold text-blue-800 uppercase tracking-wide mb-1.5 block">
              Password
            </label>
            <div class="relative">
              <i class="ti ti-lock absolute left-3 top-1/2 -translate-y-1/2 text-blue-400 text-base"></i>
              <input
                v-model="password"
                :type="showPassword ? 'text' : 'password'"
                placeholder="Masukkan password Anda..."
                class="w-full pl-9 pr-10 py-2.5 bg-blue-50 border border-blue-100
                       rounded-xl text-sm text-blue-900 placeholder-blue-300
                       focus:outline-none focus:border-blue-400 focus:bg-white
                       transition-colors"
                @keyup.enter="login"
              />
              <button
                type="button"
                @click="showPassword = !showPassword"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-blue-400 hover:text-blue-700"
              >
                <i :class="showPassword ? 'ti ti-eye-off' : 'ti ti-eye'" class="text-base"></i>
              </button>
            </div>
          </div>

          <!-- Remember & Lupa Password -->
          <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 text-sm text-blue-700 cursor-pointer">
              <input v-model="remember" type="checkbox" class="accent-blue-600 w-4 h-4">
              Ingat saya
            </label>
            <a href="/forgot-password" class="text-sm font-semibold text-blue-600 hover:text-blue-800 hover:underline">
              Lupa Password?
            </a>
          </div>

          <!-- Tombol Login -->
          <button
            @click="login"
            :disabled="loading"
            class="w-full py-3 bg-blue-600 hover:bg-blue-800 text-white
                   font-bold text-sm rounded-xl transition-all
                   flex items-center justify-center gap-2
                   disabled:opacity-70 disabled:cursor-not-allowed
                   shadow-lg shadow-blue-200"
          >
            <i v-if="loading" class="ti ti-loader-2 animate-spin text-base"></i>
            <i v-else class="ti ti-login text-base"></i>
            {{ loading ? 'Memverifikasi...' : 'Masuk ke Sistem' }}
          </button>

        </div>

        <!-- Demo akun -->
        <div class="mt-6 bg-blue-50 border border-blue-100 rounded-xl p-4">
          <p class="text-xs font-bold text-blue-700 uppercase tracking-wide mb-2">Demo Akun</p>
          <div class="flex flex-col gap-1">
            <div class="flex justify-between text-xs">
              <span class="text-blue-600 font-semibold">admin</span>
              <span class="text-blue-900 font-bold">/ admin123</span>
            </div>
            <div class="flex justify-between text-xs">
              <span class="text-blue-600 font-semibold">dekan</span>
              <span class="text-blue-900 font-bold">/ dekan123</span>
            </div>
          </div>
        </div>

        <p class="text-center text-xs text-blue-400 mt-4">
          Butuh bantuan?
          <a href="mailto:it@fakultas.ac.id" class="text-blue-600 font-semibold">it@fakultas.ac.id</a>
        </p>

      </div>
    </div>

  </div>
</template>