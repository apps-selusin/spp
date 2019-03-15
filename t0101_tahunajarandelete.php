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
$t0101_tahunajaran_delete = new t0101_tahunajaran_delete();

// Run the page
$t0101_tahunajaran_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0101_tahunajaran_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0101_tahunajarandelete = currentForm = new ew.Form("ft0101_tahunajarandelete", "delete");

// Form_CustomValidate event
ft0101_tahunajarandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0101_tahunajarandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0101_tahunajarandelete.lists["x_Aktif"] = <?php echo $t0101_tahunajaran_delete->Aktif->Lookup->toClientList() ?>;
ft0101_tahunajarandelete.lists["x_Aktif"].options = <?php echo JsonEncode($t0101_tahunajaran_delete->Aktif->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0101_tahunajaran_delete->showPageHeader(); ?>
<?php
$t0101_tahunajaran_delete->showMessage();
?>
<form name="ft0101_tahunajarandelete" id="ft0101_tahunajarandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0101_tahunajaran_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0101_tahunajaran_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0101_tahunajaran">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0101_tahunajaran_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0101_tahunajaran->AwalBulan->Visible) { // AwalBulan ?>
		<th class="<?php echo $t0101_tahunajaran->AwalBulan->headerCellClass() ?>"><span id="elh_t0101_tahunajaran_AwalBulan" class="t0101_tahunajaran_AwalBulan"><?php echo $t0101_tahunajaran->AwalBulan->caption() ?></span></th>
<?php } ?>
<?php if ($t0101_tahunajaran->AwalTahun->Visible) { // AwalTahun ?>
		<th class="<?php echo $t0101_tahunajaran->AwalTahun->headerCellClass() ?>"><span id="elh_t0101_tahunajaran_AwalTahun" class="t0101_tahunajaran_AwalTahun"><?php echo $t0101_tahunajaran->AwalTahun->caption() ?></span></th>
<?php } ?>
<?php if ($t0101_tahunajaran->AkhirBulan->Visible) { // AkhirBulan ?>
		<th class="<?php echo $t0101_tahunajaran->AkhirBulan->headerCellClass() ?>"><span id="elh_t0101_tahunajaran_AkhirBulan" class="t0101_tahunajaran_AkhirBulan"><?php echo $t0101_tahunajaran->AkhirBulan->caption() ?></span></th>
<?php } ?>
<?php if ($t0101_tahunajaran->AkhirTahun->Visible) { // AkhirTahun ?>
		<th class="<?php echo $t0101_tahunajaran->AkhirTahun->headerCellClass() ?>"><span id="elh_t0101_tahunajaran_AkhirTahun" class="t0101_tahunajaran_AkhirTahun"><?php echo $t0101_tahunajaran->AkhirTahun->caption() ?></span></th>
<?php } ?>
<?php if ($t0101_tahunajaran->TahunAjaran->Visible) { // TahunAjaran ?>
		<th class="<?php echo $t0101_tahunajaran->TahunAjaran->headerCellClass() ?>"><span id="elh_t0101_tahunajaran_TahunAjaran" class="t0101_tahunajaran_TahunAjaran"><?php echo $t0101_tahunajaran->TahunAjaran->caption() ?></span></th>
<?php } ?>
<?php if ($t0101_tahunajaran->Aktif->Visible) { // Aktif ?>
		<th class="<?php echo $t0101_tahunajaran->Aktif->headerCellClass() ?>"><span id="elh_t0101_tahunajaran_Aktif" class="t0101_tahunajaran_Aktif"><?php echo $t0101_tahunajaran->Aktif->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0101_tahunajaran_delete->RecCnt = 0;
$i = 0;
while (!$t0101_tahunajaran_delete->Recordset->EOF) {
	$t0101_tahunajaran_delete->RecCnt++;
	$t0101_tahunajaran_delete->RowCnt++;

	// Set row properties
	$t0101_tahunajaran->resetAttributes();
	$t0101_tahunajaran->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0101_tahunajaran_delete->loadRowValues($t0101_tahunajaran_delete->Recordset);

	// Render row
	$t0101_tahunajaran_delete->renderRow();
?>
	<tr<?php echo $t0101_tahunajaran->rowAttributes() ?>>
<?php if ($t0101_tahunajaran->AwalBulan->Visible) { // AwalBulan ?>
		<td<?php echo $t0101_tahunajaran->AwalBulan->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_delete->RowCnt ?>_t0101_tahunajaran_AwalBulan" class="t0101_tahunajaran_AwalBulan">
<span<?php echo $t0101_tahunajaran->AwalBulan->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AwalBulan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0101_tahunajaran->AwalTahun->Visible) { // AwalTahun ?>
		<td<?php echo $t0101_tahunajaran->AwalTahun->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_delete->RowCnt ?>_t0101_tahunajaran_AwalTahun" class="t0101_tahunajaran_AwalTahun">
<span<?php echo $t0101_tahunajaran->AwalTahun->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AwalTahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0101_tahunajaran->AkhirBulan->Visible) { // AkhirBulan ?>
		<td<?php echo $t0101_tahunajaran->AkhirBulan->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_delete->RowCnt ?>_t0101_tahunajaran_AkhirBulan" class="t0101_tahunajaran_AkhirBulan">
<span<?php echo $t0101_tahunajaran->AkhirBulan->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AkhirBulan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0101_tahunajaran->AkhirTahun->Visible) { // AkhirTahun ?>
		<td<?php echo $t0101_tahunajaran->AkhirTahun->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_delete->RowCnt ?>_t0101_tahunajaran_AkhirTahun" class="t0101_tahunajaran_AkhirTahun">
<span<?php echo $t0101_tahunajaran->AkhirTahun->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AkhirTahun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0101_tahunajaran->TahunAjaran->Visible) { // TahunAjaran ?>
		<td<?php echo $t0101_tahunajaran->TahunAjaran->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_delete->RowCnt ?>_t0101_tahunajaran_TahunAjaran" class="t0101_tahunajaran_TahunAjaran">
<span<?php echo $t0101_tahunajaran->TahunAjaran->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->TahunAjaran->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0101_tahunajaran->Aktif->Visible) { // Aktif ?>
		<td<?php echo $t0101_tahunajaran->Aktif->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_delete->RowCnt ?>_t0101_tahunajaran_Aktif" class="t0101_tahunajaran_Aktif">
<span<?php echo $t0101_tahunajaran->Aktif->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->Aktif->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0101_tahunajaran_delete->Recordset->moveNext();
}
$t0101_tahunajaran_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0101_tahunajaran_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0101_tahunajaran_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0101_tahunajaran_delete->terminate();
?>