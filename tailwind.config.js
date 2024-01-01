import theme from './resources/css/presets/tailwind.config.preset';

/** @type {import('tailwindcss').Config} */
export default {
  presets: [theme],
  content: ['./resources/**/*.blade.php', './src/**/*.php'],
};
