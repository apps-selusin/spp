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
$t0202_siswaiuran_delete = new t0202_siswaiuran_delete();

// Run the page
$t0202_siswaiuran_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0202_siswaiuran_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0202_siswaiurandelete = currentForm = new ew.Form("ft0202_siswaiurandelete", "delete");

// Form_CustomValidate event
ft0202_siswaiurandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0202_siswaiurandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0202_siswaiurandelete.lists["x_tahunajaran_id"] = <?php echo $t0202_siswaiuran_delete->tahunajaran_id->Lookup->toClientList() ?>;
ft0202_siswaiurandelete.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_delete->tahunajaran_id->lookupOptions()) ?>;
ft0202_siswaiurandelete.lists["x_iuran_id"] = <?php echo $t0202_siswaiuran_delete->iuran_id->Lookup->toClientList() ?>;
ft0202_siswaiurandelete.lists["x_iuran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_delete->iuran_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0202_siswaiuran_delete->showPageHeader(); ?>
<?php
$t0202_siswaiuran_delete->showMessage();
?>
<form name="ft0202_siswaiurandelete" id="ft0202_siswaiurandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0202_siswaiuran_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0202_siswaiuran_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0202_siswaiuran">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0202_siswaiuran_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<th class="<?php echo $t0202_siswaiuran->tahunajaran_id->headerCellClass() ?>"><span id="elh_t0202_siswaiuran_tahunajaran_id" class="t0202_siswaiuran_tahunajaran_id"><?php echo $t0202_siswaiuran->tahunajaran_id->caption() ?></span></th>
<?php } ?>
<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
		<th class="<?php echo $t0202_siswaiuran->iuran_id->headerCellClass() ?>"><span id="elh_t0202_siswaiuran_iuran_id" class="t0202_siswaiuran_iuran_id"><?php echo $t0202_siswaiuran->iuran_id->caption() ?></span></th>
<?php } ?>
<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
		<th class="<?php echo $t0202_siswaiuran->Nilai->headerCellClass() ?>"><span id="elh_t0202_siswaiuran_Nilai" class="t0202_siswaiuran_Nilai"><?php echo $t0202_siswaiuran->Nilai->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0202_siswaiuran_delete->RecCnt = 0;
$i = 0;
while (!$t0202_siswaiuran_delete->Recordset->EOF) {
	$t0202_siswaiuran_delete->RecCnt++;
	$t0202_siswaiuran_delete->RowCnt++;

	// Set row properties
	$t0202_siswaiuran->resetAttributes();
	$t0202_siswaiuran->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0202_siswaiuran_delete->loadRowValues($t0202_siswaiuran_delete->Recordset);

	// Render row
	$t0202_siswaiuran_delete->renderRow();
?>
	<tr<?php echo $t0202_siswaiuran->rowAttributes() ?>>
<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td<?php echo $t0202_siswaiuran->tahunajaran_id->cellAttributes() ?>>
<span id="el<?php echo $t0202_siswaiuran_delete->RowCnt ?>_t0202_siswaiuran_tahunajaran_id" class="t0202_siswaiuran_tahunajaran_id">
<span<?php echo $t0202_siswaiuran->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
		<td<?php echo $t0202_siswaiuran->iuran_id->cellAttributes() ?>>
<span id="el<?php echo $t0202_siswaiuran_delete->RowCnt ?>_t0202_siswaiuran_iuran_id" class="t0202_siswaiuran_iuran_id">
<span<?php echo $t0202_siswaiuran->iuran_id->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->iuran_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
		<td<?php echo $t0202_siswaiuran->Nilai->cellAttributes() ?>>
<span id="el<?php echo $t0202_siswaiuran_delete->RowCnt ?>_t0202_siswaiuran_Nilai" class="t0202_siswaiuran_Nilai">
<span<?php echo $t0202_siswaiuran->Nilai->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->Nilai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0202_siswaiuran_delete->Recordset->moveNext();
}
$t0202_siswaiuran_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0202_siswaiuran_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0202_siswaiuran_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0202_siswaiuran_delete->terminate();
?>