/** @type {import('tailwindcss').Config} */
const plugin = require( 'tailwindcss/plugin' );
const defaultColors = require( 'tailwindcss/colors' );
const fs = require( 'fs' );
const path = require( 'path' );

// Read and parse the theme.json file.
const themePath = path.join( __dirname, 'theme.json' );
const themeData = JSON.parse( fs.readFileSync( themePath, 'utf8' ) );

// Extract colors, sizes, and font families.
const colors = themeData.settings.color.palette.reduce( ( acc, color ) => {
	acc[ color.slug ] = `var(--wp--preset--color--${ color.slug })`;
	return acc;
}, {} );

const fontSizes = themeData.settings.typography.fontSizes.reduce(
	( acc, size ) => {
		acc[ size.slug ] = `var(--wp--preset--font-size--${ size.slug })`;
		return acc;
	},
	{}
);

const fontFamilies = themeData.settings.typography.fontFamilies.reduce(
	( acc, family ) => {
		acc[ family.slug ] = `var(--wp--preset--font-family--${ family.slug })`;
		return acc;
	},
	{}
);

const shadows = themeData.settings.shadow.presets.reduce( ( acc, shadow ) => {
	acc[ shadow.slug ] = `var(--wp--preset--shadow--${ shadow.slug })`;
	return acc;
}, {} );

module.exports = {
	prefix: 'wcb-',
	content: [
		'./blocks/**/*.php',
		'./blocks/**/*.js',
		'./components/**/*.php',
		'./src/**/*.php',
		'./assets/**/*.js',
		'./assets/styles/**/*.css',
	],
	theme: {
		extend: {
			fontSize: fontSizes,
			fontFamily: fontFamilies,
			colors: {
				transparent: 'transparent',
				current: 'currentColor',
				...colors,
			},
			boxShadow: shadows,
		},
	},
	corePlugins: {
		preflight: false, // Remove Tailwind's reset.
	},
	plugins: [
		'postcss-import',
		plugin( ( { matchUtilities, theme } ) => {
			matchUtilities( {
				clamp( value ) {
					// Load font sizes from theme.
					const sizes = theme( 'fontSize' );

					// Parse the value passed in from class name.
					// Split it by "-" and compare pieces to fontSize values.
					const split = value
						.split( '-' )
						.map( ( v ) => ( sizes[ v ] ? sizes[ v ][ '0' ] : v ) );

					// Return a clamped font-size.
					return {
						fontSize: `clamp(${ split[ 0 ] }, ${ split[ 1 ] }, ${ split[ 2 ] })`,
					};
				},
			} );
		} ),
	],
};
