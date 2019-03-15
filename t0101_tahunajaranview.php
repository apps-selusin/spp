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
$t0101_tahunajaran_view = new t0101_tahunajaran_view();

// Run the page
$t0101_tahunajaran_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0101_tahunajaran_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0101_tahunajaran->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0101_tahunajaranview = currentForm = new ew.Form("ft0101_tahunajaranview", "view");

// Form_CustomValidate event
ft0101_tahunajaranview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0101_tahunajaranview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0101_tahunajaranview.lists["x_Aktif"] = <?php echo $t0101_tahunajaran_view->Aktif->Lookup->toClientList() ?>;
ft0101_tahunajaranview.lists["x_Aktif"].options = <?php echo JsonEncode($t0101_tahunajaran_view->Aktif->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0101_tahunajaran->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0101_tahunajaran_view->ExportOptions->render("body") ?>
<?php $t0101_tahunajaran_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0101_tahunajaran_view->showPageHeader(); ?>
<?php
$t0101_tahunajaran_view->showMessage();
?>
<form name="ft0101_tahunajaranview" id="ft0101_tahunajaranview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0101_tahunajaran_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0101_tahunajaran_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0101_tahunajaran">
<input type="hidden" name="modal" value="<?php echo (int)$t0101_tahunajaran_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0101_tahunajaran->AwalBulan->Visible) { // AwalBulan ?>
	<tr id="r_AwalBulan">
		<td class="<?php echo $t0101_tahunajaran_view->TableLeftColumnClass ?>"><span id="elh_t0101_tahunajaran_AwalBulan"><?php echo $t0101_tahunajaran->AwalBulan->caption() ?></span></td>
		<td data-name="AwalBulan"<?php echo $t0101_tahunajaran->AwalBulan->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_AwalBulan">
<span<?php echo $t0101_tahunajaran->AwalBulan->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AwalBulan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0101_tahunajaran->AwalTahun->Visible) { // AwalTahun ?>
	<tr id="r_AwalTahun">
		<td class="<?php echo $t0101_tahunajaran_view->TableLeftColumnClass ?>"><span id="elh_t0101_tahunajaran_AwalTahun"><?php echo $t0101_tahunajaran->AwalTahun->caption() ?></span></td>
		<td data-name="AwalTahun"<?php echo $t0101_tahunajaran->AwalTahun->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_AwalTahun">
<span<?php echo $t0101_tahunajaran->AwalTahun->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AwalTahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0101_tahunajaran->AkhirBulan->Visible) { // AkhirBulan ?>
	<tr id="r_AkhirBulan">
		<td class="<?php echo $t0101_tahunajaran_view->TableLeftColumnClass ?>"><span id="elh_t0101_tahunajaran_AkhirBulan"><?php echo $t0101_tahunajaran->AkhirBulan->caption() ?></span></td>
		<td data-name="AkhirBulan"<?php echo $t0101_tahunajaran->AkhirBulan->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_AkhirBulan">
<span<?php echo $t0101_tahunajaran->AkhirBulan->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AkhirBulan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0101_tahunajaran->AkhirTahun->Visible) { // AkhirTahun ?>
	<tr id="r_AkhirTahun">
		<td class="<?php echo $t0101_tahunajaran_view->TableLeftColumnClass ?>"><span id="elh_t0101_tahunajaran_AkhirTahun"><?php echo $t0101_tahunajaran->AkhirTahun->caption() ?></span></td>
		<td data-name="AkhirTahun"<?php echo $t0101_tahunajaran->AkhirTahun->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_AkhirTahun">
<span<?php echo $t0101_tahunajaran->AkhirTahun->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AkhirTahun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0101_tahunajaran->TahunAjaran->Visible) { // TahunAjaran ?>
	<tr id="r_TahunAjaran">
		<td class="<?php echo $t0101_tahunajaran_view->TableLeftColumnClass ?>"><span id="elh_t0101_tahunajaran_TahunAjaran"><?php echo $t0101_tahunajaran->TahunAjaran->caption() ?></span></td>
		<td data-name="TahunAjaran"<?php echo $t0101_tahunajaran->TahunAjaran->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_TahunAjaran">
<span<?php echo $t0101_tahunajaran->TahunAjaran->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->TahunAjaran->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0101_tahunajaran->Aktif->Visible) { // Aktif ?>
	<tr id="r_Aktif">
		<td class="<?php echo $t0101_tahunajaran_view->TableLeftColumnClass ?>"><span id="elh_t0101_tahunajaran_Aktif"><?php echo $t0101_tahunajaran->Aktif->caption() ?></span></td>
		<td data-name="Aktif"<?php echo $t0101_tahunajaran->Aktif->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_Aktif">
<span<?php echo $t0101_tahunajaran->Aktif->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->Aktif->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0101_tahunajaran_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0101_tahunajaran->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0101_tahunajaran_view->terminate();
?>