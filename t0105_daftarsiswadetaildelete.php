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
$t0105_daftarsiswadetail_delete = new t0105_daftarsiswadetail_delete();

// Run the page
$t0105_daftarsiswadetail_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0105_daftarsiswadetail_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0105_daftarsiswadetaildelete = currentForm = new ew.Form("ft0105_daftarsiswadetaildelete", "delete");

// Form_CustomValidate event
ft0105_daftarsiswadetaildelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0105_daftarsiswadetaildelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0105_daftarsiswadetaildelete.lists["x_siswa_id"] = <?php echo $t0105_daftarsiswadetail_delete->siswa_id->Lookup->toClientList() ?>;
ft0105_daftarsiswadetaildelete.lists["x_siswa_id"].options = <?php echo JsonEncode($t0105_daftarsiswadetail_delete->siswa_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0105_daftarsiswadetail_delete->showPageHeader(); ?>
<?php
$t0105_daftarsiswadetail_delete->showMessage();
?>
<form name="ft0105_daftarsiswadetaildelete" id="ft0105_daftarsiswadetaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0105_daftarsiswadetail_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0105_daftarsiswadetail_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0105_daftarsiswadetail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0105_daftarsiswadetail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
		<th class="<?php echo $t0105_daftarsiswadetail->siswa_id->headerCellClass() ?>"><span id="elh_t0105_daftarsiswadetail_siswa_id" class="t0105_daftarsiswadetail_siswa_id"><?php echo $t0105_daftarsiswadetail->siswa_id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0105_daftarsiswadetail_delete->RecCnt = 0;
$i = 0;
while (!$t0105_daftarsiswadetail_delete->Recordset->EOF) {
	$t0105_daftarsiswadetail_delete->RecCnt++;
	$t0105_daftarsiswadetail_delete->RowCnt++;

	// Set row properties
	$t0105_daftarsiswadetail->resetAttributes();
	$t0105_daftarsiswadetail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0105_daftarsiswadetail_delete->loadRowValues($t0105_daftarsiswadetail_delete->Recordset);

	// Render row
	$t0105_daftarsiswadetail_delete->renderRow();
?>
	<tr<?php echo $t0105_daftarsiswadetail->rowAttributes() ?>>
<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
		<td<?php echo $t0105_daftarsiswadetail->siswa_id->cellAttributes() ?>>
<span id="el<?php echo $t0105_daftarsiswadetail_delete->RowCnt ?>_t0105_daftarsiswadetail_siswa_id" class="t0105_daftarsiswadetail_siswa_id">
<span<?php echo $t0105_daftarsiswadetail->siswa_id->viewAttributes() ?>>
<?php echo $t0105_daftarsiswadetail->siswa_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0105_daftarsiswadetail_delete->Recordset->moveNext();
}
$t0105_daftarsiswadetail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0105_daftarsiswadetail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0105_daftarsiswadetail_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0105_daftarsiswadetail_delete->terminate();
?>