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
$t0105_daftarsiswadetail_view = new t0105_daftarsiswadetail_view();

// Run the page
$t0105_daftarsiswadetail_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0105_daftarsiswadetail_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0105_daftarsiswadetail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0105_daftarsiswadetailview = currentForm = new ew.Form("ft0105_daftarsiswadetailview", "view");

// Form_CustomValidate event
ft0105_daftarsiswadetailview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0105_daftarsiswadetailview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0105_daftarsiswadetailview.lists["x_siswa_id"] = <?php echo $t0105_daftarsiswadetail_view->siswa_id->Lookup->toClientList() ?>;
ft0105_daftarsiswadetailview.lists["x_siswa_id"].options = <?php echo JsonEncode($t0105_daftarsiswadetail_view->siswa_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0105_daftarsiswadetail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0105_daftarsiswadetail_view->ExportOptions->render("body") ?>
<?php $t0105_daftarsiswadetail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0105_daftarsiswadetail_view->showPageHeader(); ?>
<?php
$t0105_daftarsiswadetail_view->showMessage();
?>
<form name="ft0105_daftarsiswadetailview" id="ft0105_daftarsiswadetailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0105_daftarsiswadetail_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0105_daftarsiswadetail_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0105_daftarsiswadetail">
<input type="hidden" name="modal" value="<?php echo (int)$t0105_daftarsiswadetail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0105_daftarsiswadetail->daftarsiswamaster_id->Visible) { // daftarsiswamaster_id ?>
	<tr id="r_daftarsiswamaster_id">
		<td class="<?php echo $t0105_daftarsiswadetail_view->TableLeftColumnClass ?>"><span id="elh_t0105_daftarsiswadetail_daftarsiswamaster_id"><?php echo $t0105_daftarsiswadetail->daftarsiswamaster_id->caption() ?></span></td>
		<td data-name="daftarsiswamaster_id"<?php echo $t0105_daftarsiswadetail->daftarsiswamaster_id->cellAttributes() ?>>
<span id="el_t0105_daftarsiswadetail_daftarsiswamaster_id">
<span<?php echo $t0105_daftarsiswadetail->daftarsiswamaster_id->viewAttributes() ?>>
<?php echo $t0105_daftarsiswadetail->daftarsiswamaster_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
	<tr id="r_siswa_id">
		<td class="<?php echo $t0105_daftarsiswadetail_view->TableLeftColumnClass ?>"><span id="elh_t0105_daftarsiswadetail_siswa_id"><?php echo $t0105_daftarsiswadetail->siswa_id->caption() ?></span></td>
		<td data-name="siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->cellAttributes() ?>>
<span id="el_t0105_daftarsiswadetail_siswa_id">
<span<?php echo $t0105_daftarsiswadetail->siswa_id->viewAttributes() ?>>
<?php echo $t0105_daftarsiswadetail->siswa_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0105_daftarsiswadetail_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0105_daftarsiswadetail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0105_daftarsiswadetail_view->terminate();
?>