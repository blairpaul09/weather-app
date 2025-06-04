<script setup lang="ts">
const props = defineProps<{
  value: string | number
}>()
</script>
<template>
  <v-card class="mx-auto elevation-6">
    <v-card-text>
      <strong>Visibility</strong>
    </v-card-text>
    <v-card-text class="py-0">
      <v-row align="center" no-gutters>
        <v-col cols="6">
          <p><span class="text-h4">{{ value }}</span>km</p>
        </v-col>

        <v-col class="text-right" cols="6">
          <v-icon color="grey" size="88">mdi-weather-fog</v-icon>
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</template>
