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
$t9999_audittrail_view = new t9999_audittrail_view();

// Run the page
$t9999_audittrail_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9999_audittrail_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t9999_audittrail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft9999_audittrailview = currentForm = new ew.Form("ft9999_audittrailview", "view");

// Form_CustomValidate event
ft9999_audittrailview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9999_audittrailview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t9999_audittrail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t9999_audittrail_view->ExportOptions->render("body") ?>
<?php $t9999_audittrail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t9999_audittrail_view->showPageHeader(); ?>
<?php
$t9999_audittrail_view->showMessage();
?>
<form name="ft9999_audittrailview" id="ft9999_audittrailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9999_audittrail_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9999_audittrail_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9999_audittrail">
<input type="hidden" name="modal" value="<?php echo (int)$t9999_audittrail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t9999_audittrail->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t9999_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t9999_audittrail_id"><?php echo $t9999_audittrail->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t9999_audittrail->id->cellAttributes() ?>>
<span id="el_t9999_audittrail_id">
<span<?php echo $t9999_audittrail->id->viewAttributes() ?>>
<?php echo $t9999_audittrail->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9999_audittrail->datetime->Visible) { // datetime ?>
	<tr id="r_datetime">
		<td class="<?php echo $t9999_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t9999_audittrail_datetime"><?php echo $t9999_audittrail->datetime->caption() ?></span></td>
		<td data-name="datetime"<?php echo $t9999_audittrail->datetime->cellAttributes() ?>>
<span id="el_t9999_audittrail_datetime">
<span<?php echo $t9999_audittrail->datetime->viewAttributes() ?>>
<?php echo $t9999_audittrail->datetime->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9999_audittrail->script->Visible) { // script ?>
	<tr id="r_script">
		<td class="<?php echo $t9999_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t9999_audittrail_script"><?php echo $t9999_audittrail->script->caption() ?></span></td>
		<td data-name="script"<?php echo $t9999_audittrail->script->cellAttributes() ?>>
<span id="el_t9999_audittrail_script">
<span<?php echo $t9999_audittrail->script->viewAttributes() ?>>
<?php echo $t9999_audittrail->script->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9999_audittrail->user->Visible) { // user ?>
	<tr id="r_user">
		<td class="<?php echo $t9999_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t9999_audittrail_user"><?php echo $t9999_audittrail->user->caption() ?></span></td>
		<td data-name="user"<?php echo $t9999_audittrail->user->cellAttributes() ?>>
<span id="el_t9999_audittrail_user">
<span<?php echo $t9999_audittrail->user->viewAttributes() ?>>
<?php echo $t9999_audittrail->user->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9999_audittrail->_action->Visible) { // action ?>
	<tr id="r__action">
		<td class="<?php echo $t9999_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t9999_audittrail__action"><?php echo $t9999_audittrail->_action->caption() ?></span></td>
		<td data-name="_action"<?php echo $t9999_audittrail->_action->cellAttributes() ?>>
<span id="el_t9999_audittrail__action">
<span<?php echo $t9999_audittrail->_action->viewAttributes() ?>>
<?php echo $t9999_audittrail->_action->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9999_audittrail->_table->Visible) { // table ?>
	<tr id="r__table">
		<td class="<?php echo $t9999_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t9999_audittrail__table"><?php echo $t9999_audittrail->_table->caption() ?></span></td>
		<td data-name="_table"<?php echo $t9999_audittrail->_table->cellAttributes() ?>>
<span id="el_t9999_audittrail__table">
<span<?php echo $t9999_audittrail->_table->viewAttributes() ?>>
<?php echo $t9999_audittrail->_table->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9999_audittrail->field->Visible) { // field ?>
	<tr id="r_field">
		<td class="<?php echo $t9999_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t9999_audittrail_field"><?php echo $t9999_audittrail->field->caption() ?></span></td>
		<td data-name="field"<?php echo $t9999_audittrail->field->cellAttributes() ?>>
<span id="el_t9999_audittrail_field">
<span<?php echo $t9999_audittrail->field->viewAttributes() ?>>
<?php echo $t9999_audittrail->field->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9999_audittrail->keyvalue->Visible) { // keyvalue ?>
	<tr id="r_keyvalue">
		<td class="<?php echo $t9999_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t9999_audittrail_keyvalue"><?php echo $t9999_audittrail->keyvalue->caption() ?></span></td>
		<td data-name="keyvalue"<?php echo $t9999_audittrail->keyvalue->cellAttributes() ?>>
<span id="el_t9999_audittrail_keyvalue">
<span<?php echo $t9999_audittrail->keyvalue->viewAttributes() ?>>
<?php echo $t9999_audittrail->keyvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9999_audittrail->oldvalue->Visible) { // oldvalue ?>
	<tr id="r_oldvalue">
		<td class="<?php echo $t9999_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t9999_audittrail_oldvalue"><?php echo $t9999_audittrail->oldvalue->caption() ?></span></td>
		<td data-name="oldvalue"<?php echo $t9999_audittrail->oldvalue->cellAttributes() ?>>
<span id="el_t9999_audittrail_oldvalue">
<span<?php echo $t9999_audittrail->oldvalue->viewAttributes() ?>>
<?php echo $t9999_audittrail->oldvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t9999_audittrail->newvalue->Visible) { // newvalue ?>
	<tr id="r_newvalue">
		<td class="<?php echo $t9999_audittrail_view->TableLeftColumnClass ?>"><span id="elh_t9999_audittrail_newvalue"><?php echo $t9999_audittrail->newvalue->caption() ?></span></td>
		<td data-name="newvalue"<?php echo $t9999_audittrail->newvalue->cellAttributes() ?>>
<span id="el_t9999_audittrail_newvalue">
<span<?php echo $t9999_audittrail->newvalue->viewAttributes() ?>>
<?php echo $t9999_audittrail->newvalue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t9999_audittrail_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t9999_audittrail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t9999_audittrail_view->terminate();
?>