import type { Coordinates } from "./weather"

export type Location = {
  country: String
  country_code: String
  city: String
  coordinates: Coordinates
  formatted: String
}
