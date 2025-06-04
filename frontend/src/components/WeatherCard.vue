<script setup lang="ts">
import { LocationWeather } from '@/types/weather';
const props = withDefaults(defineProps<{
  weather: LocationWeather
  loading: boolean
}>(), {
  loading: false
})
</script>
<template>
  <v-card class="mx-auto" :loading="loading">
    <v-card-item :title="weather?.name"></v-card-item>

    <v-card-text class="py-0">
      <v-row align="center" no-gutters>
        <v-col cols="6">
          <p class="text-h3">{{ weather.main?.temp }}&deg;C</p>
          <strong class="text-h6 text-grey">{{ weather.weather?.description }}</strong>
        </v-col>

        <v-col cols="6">
          <v-img :src="`https://openweathermap.org/img/wn/${weather.weather?.icon}@2x.png`" width="100"></v-img>
        </v-col>
      </v-row>
    </v-card-text>


    <v-card-text>
      <div class="d-flex align-center">
        <v-icon class="me-1 pb-1" color="white" icon="mdi-clock" size="18"></v-icon>
        <strong>{{ weather?.date }}</strong>
      </div>
    </v-card-text>
  </v-card>
</template>
