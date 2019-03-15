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
$t0102_sekolah_delete = new t0102_sekolah_delete();

// Run the page
$t0102_sekolah_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0102_sekolah_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0102_sekolahdelete = currentForm = new ew.Form("ft0102_sekolahdelete", "delete");

// Form_CustomValidate event
ft0102_sekolahdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0102_sekolahdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0102_sekolah_delete->showPageHeader(); ?>
<?php
$t0102_sekolah_delete->showMessage();
?>
<form name="ft0102_sekolahdelete" id="ft0102_sekolahdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0102_sekolah_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0102_sekolah_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0102_sekolah">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0102_sekolah_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0102_sekolah->Sekolah->Visible) { // Sekolah ?>
		<th class="<?php echo $t0102_sekolah->Sekolah->headerCellClass() ?>"><span id="elh_t0102_sekolah_Sekolah" class="t0102_sekolah_Sekolah"><?php echo $t0102_sekolah->Sekolah->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0102_sekolah_delete->RecCnt = 0;
$i = 0;
while (!$t0102_sekolah_delete->Recordset->EOF) {
	$t0102_sekolah_delete->RecCnt++;
	$t0102_sekolah_delete->RowCnt++;

	// Set row properties
	$t0102_sekolah->resetAttributes();
	$t0102_sekolah->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0102_sekolah_delete->loadRowValues($t0102_sekolah_delete->Recordset);

	// Render row
	$t0102_sekolah_delete->renderRow();
?>
	<tr<?php echo $t0102_sekolah->rowAttributes() ?>>
<?php if ($t0102_sekolah->Sekolah->Visible) { // Sekolah ?>
		<td<?php echo $t0102_sekolah->Sekolah->cellAttributes() ?>>
<span id="el<?php echo $t0102_sekolah_delete->RowCnt ?>_t0102_sekolah_Sekolah" class="t0102_sekolah_Sekolah">
<span<?php echo $t0102_sekolah->Sekolah->viewAttributes() ?>>
<?php echo $t0102_sekolah->Sekolah->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0102_sekolah_delete->Recordset->moveNext();
}
$t0102_sekolah_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0102_sekolah_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0102_sekolah_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0102_sekolah_delete->terminate();
?>