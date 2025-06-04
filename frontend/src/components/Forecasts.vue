<script setup lang="ts">
import { useWeather } from '@/composables/useWeather';
import type { Coordinates } from '@/types/weather';
import { watch } from 'vue';
const props = defineProps<{
  coordinates: Coordinates
}>()

const { fetchingForecasts, getForecasts, forecasts } = useWeather()

watch(() => props.coordinates, (coordinates: Coordinates) => {
  getForecasts(coordinates)
})
</script>
<template>
  <v-card :loading="fetchingForecasts">
    <v-card-title>Forecasts</v-card-title>
    <v-card-text>
      <v-table>
        <thead>
          <tr>
            <th class="text-center"></th>
            <th class="text-center">Wind</th>
            <th class="text-center">Sunset & Sunrise</th>
            <th class="text-center">Humidity</th>
            <th class="text-center">Visibility</th>
            <th class="text-center">Feels like</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(forecast, i) in forecasts" :key="i">
            <td>
              <div class="d-flex align-center" style="gap: 4px;">
                <div>
                  <v-img :src="`https://openweathermap.org/img/wn/${forecast.weather?.icon}@2x.png`" width="80"></v-img>
                </div>
                <div class="flex flex-column">
                  <p class="text-h5">{{ forecast.main?.temp }}&deg;C</p>
                  <strong class="date text-grey">{{ forecast.date }}</strong>
                </div>
                <div>
                </div>
              </div>
            </td>
            <td>
              <div class="forecasts-icon">
                <v-icon color="blue">mdi-weather-windy</v-icon>
                <p>{{ forecast.wind.speed }} km/h</p>
              </div>
            </td>
            <td>
              <div class="forecasts-icon">
                <v-icon color="orange">mdi-weather-sunset</v-icon>
                <p>{{ forecast.sys.sunrise }} - {{ forecast.sys.sunset }}</p>
              </div>
            </td>
            <td>
              <div class="forecasts-icon">
                <v-icon color="blue">mdi-water-percent</v-icon>
                <p>{{ forecast.main.humidity }}%</p>
              </div>
            </td>
            <td>
              <div class="forecasts-icon">
                <v-icon color="grey">mdi-weather-fog</v-icon>
                <p>{{ forecast.visibility }}km</p>
              </div>
            </td>
            <td>
              <div class="forecasts-icon">
                <v-icon color="white">mdi-thermometer</v-icon>
                <p>{{ forecast.main.feels_like }}&deg;C</p>
              </div>
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-card-text>
  </v-card>
</template>


<style lang="scss">
.forecasts-icon {
  gap: 12px;
  display: flex;
  white-space: nowrap;
}
</style>
