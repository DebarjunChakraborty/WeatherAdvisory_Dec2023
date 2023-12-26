/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*"],
  theme: {
    extend: {
      screens: {
        'tablet': '640px',
        'lg': '1024px',
        'desktop': '1280px',
      },
      colors: {
        primaryColor: '#FFFFFF',
        secondoryColor: '#47C28C',
        pageColor: '#F3F8FA',
        btncolor: '#174F23',
        hoverColor:'#f5b547',
        footerColor:'#C9AA67',
        footerText:'#DCCD98',
      }
    },
  },
  plugins: [],
}