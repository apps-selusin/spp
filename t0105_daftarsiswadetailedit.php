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
$t0105_daftarsiswadetail_edit = new t0105_daftarsiswadetail_edit();

// Run the page
$t0105_daftarsiswadetail_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0105_daftarsiswadetail_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft0105_daftarsiswadetailedit = currentForm = new ew.Form("ft0105_daftarsiswadetailedit", "edit");

// Validate form
ft0105_daftarsiswadetailedit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($t0105_daftarsiswadetail_edit->siswa_id->Required) { ?>
			elm = this.getElements("x" + infix + "_siswa_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0105_daftarsiswadetail->siswa_id->caption(), $t0105_daftarsiswadetail->siswa_id->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
ft0105_daftarsiswadetailedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0105_daftarsiswadetailedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0105_daftarsiswadetailedit.lists["x_siswa_id"] = <?php echo $t0105_daftarsiswadetail_edit->siswa_id->Lookup->toClientList() ?>;
ft0105_daftarsiswadetailedit.lists["x_siswa_id"].options = <?php echo JsonEncode($t0105_daftarsiswadetail_edit->siswa_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0105_daftarsiswadetail_edit->showPageHeader(); ?>
<?php
$t0105_daftarsiswadetail_edit->showMessage();
?>
<form name="ft0105_daftarsiswadetailedit" id="ft0105_daftarsiswadetailedit" class="<?php echo $t0105_daftarsiswadetail_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0105_daftarsiswadetail_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0105_daftarsiswadetail_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0105_daftarsiswadetail">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t0105_daftarsiswadetail_edit->IsModal ?>">
<?php if ($t0105_daftarsiswadetail->getCurrentMasterTable() == "t0104_daftarsiswamaster") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t0104_daftarsiswamaster">
<input type="hidden" name="fk_id" value="<?php echo $t0105_daftarsiswadetail->daftarsiswamaster_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
	<div id="r_siswa_id" class="form-group row">
		<label id="elh_t0105_daftarsiswadetail_siswa_id" for="x_siswa_id" class="<?php echo $t0105_daftarsiswadetail_edit->LeftColumnClass ?>"><?php echo $t0105_daftarsiswadetail->siswa_id->caption() ?><?php echo ($t0105_daftarsiswadetail->siswa_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0105_daftarsiswadetail_edit->RightColumnClass ?>"><div<?php echo $t0105_daftarsiswadetail->siswa_id->cellAttributes() ?>>
<span id="el_t0105_daftarsiswadetail_siswa_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" data-value-separator="<?php echo $t0105_daftarsiswadetail->siswa_id->displayValueSeparatorAttribute() ?>" id="x_siswa_id" name="x_siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->editAttributes() ?>>
		<?php echo $t0105_daftarsiswadetail->siswa_id->selectOptionListHtml("x_siswa_id") ?>
	</select>
</div>
<?php echo $t0105_daftarsiswadetail->siswa_id->Lookup->getParamTag("p_x_siswa_id") ?>
</span>
<?php echo $t0105_daftarsiswadetail->siswa_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->id->CurrentValue) ?>">
<?php if (!$t0105_daftarsiswadetail_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0105_daftarsiswadetail_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0105_daftarsiswadetail_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0105_daftarsiswadetail_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0105_daftarsiswadetail_edit->terminate();
?>