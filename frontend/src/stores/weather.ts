import { ref, computed, reactive } from 'vue'
import { defineStore } from 'pinia'
import type { LocationWeather } from '@/types/weather'

export const useGetWeatherStore = defineStore('getWeather', () => {
  const weather = ref({} as LocationWeather)

  function setLocationWeather(locWeather: LocationWeather) {
    weather.value = locWeather
  }

  return { weather, setLocationWeather }
})
