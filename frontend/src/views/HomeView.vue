<script setup lang="ts">
import SunriseSunset from '@/components/SunriseSunset.vue';
import Humidity from '@/components/Humidity.vue';
import WeatherCard from '@/components/WeatherCard.vue';
import WindStatus from '@/components/WindStatus.vue';
import { onMounted, ref, watch, watchEffect } from 'vue'
import Visibility from '@/components/Visibility.vue';
import FeelsLike from '@/components/FeelsLike.vue';
import Forecasts from '@/components/Forecasts.vue';
import { useLocation } from '@/composables/useLocation';
import { debounce } from 'lodash'
import type { Coordinates } from '@/types/weather';
import { useWeather } from '@/composables/useWeather';
import type { Location } from '@/types/Location';

const { fetchingLocations, searchLocation, locations } = useLocation();
const { fetchingWeather, getWeather, weather } = useWeather();

const selectedLocation = ref()

const search = debounce(async (key: string) => {
  searchLocation(key)
}, 500)

watch(() => selectedLocation.value, (value: Location) => {
  getWeather(value.coordinates)
})

onMounted(() => {
  navigator.geolocation.getCurrentPosition(
    (position: GeolocationPosition) => {
      getWeather({
        lat: position.coords.latitude,
        lon: position.coords.longitude
      });
    },
  )
})
</script>

<template>
  <v-row>
    <v-col md="4" cols="12">
      <v-row>
        <v-col cols="12">
          <v-autocomplete v-model="selectedLocation" :loading="fetchingLocations" :items="locations"
            item-title="formatted" autocomplete="off" placeholder="Search location..." prepend-inner-icon="mdi-magnify"
            variant="solo" rounded return-object menu-icon="" @update:search="search">
          </v-autocomplete>
          <WeatherCard :weather="weather" :loading="fetchingWeather" />
        </v-col>
      </v-row>
    </v-col>
    <v-col md="8" cols="12">
      <v-card>
        <v-card-title>Highlight</v-card-title>
        <v-card-text>
          <v-row>
            <v-col sm="6" cols="12">
              <WindStatus :wind="weather.wind" />
            </v-col>
            <v-col sm="6" cols="12">
              <SunriseSunset :sunrise="weather.sys?.sunrise" :sunset="weather.sys?.sunset" />
            </v-col>
          </v-row>
        </v-card-text>

        <v-card-text>
          <v-row>
            <v-col md="4" sm="6" cols="12">
              <Humidity :value="weather.main?.humidity" />
            </v-col>
            <v-col md="4" sm="6" cols="12">
              <Visibility :value="weather.visibility" />
            </v-col>
            <v-col md="4" sm="6" cols="12">
              <FeelsLike :value="weather.main?.feels_like" />
            </v-col>
          </v-row>
        </v-card-text>
      </v-card>
      <Forecasts class="mt-5" :coordinates="weather.coordinates" />
    </v-col>
  </v-row>
</template>
