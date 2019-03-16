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
$t0301_bayarmaster_view = new t0301_bayarmaster_view();

// Run the page
$t0301_bayarmaster_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0301_bayarmaster_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0301_bayarmaster->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0301_bayarmasterview = currentForm = new ew.Form("ft0301_bayarmasterview", "view");

// Form_CustomValidate event
ft0301_bayarmasterview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0301_bayarmasterview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0301_bayarmasterview.lists["x_tahunajaran_id"] = <?php echo $t0301_bayarmaster_view->tahunajaran_id->Lookup->toClientList() ?>;
ft0301_bayarmasterview.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0301_bayarmaster_view->tahunajaran_id->lookupOptions()) ?>;
ft0301_bayarmasterview.lists["x_siswa_id"] = <?php echo $t0301_bayarmaster_view->siswa_id->Lookup->toClientList() ?>;
ft0301_bayarmasterview.lists["x_siswa_id"].options = <?php echo JsonEncode($t0301_bayarmaster_view->siswa_id->lookupOptions()) ?>;
ft0301_bayarmasterview.autoSuggests["x_siswa_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0301_bayarmaster->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0301_bayarmaster_view->ExportOptions->render("body") ?>
<?php $t0301_bayarmaster_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0301_bayarmaster_view->showPageHeader(); ?>
<?php
$t0301_bayarmaster_view->showMessage();
?>
<form name="ft0301_bayarmasterview" id="ft0301_bayarmasterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0301_bayarmaster_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0301_bayarmaster_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0301_bayarmaster">
<input type="hidden" name="modal" value="<?php echo (int)$t0301_bayarmaster_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0301_bayarmaster->Nomor->Visible) { // Nomor ?>
	<tr id="r_Nomor">
		<td class="<?php echo $t0301_bayarmaster_view->TableLeftColumnClass ?>"><span id="elh_t0301_bayarmaster_Nomor"><?php echo $t0301_bayarmaster->Nomor->caption() ?></span></td>
		<td data-name="Nomor"<?php echo $t0301_bayarmaster->Nomor->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_Nomor">
<span<?php echo $t0301_bayarmaster->Nomor->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Nomor->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0301_bayarmaster->Tanggal->Visible) { // Tanggal ?>
	<tr id="r_Tanggal">
		<td class="<?php echo $t0301_bayarmaster_view->TableLeftColumnClass ?>"><span id="elh_t0301_bayarmaster_Tanggal"><?php echo $t0301_bayarmaster->Tanggal->caption() ?></span></td>
		<td data-name="Tanggal"<?php echo $t0301_bayarmaster->Tanggal->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_Tanggal">
<span<?php echo $t0301_bayarmaster->Tanggal->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Tanggal->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0301_bayarmaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<tr id="r_tahunajaran_id">
		<td class="<?php echo $t0301_bayarmaster_view->TableLeftColumnClass ?>"><span id="elh_t0301_bayarmaster_tahunajaran_id"><?php echo $t0301_bayarmaster->tahunajaran_id->caption() ?></span></td>
		<td data-name="tahunajaran_id"<?php echo $t0301_bayarmaster->tahunajaran_id->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_tahunajaran_id">
<span<?php echo $t0301_bayarmaster->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0301_bayarmaster->siswa_id->Visible) { // siswa_id ?>
	<tr id="r_siswa_id">
		<td class="<?php echo $t0301_bayarmaster_view->TableLeftColumnClass ?>"><span id="elh_t0301_bayarmaster_siswa_id"><?php echo $t0301_bayarmaster->siswa_id->caption() ?></span></td>
		<td data-name="siswa_id"<?php echo $t0301_bayarmaster->siswa_id->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_siswa_id">
<span<?php echo $t0301_bayarmaster->siswa_id->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->siswa_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0301_bayarmaster->Total->Visible) { // Total ?>
	<tr id="r_Total">
		<td class="<?php echo $t0301_bayarmaster_view->TableLeftColumnClass ?>"><span id="elh_t0301_bayarmaster_Total"><?php echo $t0301_bayarmaster->Total->caption() ?></span></td>
		<td data-name="Total"<?php echo $t0301_bayarmaster->Total->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_Total">
<span<?php echo $t0301_bayarmaster->Total->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Total->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("t0302_bayardetail", explode(",", $t0301_bayarmaster->getCurrentDetailTable())) && $t0302_bayardetail->DetailView) {
?>
<?php if ($t0301_bayarmaster->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t0302_bayardetail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t0302_bayardetailgrid.php" ?>
<?php } ?>
</form>
<?php
$t0301_bayarmaster_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0301_bayarmaster->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0301_bayarmaster_view->terminate();
?>