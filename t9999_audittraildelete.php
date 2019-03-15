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
$t9999_audittrail_delete = new t9999_audittrail_delete();

// Run the page
$t9999_audittrail_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9999_audittrail_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ft9999_audittraildelete = currentForm = new ew.Form("ft9999_audittraildelete", "delete");

// Form_CustomValidate event
ft9999_audittraildelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9999_audittraildelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t9999_audittrail_delete->showPageHeader(); ?>
<?php
$t9999_audittrail_delete->showMessage();
?>
<form name="ft9999_audittraildelete" id="ft9999_audittraildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9999_audittrail_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9999_audittrail_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9999_audittrail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t9999_audittrail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t9999_audittrail->id->Visible) { // id ?>
		<th class="<?php echo $t9999_audittrail->id->headerCellClass() ?>"><span id="elh_t9999_audittrail_id" class="t9999_audittrail_id"><?php echo $t9999_audittrail->id->caption() ?></span></th>
<?php } ?>
<?php if ($t9999_audittrail->datetime->Visible) { // datetime ?>
		<th class="<?php echo $t9999_audittrail->datetime->headerCellClass() ?>"><span id="elh_t9999_audittrail_datetime" class="t9999_audittrail_datetime"><?php echo $t9999_audittrail->datetime->caption() ?></span></th>
<?php } ?>
<?php if ($t9999_audittrail->script->Visible) { // script ?>
		<th class="<?php echo $t9999_audittrail->script->headerCellClass() ?>"><span id="elh_t9999_audittrail_script" class="t9999_audittrail_script"><?php echo $t9999_audittrail->script->caption() ?></span></th>
<?php } ?>
<?php if ($t9999_audittrail->user->Visible) { // user ?>
		<th class="<?php echo $t9999_audittrail->user->headerCellClass() ?>"><span id="elh_t9999_audittrail_user" class="t9999_audittrail_user"><?php echo $t9999_audittrail->user->caption() ?></span></th>
<?php } ?>
<?php if ($t9999_audittrail->_action->Visible) { // action ?>
		<th class="<?php echo $t9999_audittrail->_action->headerCellClass() ?>"><span id="elh_t9999_audittrail__action" class="t9999_audittrail__action"><?php echo $t9999_audittrail->_action->caption() ?></span></th>
<?php } ?>
<?php if ($t9999_audittrail->_table->Visible) { // table ?>
		<th class="<?php echo $t9999_audittrail->_table->headerCellClass() ?>"><span id="elh_t9999_audittrail__table" class="t9999_audittrail__table"><?php echo $t9999_audittrail->_table->caption() ?></span></th>
<?php } ?>
<?php if ($t9999_audittrail->field->Visible) { // field ?>
		<th class="<?php echo $t9999_audittrail->field->headerCellClass() ?>"><span id="elh_t9999_audittrail_field" class="t9999_audittrail_field"><?php echo $t9999_audittrail->field->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t9999_audittrail_delete->RecCnt = 0;
$i = 0;
while (!$t9999_audittrail_delete->Recordset->EOF) {
	$t9999_audittrail_delete->RecCnt++;
	$t9999_audittrail_delete->RowCnt++;

	// Set row properties
	$t9999_audittrail->resetAttributes();
	$t9999_audittrail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t9999_audittrail_delete->loadRowValues($t9999_audittrail_delete->Recordset);

	// Render row
	$t9999_audittrail_delete->renderRow();
?>
	<tr<?php echo $t9999_audittrail->rowAttributes() ?>>
<?php if ($t9999_audittrail->id->Visible) { // id ?>
		<td<?php echo $t9999_audittrail->id->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_delete->RowCnt ?>_t9999_audittrail_id" class="t9999_audittrail_id">
<span<?php echo $t9999_audittrail->id->viewAttributes() ?>>
<?php echo $t9999_audittrail->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9999_audittrail->datetime->Visible) { // datetime ?>
		<td<?php echo $t9999_audittrail->datetime->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_delete->RowCnt ?>_t9999_audittrail_datetime" class="t9999_audittrail_datetime">
<span<?php echo $t9999_audittrail->datetime->viewAttributes() ?>>
<?php echo $t9999_audittrail->datetime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9999_audittrail->script->Visible) { // script ?>
		<td<?php echo $t9999_audittrail->script->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_delete->RowCnt ?>_t9999_audittrail_script" class="t9999_audittrail_script">
<span<?php echo $t9999_audittrail->script->viewAttributes() ?>>
<?php echo $t9999_audittrail->script->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9999_audittrail->user->Visible) { // user ?>
		<td<?php echo $t9999_audittrail->user->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_delete->RowCnt ?>_t9999_audittrail_user" class="t9999_audittrail_user">
<span<?php echo $t9999_audittrail->user->viewAttributes() ?>>
<?php echo $t9999_audittrail->user->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9999_audittrail->_action->Visible) { // action ?>
		<td<?php echo $t9999_audittrail->_action->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_delete->RowCnt ?>_t9999_audittrail__action" class="t9999_audittrail__action">
<span<?php echo $t9999_audittrail->_action->viewAttributes() ?>>
<?php echo $t9999_audittrail->_action->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9999_audittrail->_table->Visible) { // table ?>
		<td<?php echo $t9999_audittrail->_table->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_delete->RowCnt ?>_t9999_audittrail__table" class="t9999_audittrail__table">
<span<?php echo $t9999_audittrail->_table->viewAttributes() ?>>
<?php echo $t9999_audittrail->_table->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t9999_audittrail->field->Visible) { // field ?>
		<td<?php echo $t9999_audittrail->field->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_delete->RowCnt ?>_t9999_audittrail_field" class="t9999_audittrail_field">
<span<?php echo $t9999_audittrail->field->viewAttributes() ?>>
<?php echo $t9999_audittrail->field->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t9999_audittrail_delete->Recordset->moveNext();
}
$t9999_audittrail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t9999_audittrail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t9999_audittrail_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t9999_audittrail_delete->terminate();
?>