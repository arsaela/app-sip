<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


/* add custom routes admin in S.I.P*/
$routes->get('/DataAdmin', 'DataAdmin::index');
$routes->get('/DataAdmin/add/', 'DataAdmin::add');
$routes->get('/DataAdmin/save_update_admin/', 'DataAdmin::save_update_admin');
$routes->get('/DataAdmin/delete_admin/(:segment)', 'DataAdmin::delete_admin/$1');

$routes->get('/datapetugas', 'DataPetugas::index');
$routes->get('/datapetugas/add/', 'DataPetugas::add');
$routes->get('/datapetugas/update/', 'DataPetugas::update');
$routes->get('/datapetugas/delete/(:segment)', 'DataPetugas::delete/$1');
$routes->get('/datapetugas/ajaxdatapetugas', 'Datapetugas::ajaxdatapetugas');


$routes->get('/DataPegawai', 'DataPegawai::index');
$routes->get('/DataInstansi/', 'DataInstansi::index');
$routes->get('/DataFormasi/detail_formasi/(:segment)', 'DataFormasi::detail_formasi/$1');
$routes->get('/DataUsulan/cetakdatausulan', 'DataUsulan::cetakdatausulan');

$routes->get('/DataInformasi', 'DataInformasi::index');
$routes->get('/DataInformasi/update_informasi/(:segment)', 'DataInformasi::update_informasi/$1');
$routes->get('/DataAlurPengusulan', 'DataAlurPengusulan::index');
$routes->get('/DataAlurPengusulan/add_alur_pengusulan', 'DataAlurPengusulan::add_alur_pengusulan');
$routes->get('/DataAlurPengusulan/edit_save_alur_pengusulan/', 'DataAlurPengusulan::edit_save_alur_pengusulan');
$routes->get('/DataAlurPengusulan/delete_alur_pengusulan/(:segment)', 'DataAlurPengusulan::delete_alur_pengusulan/$1');

$routes->get('/SetBatasUsulan', 'SetBatasUsulan::index');
$routes->get('/SetBatasUsulan/update/(:segment)', 'SetBatasUsulan::update/$1');
$routes->get('/SetBatasUsulan/edit/(:segment)', 'SetBatasUsulan::edit/$1');

$routes->get('/importpegawai', 'importpegawai::index');
$routes->get('/importpegawai/import', 'importpegawai::import');





/* add custom routes OPD in S.I.P*/
$routes->get('/opd/DataFormasi', 'DataFormasi::index');
$routes->get('/opd/DataKekuranganFormasi', 'DataKekuranganFormasi::index');
$routes->get('/opd/DataKelebihanFormasi', 'DataKelebihanFormasi::index');
$routes->get('/opd/DataUsulan/inputusulanopd', 'DataUsulan::inputusulanopd');
$routes->get('/opd/DataUsulan/lihatusulanopd', 'DataUsulan::lihatusulanopd');
$routes->get('/opd/DataUsulan/kirimdatausulanopd', 'DataUsulan::kirimdatausulanopd');
$routes->get('/opd/DataUsulan/cetakdatausulan', 'DataUsulan::cetakdatausulan');
$routes->get('/opd/DataUsulan/rekapusulanopd', 'DataUsulan::rekapusulanopd');




//$routes->get('notification', 'MessageController::showSweetAlertMessages');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
