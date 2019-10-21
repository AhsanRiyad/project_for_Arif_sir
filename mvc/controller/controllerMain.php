<?php 


include APP_ROOT.'lib/linker_files/headerAllTogether.php';
include APP_ROOT.'lib/linker_files/db.php';
include APP_ROOT.'mvc/controller/controllerPagesUrlList.php';

if($pageCategory=='visibleToAll')
{
include (APP_ROOT.'mvc/controller/controllerSession.php');
include APP_ROOT.'mvc/view/viewHeader.php';
if($pageName == 'index')
{	
	include APP_ROOT.'mvc/view/viewCssIndex.php';
	include APP_ROOT.'mvc/controller/controllerIndex.php';
	include APP_ROOT.'lib/linker_files/footerAllTogether.php';
}
if($pageName == 'login')
{
	include APP_ROOT.'mvc/view/viewCssLogin.php';
	include APP_ROOT.'mvc/controller/controllerLogin.php';
	include APP_ROOT.'lib/linker_files/footerAllTogether.php';
}
if($pageName == 'registration')
{
	include APP_ROOT.'mvc/view/viewCssRegistration.php';
	include APP_ROOT.'mvc/controller/controllerReg.php';
	include APP_ROOT.'lib/linker_files/footerAllTogether.php';
}
if($pageName == 'indexProductDetails')
{
	include APP_ROOT.'mvc/view/viewCssRegistration.php';
	include APP_ROOT.'mvc/controller/controllerIndexProductDetails.php';
	include APP_ROOT.'lib/linker_files/footerAllTogether.php';
}
if($pageName == 'IndexCart')
{
	include APP_ROOT.'mvc/view/viewCssIndexCart.php';
	include APP_ROOT.'mvc/controller/controllerIndexCart.php';
	include APP_ROOT.'lib/linker_files/footerAllTogether.php';
}


}



if($pageCategory=='visibleToRegistered')
{
include (APP_ROOT.'mvc/controller/controllerSessionDashboard.php');
include APP_ROOT.'mvc/view/viewHeaderDashboard.php';
if($pageName == 'dashboardHome')
{
	
	include APP_ROOT.'mvc/view/viewCssDashboardHome.php';
	include APP_ROOT.'mvc/controller/controllerHomeDashboard.php';
	include APP_ROOT.'lib/linker_files/linkerJs.php';
}
if($pageName == 'dashboardProfile')
{
	include APP_ROOT.'mvc/view/viewCssIndexProductDetails.php';
	include APP_ROOT.'mvc/controller/controllerProfileDashboard.php';
	include APP_ROOT.'lib/linker_files/linkerJs.php';
}
if($pageName == 'addProductBySeller')
{
	include APP_ROOT.'mvc/view/viewCssAddProductBySeller.php';
	include APP_ROOT.'mvc/controller/controllerAddProductBySeller.php';
	include APP_ROOT.'lib/linker_files/linkerJs.php';
}
if($pageName == 'dashboardProfileUpdate')
{
	include APP_ROOT.'mvc/view/viewCssDashboardProfileUpdate.php';
	include APP_ROOT.'mvc/controller/controllerProfileUpdateDashboard.php';
	//linker js library is added in controller individual page
	//bacause there is problem with jquery library
}
}
?>