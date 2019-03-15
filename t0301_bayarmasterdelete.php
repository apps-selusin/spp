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
$t0301_bayarmaster_delete = new t0301_bayarmaster_delete();

// Run the page
$t0301_bayarmaster_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0301_bayarmaster_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0301_bayarmasterdelete = currentForm = new ew.Form("ft0301_bayarmasterdelete", "delete");

// Form_CustomValidate event
ft0301_bayarmasterdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0301_bayarmasterdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0301_bayarmasterdelete.lists["x_siswa_id"] = <?php echo $t0301_bayarmaster_delete->siswa_id->Lookup->toClientList() ?>;
ft0301_bayarmasterdelete.lists["x_siswa_id"].options = <?php echo JsonEncode($t0301_bayarmaster_delete->siswa_id->lookupOptions()) ?>;
ft0301_bayarmasterdelete.autoSuggests["x_siswa_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0301_bayarmaster_delete->showPageHeader(); ?>
<?php
$t0301_bayarmaster_delete->showMessage();
?>
<form name="ft0301_bayarmasterdelete" id="ft0301_bayarmasterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0301_bayarmaster_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0301_bayarmaster_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0301_bayarmaster">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0301_bayarmaster_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0301_bayarmaster->Nomor->Visible) { // Nomor ?>
		<th class="<?php echo $t0301_bayarmaster->Nomor->headerCellClass() ?>"><span id="elh_t0301_bayarmaster_Nomor" class="t0301_bayarmaster_Nomor"><?php echo $t0301_bayarmaster->Nomor->caption() ?></span></th>
<?php } ?>
<?php if ($t0301_bayarmaster->Tanggal->Visible) { // Tanggal ?>
		<th class="<?php echo $t0301_bayarmaster->Tanggal->headerCellClass() ?>"><span id="elh_t0301_bayarmaster_Tanggal" class="t0301_bayarmaster_Tanggal"><?php echo $t0301_bayarmaster->Tanggal->caption() ?></span></th>
<?php } ?>
<?php if ($t0301_bayarmaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<th class="<?php echo $t0301_bayarmaster->tahunajaran_id->headerCellClass() ?>"><span id="elh_t0301_bayarmaster_tahunajaran_id" class="t0301_bayarmaster_tahunajaran_id"><?php echo $t0301_bayarmaster->tahunajaran_id->caption() ?></span></th>
<?php } ?>
<?php if ($t0301_bayarmaster->siswa_id->Visible) { // siswa_id ?>
		<th class="<?php echo $t0301_bayarmaster->siswa_id->headerCellClass() ?>"><span id="elh_t0301_bayarmaster_siswa_id" class="t0301_bayarmaster_siswa_id"><?php echo $t0301_bayarmaster->siswa_id->caption() ?></span></th>
<?php } ?>
<?php if ($t0301_bayarmaster->Total->Visible) { // Total ?>
		<th class="<?php echo $t0301_bayarmaster->Total->headerCellClass() ?>"><span id="elh_t0301_bayarmaster_Total" class="t0301_bayarmaster_Total"><?php echo $t0301_bayarmaster->Total->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0301_bayarmaster_delete->RecCnt = 0;
$i = 0;
while (!$t0301_bayarmaster_delete->Recordset->EOF) {
	$t0301_bayarmaster_delete->RecCnt++;
	$t0301_bayarmaster_delete->RowCnt++;

	// Set row properties
	$t0301_bayarmaster->resetAttributes();
	$t0301_bayarmaster->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0301_bayarmaster_delete->loadRowValues($t0301_bayarmaster_delete->Recordset);

	// Render row
	$t0301_bayarmaster_delete->renderRow();
?>
	<tr<?php echo $t0301_bayarmaster->rowAttributes() ?>>
<?php if ($t0301_bayarmaster->Nomor->Visible) { // Nomor ?>
		<td<?php echo $t0301_bayarmaster->Nomor->cellAttributes() ?>>
<span id="el<?php echo $t0301_bayarmaster_delete->RowCnt ?>_t0301_bayarmaster_Nomor" class="t0301_bayarmaster_Nomor">
<span<?php echo $t0301_bayarmaster->Nomor->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Nomor->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0301_bayarmaster->Tanggal->Visible) { // Tanggal ?>
		<td<?php echo $t0301_bayarmaster->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t0301_bayarmaster_delete->RowCnt ?>_t0301_bayarmaster_Tanggal" class="t0301_bayarmaster_Tanggal">
<span<?php echo $t0301_bayarmaster->Tanggal->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0301_bayarmaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td<?php echo $t0301_bayarmaster->tahunajaran_id->cellAttributes() ?>>
<span id="el<?php echo $t0301_bayarmaster_delete->RowCnt ?>_t0301_bayarmaster_tahunajaran_id" class="t0301_bayarmaster_tahunajaran_id">
<span<?php echo $t0301_bayarmaster->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0301_bayarmaster->siswa_id->Visible) { // siswa_id ?>
		<td<?php echo $t0301_bayarmaster->siswa_id->cellAttributes() ?>>
<span id="el<?php echo $t0301_bayarmaster_delete->RowCnt ?>_t0301_bayarmaster_siswa_id" class="t0301_bayarmaster_siswa_id">
<span<?php echo $t0301_bayarmaster->siswa_id->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->siswa_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0301_bayarmaster->Total->Visible) { // Total ?>
		<td<?php echo $t0301_bayarmaster->Total->cellAttributes() ?>>
<span id="el<?php echo $t0301_bayarmaster_delete->RowCnt ?>_t0301_bayarmaster_Total" class="t0301_bayarmaster_Total">
<span<?php echo $t0301_bayarmaster->Total->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Total->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0301_bayarmaster_delete->Recordset->moveNext();
}
$t0301_bayarmaster_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0301_bayarmaster_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0301_bayarmaster_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0301_bayarmaster_delete->terminate();
?>