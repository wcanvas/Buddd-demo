const fs = require( 'fs' );
const path = require( 'path' );
const glob = require( 'glob' );
const { parse } = require( '@babel/parser' );
const traverse = require( '@babel/traverse' ).default;

function getDependencies() {
	// Directories containing your JS files
	const jsDirectories = [
		path.resolve( __dirname, '../assets/js' ),
		path.resolve( __dirname, '../blocks' ),
	];

	// Get all JS files from the specified directories
	const files = jsDirectories.flatMap( ( directory ) =>
		glob.sync( `${ directory }/**/*.js` )
	);

	// Read the existing dependencies file if it exists
	let existingDependencies = {};
	const dependenciesPath = path.resolve( __dirname, 'dependencies.json' );
	if ( fs.existsSync( dependenciesPath ) ) {
		existingDependencies = JSON.parse(
			fs.readFileSync( dependenciesPath, 'utf-8' )
		);
	}

	// Object to store dependencies
	const dependencies = {};

	// First, preserve all manual dependencies from the existing file
	Object.entries( existingDependencies ).forEach( ( [ key, dependency ] ) => {
		if ( dependency.manual === true ) {
			dependencies[ key ] = dependency;
		}
	} );

	// Function to get the object name from the module's package.json
	const getObjectName = ( modulePath ) => {
		const packageJsonPath = path.join( modulePath, 'package.json' );
		if ( fs.existsSync( packageJsonPath ) ) {
			const packageJson = JSON.parse(
				fs.readFileSync( packageJsonPath, 'utf-8' )
			);
			return packageJson.globalObject || path.basename( modulePath );
		}
		return path.basename( modulePath );
	};

	// Function to find the minified file in the module
	const findMinifiedFile = ( modulePath, moduleName, fileType ) => {
		const distPath = path.join( modulePath, 'dist' );
		if ( fs.existsSync( distPath ) ) {
			const minFiles = glob.sync(
				`${ distPath }/**/*.min.${ fileType }`
			);
			if ( minFiles.length > 0 ) {
				return (
					minFiles.find( ( file ) => file.includes( moduleName ) ) ||
					minFiles[ 0 ]
				);
			}
		}
		const minifiedFile = path.join(
			modulePath,
			`${ moduleName }.min.${ fileType }`
		);
		if ( fs.existsSync( minifiedFile ) ) {
			return minifiedFile;
		}

		// Search for any .min.js or .min.css file in the module if not found in dist
		const allMinFiles = glob.sync(
			`${ modulePath }/**/*.min.${ fileType }`
		);
		if ( allMinFiles.length > 0 ) {
			return allMinFiles[ 0 ];
		}
		return null;
	};

	// Function to get the module name from the package.json
	const getModuleName = ( source ) => {
		const modulePath = path.resolve( __dirname, 'node_modules', source );
		const packageJsonPath = path.join( modulePath, 'package.json' );
		if ( fs.existsSync( packageJsonPath ) ) {
			const packageJson = JSON.parse(
				fs.readFileSync( packageJsonPath, 'utf-8' )
			);
			if ( packageJson.main || packageJson.module ) {
				const entryPoint = packageJson.main || packageJson.module;
				return path.basename( entryPoint, '.js' );
			}
		}
		return path.basename( source );
	};

	// List of handles to exclude.
	const excludedHandles = [
		'@babel/runtime/regenerator',
		'@wordpress/*',
		'jquery',
		'lodash-es',
		'lodash',
		'lodash.debounce',
		'moment',
		'react-dom',
		'react',
	];

	files.forEach( ( file ) => {
		const content = fs.readFileSync( file, 'utf-8' );
		const ast = parse( content, { sourceType: 'module' } );

		traverse( ast, {
			ImportDeclaration( { node } ) {
				const source = node.source.value;

				// Ignore relative imports and @wordpress imports
				if (
					source.startsWith( '.' ) ||
					source.startsWith( '/' ) ||
					source.startsWith( '@wordpress' )
				) {
					return;
				}

				// Check if the handle is in the excluded list.
				if (
					excludedHandles.some(
						( handle ) =>
							source === handle ||
							( handle.endsWith( '*' ) &&
								handle.startsWith( '@wordpress/' ) &&
								source.startsWith( handle.slice( 0, -1 ) ) )
					)
				) {
					return;
				}

				// Skip if this dependency was already added as a manual dependency
				if (
					dependencies[ source ] &&
					dependencies[ source ].manual === true
				) {
					return;
				}

				// Get the complete path of the module from node_modules
				try {
					const modulePath = path.dirname(
						require.resolve( source, {
							paths: [
								path.resolve( __dirname, 'node_modules' ),
							],
						} )
					);

					const objectName = getModuleName( source );
					const jsPath = findMinifiedFile(
						modulePath,
						objectName,
						'js'
					);
					const cssPath = findMinifiedFile(
						modulePath,
						objectName,
						'css'
					);

					dependencies[ source ] = {
						handle: source,
						globalObject: objectName,
						jsPath: jsPath
							? path.relative(
									path.resolve( __dirname, '..' ),
									jsPath
							  )
							: null,
						cssPath: cssPath
							? path.relative(
									path.resolve( __dirname, '..' ),
									cssPath
							  )
							: null,
						manual: existingDependencies[ source ]?.manual || false,
					};
				} catch ( error ) {
					console.error( `Could not resolve module: ${ source }` );
				}
			},
		} );
	} );

	// Save the dependencies to a JSON file
	fs.writeFileSync(
		dependenciesPath,
		JSON.stringify( dependencies, null, 2 )
	);
	console.warn( 'Dependencies saved to dependencies.json' );
}

module.exports = getDependencies;
