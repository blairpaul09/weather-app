<script setup lang="ts">
import { localTime } from '@/helpers/Date';

const props = defineProps<{
  sunrise: string | number
  sunset: string | number
}>()
</script>
<template>
  <v-card class="mx-auto elevation-6">
    <v-card-text>
      <strong>Sunrise & Sunset</strong>
    </v-card-text>

    <v-card-text class="py-0 d-flex justify-center">
      <v-icon color="orange" icon="mdi-weather-sunset" size="88"></v-icon>
    </v-card-text>

    <div class="d-flex py-3 justify-space-between">
      <v-list-item density="compact">
        <template #prepend>
          <v-icon color="yellow">mdi-weather-sunset-up</v-icon>
        </template>
        <v-list-item-subtitle>{{ sunrise }}</v-list-item-subtitle>
      </v-list-item>
      <v-list-item density="compact">
        <template #prepend>
          <v-icon color="orange">mdi-weather-sunset-down</v-icon>
        </template>
        <v-list-item-subtitle>{{ sunset }}</v-list-item-subtitle>
      </v-list-item>
    </div>
  </v-card>
</template>
