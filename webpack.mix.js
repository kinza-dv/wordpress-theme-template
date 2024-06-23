let mix = require("laravel-mix");

mix.js("src/js/app.js", "js/scripts.js").react();

mix.sass("src/scss/app.scss", "styles/style.css").options({ processCssUrls: false });
