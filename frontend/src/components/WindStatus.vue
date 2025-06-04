<script setup lang="ts">
import type { Wind } from '@/types/weather';

const props = defineProps<{
  wind: Wind
}>()
</script>
<template>
  <v-card class="mx-auto elevation-6">
    <v-card-text>
      <strong>Wind status</strong>
    </v-card-text>

    <v-card-text class="py-0 d-flex justify-center">
      <v-icon color="info" icon="mdi-weather-windy" size="88"></v-icon>
    </v-card-text>


    <v-card-text>
      <div class="d-flex">
        <p><span class="text-h6">{{ wind?.speed }}</span> km/h</p>
      </div>
    </v-card-text>
  </v-card>
</template>
