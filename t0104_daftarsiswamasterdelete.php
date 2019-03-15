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
$t0104_daftarsiswamaster_delete = new t0104_daftarsiswamaster_delete();

// Run the page
$t0104_daftarsiswamaster_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0104_daftarsiswamaster_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0104_daftarsiswamasterdelete = currentForm = new ew.Form("ft0104_daftarsiswamasterdelete", "delete");

// Form_CustomValidate event
ft0104_daftarsiswamasterdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0104_daftarsiswamasterdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0104_daftarsiswamasterdelete.lists["x_tahunajaran_id"] = <?php echo $t0104_daftarsiswamaster_delete->tahunajaran_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasterdelete.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_delete->tahunajaran_id->lookupOptions()) ?>;
ft0104_daftarsiswamasterdelete.lists["x_sekolah_id"] = <?php echo $t0104_daftarsiswamaster_delete->sekolah_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasterdelete.lists["x_sekolah_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_delete->sekolah_id->lookupOptions()) ?>;
ft0104_daftarsiswamasterdelete.lists["x_kelas_id"] = <?php echo $t0104_daftarsiswamaster_delete->kelas_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasterdelete.lists["x_kelas_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_delete->kelas_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0104_daftarsiswamaster_delete->showPageHeader(); ?>
<?php
$t0104_daftarsiswamaster_delete->showMessage();
?>
<form name="ft0104_daftarsiswamasterdelete" id="ft0104_daftarsiswamasterdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0104_daftarsiswamaster_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0104_daftarsiswamaster_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0104_daftarsiswamaster">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0104_daftarsiswamaster_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0104_daftarsiswamaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<th class="<?php echo $t0104_daftarsiswamaster->tahunajaran_id->headerCellClass() ?>"><span id="elh_t0104_daftarsiswamaster_tahunajaran_id" class="t0104_daftarsiswamaster_tahunajaran_id"><?php echo $t0104_daftarsiswamaster->tahunajaran_id->caption() ?></span></th>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->sekolah_id->Visible) { // sekolah_id ?>
		<th class="<?php echo $t0104_daftarsiswamaster->sekolah_id->headerCellClass() ?>"><span id="elh_t0104_daftarsiswamaster_sekolah_id" class="t0104_daftarsiswamaster_sekolah_id"><?php echo $t0104_daftarsiswamaster->sekolah_id->caption() ?></span></th>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->kelas_id->Visible) { // kelas_id ?>
		<th class="<?php echo $t0104_daftarsiswamaster->kelas_id->headerCellClass() ?>"><span id="elh_t0104_daftarsiswamaster_kelas_id" class="t0104_daftarsiswamaster_kelas_id"><?php echo $t0104_daftarsiswamaster->kelas_id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0104_daftarsiswamaster_delete->RecCnt = 0;
$i = 0;
while (!$t0104_daftarsiswamaster_delete->Recordset->EOF) {
	$t0104_daftarsiswamaster_delete->RecCnt++;
	$t0104_daftarsiswamaster_delete->RowCnt++;

	// Set row properties
	$t0104_daftarsiswamaster->resetAttributes();
	$t0104_daftarsiswamaster->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0104_daftarsiswamaster_delete->loadRowValues($t0104_daftarsiswamaster_delete->Recordset);

	// Render row
	$t0104_daftarsiswamaster_delete->renderRow();
?>
	<tr<?php echo $t0104_daftarsiswamaster->rowAttributes() ?>>
<?php if ($t0104_daftarsiswamaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td<?php echo $t0104_daftarsiswamaster->tahunajaran_id->cellAttributes() ?>>
<span id="el<?php echo $t0104_daftarsiswamaster_delete->RowCnt ?>_t0104_daftarsiswamaster_tahunajaran_id" class="t0104_daftarsiswamaster_tahunajaran_id">
<span<?php echo $t0104_daftarsiswamaster->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->sekolah_id->Visible) { // sekolah_id ?>
		<td<?php echo $t0104_daftarsiswamaster->sekolah_id->cellAttributes() ?>>
<span id="el<?php echo $t0104_daftarsiswamaster_delete->RowCnt ?>_t0104_daftarsiswamaster_sekolah_id" class="t0104_daftarsiswamaster_sekolah_id">
<span<?php echo $t0104_daftarsiswamaster->sekolah_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->sekolah_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->kelas_id->Visible) { // kelas_id ?>
		<td<?php echo $t0104_daftarsiswamaster->kelas_id->cellAttributes() ?>>
<span id="el<?php echo $t0104_daftarsiswamaster_delete->RowCnt ?>_t0104_daftarsiswamaster_kelas_id" class="t0104_daftarsiswamaster_kelas_id">
<span<?php echo $t0104_daftarsiswamaster->kelas_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->kelas_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0104_daftarsiswamaster_delete->Recordset->moveNext();
}
$t0104_daftarsiswamaster_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0104_daftarsiswamaster_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0104_daftarsiswamaster_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0104_daftarsiswamaster_delete->terminate();
?>