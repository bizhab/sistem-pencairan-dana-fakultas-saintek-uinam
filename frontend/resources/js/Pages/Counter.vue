<script setup>
import { onMounted } from 'vue'
import { useCounterStore } from '@/stores/counter'
import AppLayout from '@/Layouts/AppLayout.vue'

const counter = useCounterStore()

onMounted(() => {
  counter.fetchCount()
})
</script>

<template>
  <AppLayout>

    <div style="padding: 20px;">
      <h1>Counter App</h1>

      <h2>Nilai: {{ counter.count }}</h2>

      <button @click="counter.fetchCount">Load Data</button>
      <button @click="counter.increment">Tambah (API)</button>
      <button @click="counter.reset">Reset</button>
    </div>

  </AppLayout>
</template>