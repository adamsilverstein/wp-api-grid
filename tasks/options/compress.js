module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/apigrid.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'apigrid/'
	}
};