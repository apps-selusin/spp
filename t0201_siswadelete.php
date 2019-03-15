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
$t0201_siswa_delete = new t0201_siswa_delete();

// Run the page
$t0201_siswa_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0201_siswa_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0201_siswadelete = currentForm = new ew.Form("ft0201_siswadelete", "delete");

// Form_CustomValidate event
ft0201_siswadelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0201_siswadelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0201_siswa_delete->showPageHeader(); ?>
<?php
$t0201_siswa_delete->showMessage();
?>
<form name="ft0201_siswadelete" id="ft0201_siswadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0201_siswa_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0201_siswa_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0201_siswa">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0201_siswa_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0201_siswa->NIS->Visible) { // NIS ?>
		<th class="<?php echo $t0201_siswa->NIS->headerCellClass() ?>"><span id="elh_t0201_siswa_NIS" class="t0201_siswa_NIS"><?php echo $t0201_siswa->NIS->caption() ?></span></th>
<?php } ?>
<?php if ($t0201_siswa->Nama->Visible) { // Nama ?>
		<th class="<?php echo $t0201_siswa->Nama->headerCellClass() ?>"><span id="elh_t0201_siswa_Nama" class="t0201_siswa_Nama"><?php echo $t0201_siswa->Nama->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0201_siswa_delete->RecCnt = 0;
$i = 0;
while (!$t0201_siswa_delete->Recordset->EOF) {
	$t0201_siswa_delete->RecCnt++;
	$t0201_siswa_delete->RowCnt++;

	// Set row properties
	$t0201_siswa->resetAttributes();
	$t0201_siswa->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0201_siswa_delete->loadRowValues($t0201_siswa_delete->Recordset);

	// Render row
	$t0201_siswa_delete->renderRow();
?>
	<tr<?php echo $t0201_siswa->rowAttributes() ?>>
<?php if ($t0201_siswa->NIS->Visible) { // NIS ?>
		<td<?php echo $t0201_siswa->NIS->cellAttributes() ?>>
<span id="el<?php echo $t0201_siswa_delete->RowCnt ?>_t0201_siswa_NIS" class="t0201_siswa_NIS">
<span<?php echo $t0201_siswa->NIS->viewAttributes() ?>>
<?php echo $t0201_siswa->NIS->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t0201_siswa->Nama->Visible) { // Nama ?>
		<td<?php echo $t0201_siswa->Nama->cellAttributes() ?>>
<span id="el<?php echo $t0201_siswa_delete->RowCnt ?>_t0201_siswa_Nama" class="t0201_siswa_Nama">
<span<?php echo $t0201_siswa->Nama->viewAttributes() ?>>
<?php echo $t0201_siswa->Nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0201_siswa_delete->Recordset->moveNext();
}
$t0201_siswa_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0201_siswa_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0201_siswa_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0201_siswa_delete->terminate();
?>