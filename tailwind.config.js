/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/newindex.blade.php",
        "./resources/views/layouts/nav.blade.php"
    ],
    theme: {
        extend: {
            colors: {
                'macaw': {
                    100: '#e7feff',
                    900: '#3fc1c9',
                }
            }
        },
    },
    plugins: [],
}
