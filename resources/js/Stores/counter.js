import { defineStore } from 'pinia'
import api from '@/services/api'

export const useCounterStore = defineStore('counter', {
  state: () => ({
    count: 0,
    loading: false
  }),

  actions: {

    async fetchCount() {
      this.loading = true
      try {
        const res = await api.get('/api/count')
        this.count = res.data.count
      } catch (error) {
        console.log('Error fetchCount:', error)
      } finally {
        this.loading = false
      }
    },

    async increment() {
      try {
        const res = await api.post('/api/count/increment')
        this.count = res.data.count
      } catch (error) {
        console.log('Error increment:', error)
      }
    },

    reset() {
      this.count = 0
    }
  }
})