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
$t0104_daftarsiswamaster_view = new t0104_daftarsiswamaster_view();

// Run the page
$t0104_daftarsiswamaster_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0104_daftarsiswamaster_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0104_daftarsiswamaster->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0104_daftarsiswamasterview = currentForm = new ew.Form("ft0104_daftarsiswamasterview", "view");

// Form_CustomValidate event
ft0104_daftarsiswamasterview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0104_daftarsiswamasterview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0104_daftarsiswamasterview.lists["x_tahunajaran_id"] = <?php echo $t0104_daftarsiswamaster_view->tahunajaran_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasterview.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_view->tahunajaran_id->lookupOptions()) ?>;
ft0104_daftarsiswamasterview.lists["x_sekolah_id"] = <?php echo $t0104_daftarsiswamaster_view->sekolah_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasterview.lists["x_sekolah_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_view->sekolah_id->lookupOptions()) ?>;
ft0104_daftarsiswamasterview.lists["x_kelas_id"] = <?php echo $t0104_daftarsiswamaster_view->kelas_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasterview.lists["x_kelas_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_view->kelas_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0104_daftarsiswamaster->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0104_daftarsiswamaster_view->ExportOptions->render("body") ?>
<?php $t0104_daftarsiswamaster_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0104_daftarsiswamaster_view->showPageHeader(); ?>
<?php
$t0104_daftarsiswamaster_view->showMessage();
?>
<form name="ft0104_daftarsiswamasterview" id="ft0104_daftarsiswamasterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0104_daftarsiswamaster_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0104_daftarsiswamaster_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0104_daftarsiswamaster">
<input type="hidden" name="modal" value="<?php echo (int)$t0104_daftarsiswamaster_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0104_daftarsiswamaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<tr id="r_tahunajaran_id">
		<td class="<?php echo $t0104_daftarsiswamaster_view->TableLeftColumnClass ?>"><span id="elh_t0104_daftarsiswamaster_tahunajaran_id"><?php echo $t0104_daftarsiswamaster->tahunajaran_id->caption() ?></span></td>
		<td data-name="tahunajaran_id"<?php echo $t0104_daftarsiswamaster->tahunajaran_id->cellAttributes() ?>>
<span id="el_t0104_daftarsiswamaster_tahunajaran_id">
<span<?php echo $t0104_daftarsiswamaster->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->sekolah_id->Visible) { // sekolah_id ?>
	<tr id="r_sekolah_id">
		<td class="<?php echo $t0104_daftarsiswamaster_view->TableLeftColumnClass ?>"><span id="elh_t0104_daftarsiswamaster_sekolah_id"><?php echo $t0104_daftarsiswamaster->sekolah_id->caption() ?></span></td>
		<td data-name="sekolah_id"<?php echo $t0104_daftarsiswamaster->sekolah_id->cellAttributes() ?>>
<span id="el_t0104_daftarsiswamaster_sekolah_id">
<span<?php echo $t0104_daftarsiswamaster->sekolah_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->sekolah_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->kelas_id->Visible) { // kelas_id ?>
	<tr id="r_kelas_id">
		<td class="<?php echo $t0104_daftarsiswamaster_view->TableLeftColumnClass ?>"><span id="elh_t0104_daftarsiswamaster_kelas_id"><?php echo $t0104_daftarsiswamaster->kelas_id->caption() ?></span></td>
		<td data-name="kelas_id"<?php echo $t0104_daftarsiswamaster->kelas_id->cellAttributes() ?>>
<span id="el_t0104_daftarsiswamaster_kelas_id">
<span<?php echo $t0104_daftarsiswamaster->kelas_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->kelas_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("t0105_daftarsiswadetail", explode(",", $t0104_daftarsiswamaster->getCurrentDetailTable())) && $t0105_daftarsiswadetail->DetailView) {
?>
<?php if ($t0104_daftarsiswamaster->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t0105_daftarsiswadetail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t0105_daftarsiswadetailgrid.php" ?>
<?php } ?>
</form>
<?php
$t0104_daftarsiswamaster_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0104_daftarsiswamaster->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0104_daftarsiswamaster_view->terminate();
?>