export type LocationWeather = {
  id: number
  name: string
  date: string
  visibility: number
  wind: Wind
  coordinates: Coordinates
  weather: Weather
  base: string
  main: Main
  sys: Sys
}

export type Wind = {
  speed: number
  deg: number
}

export type Weather = {
  id: number
  main: string
  description: string
  icon: string
}

export type Main = {
  temp: number
  feels_like: number
  temp_min: number
  temp_max: number
  pressure: number
  humidity: number
  sea_level: number
  grnd_level: number
}

export type Coordinates = {
  lon: number
  lat: number
}

export type Sys = {
  type: number
  id: number
  country: string
  sunrise: string
  sunset: string
}
