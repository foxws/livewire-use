import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
  content: ['./resources/**/*.blade.php', './vendor/foxws/livewire-use/**/*.blade.php', './vendor/foxws/livewire-use/**/*.php'],
  plugins: [forms, typography],
};
