<script setup lang="ts">
const props = defineProps<{
  value: string | number
}>()
</script>
<template>
  <v-card class="mx-auto elevation-6">
    <v-card-text>
      <strong>Feels like</strong>
    </v-card-text>
    <v-card-text class="py-0">
      <v-row align="center" no-gutters>
        <v-col class="text-h3" cols="6">
          {{ value }}&deg;C
        </v-col>

        <v-col class="text-right" cols="6">
          <v-icon size="88">mdi-thermometer</v-icon>
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</template>
