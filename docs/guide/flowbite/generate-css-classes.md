# Generate `CSS` classes for `Flowbite` components

This guide will help you to generate `CSS` classes for your `HTML` elements.

This demo includes the configuration of [Tailwind CSS](https://tailwindcss.com/) and [Flowbite](https://flowbite.com/).

## Config file `tailwind.config.js`

```js
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
```

## Generate `CSS` classes

```bash
npx tailwindcss -i node_modules/tailwindcss/tailwind.css -o src/Framework/resource/asset/css/app.css
```

## Generate `CSS` classes and minify

```bash
npx tailwindcss -i node_modules/tailwindcss/tailwind.css -o src/Framework/resource/asset/css/app.min.css --minify
```
