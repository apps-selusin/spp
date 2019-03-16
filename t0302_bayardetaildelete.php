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
$t0302_bayardetail_delete = new t0302_bayardetail_delete();

// Run the page
$t0302_bayardetail_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0302_bayardetail_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0302_bayardetaildelete = currentForm = new ew.Form("ft0302_bayardetaildelete", "delete");

// Form_CustomValidate event
ft0302_bayardetaildelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0302_bayardetaildelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0302_bayardetaildelete.lists["x_iuran_id"] = <?php echo $t0302_bayardetail_delete->iuran_id->Lookup->toClientList() ?>;
ft0302_bayardetaildelete.lists["x_iuran_id"].options = <?php echo JsonEncode($t0302_bayardetail_delete->iuran_id->lookupOptions()) ?>;
ft0302_bayardetaildelete.autoSuggests["x_iuran_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ft0302_bayardetaildelete.lists["x_Periode1"] = <?php echo $t0302_bayardetail_delete->Periode1->Lookup->toClientList() ?>;
ft0302_bayardetaildelete.lists["x_Periode1"].options = <?php echo JsonEncode($t0302_bayardetail_delete->Periode1->options(FALSE, TRUE)) ?>;
ft0302_bayardetaildelete.lists["x_Periode2"] = <?php echo $t0302_bayardetail_delete->Periode2->Lookup->toClientList() ?>;
ft0302_bayardetaildelete.lists["x_Periode2"].options = <?php echo JsonEncode($t0302_bayardetail_delete->Periode2->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0302_bayardetail_delete->showPageHeader(); ?>
<?php
$t0302_bayardetail_delete->showMessage();
?>
<form name="ft0302_bayardetaildelete" id="ft0302_bayardetaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0302_bayardetail_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0302_bayardetail_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0302_bayardetail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0302_bayardetail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
		<th class="<?php echo $t0302_bayardetail->iuran_id->headerCellClass() ?>"><span id="elh_t0302_bayardetail_iuran_id" class="t0302_bayardetail_iuran_id"><?php echo $t0302_bayardetail->iuran_id->caption() ?></span></th>
<?php } ?>
<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
		<th class="<?php echo $t0302_bayardetail->Periode1->headerCellClass() ?>"><span id="elh_t0302_bayardetail_Periode1" class="t0302_bayardetail_Periode1"><?php echo $t0302_bayardetail->Periode1->caption() ?></span></th>
<?php } ?>
<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
		<th class="<?php echo $t0302_bayardetail->Periode2->headerCellClass() ?>"><span id="elh_t0302_bayardetail_Periode2" class="t0302_bayardetail_Periode2"><?php echo $t0302_bayardetail->Periode2->caption() ?></span></th>
<?php } ?>
<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
		<th class="<?php echo $t0302_bayardetail->Keterangan->headerCellClass() ?>"><span id="elh_t0302_bayardetail_Keterangan" class="t0302_bayardetail_Keterangan"><?php echo $t0302_bayardetail->Keterangan->caption() ?></span></th>
<?php } ?>
<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
		<th class="<?php echo $t0302_bayardetail->Jumlah->headerCellClass() ?>"><span id="elh_t0302_bayardetail_Jumlah" class="t0302_bayardetail_Jumlah"><?php echo $t0302_bayardetail->Jumlah->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0302_bayardetail_delete->RecCnt = 0;
$i = 0;
while (!$t0302_bayardetail_delete->Recordset->EOF) {
	$t0302_bayardetail_delete->RecCnt++;
	$t0302_bayardetail_delete->RowCnt++;

	// Set row properties
	$t0302_bayardetail->resetAttributes();
	$t0302_bayardetail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0302_bayardetail_delete->loadRowValues($t0302_bayardetail_delete->Recordset);

	// Render row
	$t0302_bayardetail_delete->renderRow();
?>
	<tr<?php echo $t0302_bayardetail->rowAttributes() ?>>
<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
		<td<?php echo $t0302_bayardetail->iuran_id->cellAttributes() ?>>
<span id="el<?php echo $t0302_bayardetail_delete->RowCnt ?>_t0302_bayardetail_iuran_id" class="t0302_bayardetail_iuran_id">
<span<?php echo $t0302_bayardetail->iuran_id->viewAttributes() ?>>
<?php echo $t0302_bayardetail->iuran_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
		<td<?php echo $t0302_bayardetail->Periode1->cellAttributes() ?>>
<span id="el<?php echo $t0302_bayardetail_delete->RowCnt ?>_t0302_bayardetail_Periode1" class="t0302_bayardetail_Periode1">
<span<?php echo $t0302_bayardetail->Periode1->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Periode1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
		<td<?php echo $t0302_bayardetail->Periode2->cellAttributes() ?>>
<span id="el<?php echo $t0302_bayardetail_delete->RowCnt ?>_t0302_bayardetail_Periode2" class="t0302_bayardetail_Periode2">
<span<?php echo $t0302_bayardetail->Periode2->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Periode2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
		<td<?php echo $t0302_bayardetail->Keterangan->cellAttributes() ?>>
<span id="el<?php echo $t0302_bayardetail_delete->RowCnt ?>_t0302_bayardetail_Keterangan" class="t0302_bayardetail_Keterangan">
<span<?php echo $t0302_bayardetail->Keterangan->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Keterangan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
		<td<?php echo $t0302_bayardetail->Jumlah->cellAttributes() ?>>
<span id="el<?php echo $t0302_bayardetail_delete->RowCnt ?>_t0302_bayardetail_Jumlah" class="t0302_bayardetail_Jumlah">
<span<?php echo $t0302_bayardetail->Jumlah->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Jumlah->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0302_bayardetail_delete->Recordset->moveNext();
}
$t0302_bayardetail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0302_bayardetail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0302_bayardetail_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0302_bayardetail_delete->terminate();
?>