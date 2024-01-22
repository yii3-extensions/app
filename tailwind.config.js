/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./node_modules/flowbite/**/*.js",
        "./src/Framework/Handler/**/*.php",
        "./src/Framework/resource/layout/**/*.php",
        "./src/UseCase/Home/view/**/*.php",
        "./src/ApplicationParameters.php",
        "./vendor/php-forge/awesome-component/src/Cookbook/Flowbite/**/*.php",
    ],
    darkMode: "class",
    plugins: [
        require('flowbite/plugin')
    ],
}
