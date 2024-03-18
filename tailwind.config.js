/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./node_modules/flowbite/**/*.js",
        "./src/ApplicationParameters.php",
        "./src/Framework/Handler/**/*.php",
        "./src/Framework/resource/layout/**/*.php",
        "./src/UseCase/Home/view/**/*.php",
        "./vendor/ui-awesome/html-component/src/Cookbook/**/Flowbite*.php",
    ],
    darkMode: "class",
    plugins: [
        require('flowbite/plugin')
    ],
}
