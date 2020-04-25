const mix = require('laravel-mix');



/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.webpackConfig({
  resolve: {
    alias: {
      'assets': path.resolve('resources/assets')
    }
  }
}); 

 mix.scripts([
'node_modules/admin-lte/plugins/jquery/jquery.min.js',
'node_modules/admin-lte/plugins/jquery/jquery-ui.min.js',
'node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js',
'node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js',
'node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
'node_modules/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js',
'node_modules/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
'node_modules/admin-lte/plugins/sweetalert2/sweetalert2.min.js',
'node_modules/admin-lte/plugins/toastr/toastr.min.js',
'node_modules/admin-lte/dist/js/adminlte.min.js',
'node_modules/highcharts/highcharts.js',
'node_modules/highcharts/highcharts-more.js',
'node_modules/highcharts/modules/solid-gauge.js',
'resources/assets/js/bootstrap.methods.js',
'resources/assets/js/dashboard.js',
'resources/assets/js/validaciones.ople.js',
'resources/assets/js/datatables.js',
'resources/assets/js/toastr.js',
'resources/assets/js/pdfobject.js',
'resources/assets/js/pusher.js',
'resources/assets/js/highcharts.js'
], 'public/js/all.js');

 mix.js('resources/js/app.js', 'public/js')
 .sass('resources/sass/app.scss', 'public/css');
 
 mix.copyDirectory('resources/assets/docs', 'public/docs');
 mix.copyDirectory('resources/assets/images', 'public/images');
