const BASE_URL = import.meta.env.VITE_API_URL

export async function apiClient(path: string, options?: RequestInit) {
  const response = await fetch(`${BASE_URL}${path}`, options)

  if (!response.ok) {
    throw new Error(`API error: ${response.status} ${response.statusText}`)
  }

  const data = await response.json()

  return data
}
