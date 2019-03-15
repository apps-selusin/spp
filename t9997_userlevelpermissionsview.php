<?php
namespace PHPMaker2019\spp_prj;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t9997_userlevelpermissions_view = new t9997_userlevelpermissions_view();

// Run the page
$t9997_userlevelpermissions_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9997_userlevelpermissions_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t9997_userlevelpermissions->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft9997_userlevelpermissionsview = currentForm = new ew.Form("ft9997_userlevelpermissionsview", "view");

// Form_CustomValidate event
ft9997_userlevelpermissionsview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9997_userlevelpermissionsview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t9997_userlevelpermissions->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t9997_userlevelpermissions_view->ExportOptions->render("body") ?>
<?php $t9997_userlevelpermissions_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t9997_userlevelpermissions_view->showPageHeader(); ?>
<?php
$t9997_userlevelpermissions_view->showMessage();
?>
<form name="ft9997_userlevelpermissionsview" id="ft9997_userlevelpermissionsview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9997_userlevelpermissions_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9997_userlevelpermissions_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9997_userlevelpermissions">
<input type="hidden" name="modal" value="<?php echo (int)$t9997_userlevelpermissions_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t9997_userlevelpermissions->userlevelid->Visible) { // userlevelid ?>
	<tr id="r_userlevelid">
		<td class="<?php echo $t9997_userlevelpermissions_view->TableLeftColumnClass ?>"><span id="elh_t9997_userlevelpermissions_userlevelid"><?php echo $t9997_userlevelpermissions->userlevelid->caption() ?></span></td>
		<td data-name="userlevelid"<?php echo $t9997_userlevelpermissions->userlevelid->cellAttributes() ?>>
<span id="el_t9997_userlevelpermissions_userlevelid">
<span<?php echo $t9997_userlevelpermissions->userlevelid->viewAttributes() ?>>
<?php echo $t9997_userlevelpermissions->userlevelid->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9997_userlevelpermissions->_tablename->Visible) { // tablename ?>
	<tr id="r__tablename">
		<td class="<?php echo $t9997_userlevelpermissions_view->TableLeftColumnClass ?>"><span id="elh_t9997_userlevelpermissions__tablename"><?php echo $t9997_userlevelpermissions->_tablename->caption() ?></span></td>
		<td data-name="_tablename"<?php echo $t9997_userlevelpermissions->_tablename->cellAttributes() ?>>
<span id="el_t9997_userlevelpermissions__tablename">
<span<?php echo $t9997_userlevelpermissions->_tablename->viewAttributes() ?>>
<?php echo $t9997_userlevelpermissions->_tablename->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9997_userlevelpermissions->permission->Visible) { // permission ?>
	<tr id="r_permission">
		<td class="<?php echo $t9997_userlevelpermissions_view->TableLeftColumnClass ?>"><span id="elh_t9997_userlevelpermissions_permission"><?php echo $t9997_userlevelpermissions->permission->caption() ?></span></td>
		<td data-name="permission"<?php echo $t9997_userlevelpermissions->permission->cellAttributes() ?>>
<span id="el_t9997_userlevelpermissions_permission">
<span<?php echo $t9997_userlevelpermissions->permission->viewAttributes() ?>>
<?php echo $t9997_userlevelpermissions->permission->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t9997_userlevelpermissions_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t9997_userlevelpermissions->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t9997_userlevelpermissions_view->terminate();
?>