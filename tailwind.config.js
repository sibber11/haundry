/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/index.blade.php",
        "./resources/views/layouts/*.blade.php",
        "./resources/views/customer/**/*.blade.php",
        "resources/views/vendor/pagination/tailwind.blade.php",
        "resources/js/components/CustomerOrderFields.vue"
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
