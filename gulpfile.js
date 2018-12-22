const elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

elixir(mix => {
	const bowerPath = 'bower/vendor';

	mix.sass('resources/assets/sass/app.scss', 'resources/assets/css');

	mix.styles(
		[
			'css/app.css',
			`${bowerPath}/slick-carousel/slick/slick.css`,
			`${bowerPath}/components-font-awesome/css/fontawesome-all.css`
		],
		'public/css/app.css',
		'resources/assets'
	);

	mix.copy(`resources/assets/${bowerPath}/components-font-awesome/webfonts`, 'public/webfonts');

	mix.scripts(
		[
			`${bowerPath}/jquery/dist/jquery.min.js`,
			`${bowerPath}/foundation-sites/dist/js/foundation.min.js`,
			`${bowerPath}/slick-carousel/slick/slick.min.js`,
			'js/*.js'
		],
		'public/js/app.js',
		'resources/assets'
	);
});
