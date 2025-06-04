export function localizeDate(date: string | number) {
  const dateObj = new Date(date)
  return dateObj.toLocaleString('en-US', {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit',
  })
}

export function localTime(date: string | number) {
  const dateObj = new Date(date)
  return dateObj.toLocaleString('en-US', {
    hour: '2-digit',
    minute: '2-digit',
  })
}
