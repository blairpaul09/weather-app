import { apiClient } from "@/helpers/ApiClient";
import type { Forecasts } from "@/types/Forecasts";
import type { Coordinates, LocationWeather } from "@/types/weather";
import { ref } from "vue";

export function useWeather() {

  /**
   * @const {Boolean} fetchingWeather
   */
  const fetchingWeather = ref(false);

  /**
 * @const {Boolean} fetchingForecasts
 */
  const fetchingForecasts = ref(false);

  /**
   * @const {Array} locations
   */
  const weather = ref({} as LocationWeather);

  /**
 * @const {Array} forecasts
 */
  const forecasts = ref([] as Forecasts[]);

  /**
   *
   * @param {Coordinates} coordinates
   */
  async function getWeather(coordinates: Coordinates) {
    fetchingWeather.value = true;
    const response = await apiClient(`/weather/current`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify({
        latitude: coordinates.lat,
        longitude: coordinates.lon,
      })
    });

    weather.value = response.data;

    fetchingWeather.value = false;
  }

  /**
 *
 * @param {Coordinates} coordinates
 */
  async function getForecasts(coordinates: Coordinates) {
    fetchingForecasts.value = true;
    const response = await apiClient(`/weather/forecasts`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify({
        latitude: coordinates.lat,
        longitude: coordinates.lon,
      })
    });

    forecasts.value = response.data.forecasts;

    fetchingForecasts.value = false;
  }

  return {
    fetchingWeather,
    getWeather,
    weather,
    getForecasts,
    forecasts,
    fetchingForecasts,
  }
}
