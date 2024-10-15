export const Tanggal = (value: string) => {
  const date = new Date(value);
  return `${date.getDate()} ${date.toLocaleString('ind', { month: 'short' })} ${date.getFullYear()}`;
};
