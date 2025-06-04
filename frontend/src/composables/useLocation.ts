import { apiClient } from "@/helpers/ApiClient";
import { ref } from "vue";

export function useLocation() {

  /**
   * @const {Boolean} fetchingLocation
   */
  const fetchingLocations = ref(false);

  /**
   * @const {Array} locations
   */
  const locations = ref([] as Location[]);

  /**
   *
   * @param {String} key
   */
  async function searchLocation(key: String) {
    fetchingLocations.value = true;
    const response = await apiClient(`/locations?q=${key}`, {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
    });

    locations.value = response.data;

    fetchingLocations.value = false;
  }

  return {
    fetchingLocations,
    searchLocation,
    locations,
  }
}
