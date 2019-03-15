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
$t0103_kelas_delete = new t0103_kelas_delete();

// Run the page
$t0103_kelas_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0103_kelas_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft0103_kelasdelete = currentForm = new ew.Form("ft0103_kelasdelete", "delete");

// Form_CustomValidate event
ft0103_kelasdelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0103_kelasdelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0103_kelas_delete->showPageHeader(); ?>
<?php
$t0103_kelas_delete->showMessage();
?>
<form name="ft0103_kelasdelete" id="ft0103_kelasdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0103_kelas_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0103_kelas_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0103_kelas">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t0103_kelas_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t0103_kelas->Kelas->Visible) { // Kelas ?>
		<th class="<?php echo $t0103_kelas->Kelas->headerCellClass() ?>"><span id="elh_t0103_kelas_Kelas" class="t0103_kelas_Kelas"><?php echo $t0103_kelas->Kelas->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t0103_kelas_delete->RecCnt = 0;
$i = 0;
while (!$t0103_kelas_delete->Recordset->EOF) {
	$t0103_kelas_delete->RecCnt++;
	$t0103_kelas_delete->RowCnt++;

	// Set row properties
	$t0103_kelas->resetAttributes();
	$t0103_kelas->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t0103_kelas_delete->loadRowValues($t0103_kelas_delete->Recordset);

	// Render row
	$t0103_kelas_delete->renderRow();
?>
	<tr<?php echo $t0103_kelas->rowAttributes() ?>>
<?php if ($t0103_kelas->Kelas->Visible) { // Kelas ?>
		<td<?php echo $t0103_kelas->Kelas->cellAttributes() ?>>
<span id="el<?php echo $t0103_kelas_delete->RowCnt ?>_t0103_kelas_Kelas" class="t0103_kelas_Kelas">
<span<?php echo $t0103_kelas->Kelas->viewAttributes() ?>>
<?php echo $t0103_kelas->Kelas->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t0103_kelas_delete->Recordset->moveNext();
}
$t0103_kelas_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0103_kelas_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t0103_kelas_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0103_kelas_delete->terminate();
?>