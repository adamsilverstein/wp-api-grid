module.exports = {
	dist: {
		options: {
			processors: [
				require('autoprefixer')({browsers: 'last 2 versions'})
			]
		},
		files: { 
			'assets/css/wp-api-grid.css': [ 'assets/css/wp-api-grid.css' ]
		}
	}
};