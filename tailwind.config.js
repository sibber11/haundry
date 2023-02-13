/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/*.blade.php",
        "./resources/views/layouts/*.blade.php",
        "./resources/views/customer/**/*.blade.php",
        "./resources/views/components/**/*.blade.php",
        "./resources/views/sections/**/*.blade.php",
        "./resources/views/guest/**/*.blade.php",
        "resources/views/vendor/pagination/tailwind.blade.php",
        "resources/js/components/*.vue"
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
