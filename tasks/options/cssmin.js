module.exports = {
	options: {
		banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
		' * <%=pkg.homepage %>\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
		' * Licensed GPLv2+' +
		' */\n'
	},
	minify: {
		expand: true,

		cwd: 'assets/css/',
		src: ['wp-api-grid.css'],

		dest: 'assets/css/',
		ext: '.min.css'
	}
};