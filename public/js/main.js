require.config({
  // Base path used to load scripts
  baseUrl: '/js',
  deps: ['app'],

  // Prevent caching during dev
  urlArgs: "t=" + (new Date()).getTime(),

  // Set common library paths
  paths: {
    jquery: 'node_modules/jquery/dist/jquery.min',
    lodash: 'node_modules/lodash/lodash.min',
    backbone: 'node_modules/backbone/backbone-min',
    toastr: 'node_modules/toastr/build/toastr.min'
  },
  map: {
    "*": {
      "underscore": "lodash"
    }
  }
});
