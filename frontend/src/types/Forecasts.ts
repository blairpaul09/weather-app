import type { Sys, Weather, Wind } from "./weather"

export type Forecasts = {
  date: string
  main: ForecastsMain
  weather: Weather
  wind: Wind
  visibility: Number
  pop: Number
  sys: Sys
}

export type ForecastsMain = {
  temp: Number
  feels_like: Number
  temp_min: Number
  temp_max: Number
  pressure: Number
  sea_level: Number
  grnd_level: Number
  humidity: Number
  temp_kf: Number
}
