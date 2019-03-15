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
$t0106_iuran_edit = new t0106_iuran_edit();

// Run the page
$t0106_iuran_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0106_iuran_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft0106_iuranedit = currentForm = new ew.Form("ft0106_iuranedit", "edit");

// Validate form
ft0106_iuranedit.validate = function() {
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
		<?php if ($t0106_iuran_edit->Iuran->Required) { ?>
			elm = this.getElements("x" + infix + "_Iuran");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0106_iuran->Iuran->caption(), $t0106_iuran->Iuran->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0106_iuran_edit->Jenis->Required) { ?>
			elm = this.getElements("x" + infix + "_Jenis");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0106_iuran->Jenis->caption(), $t0106_iuran->Jenis->RequiredErrorMessage)) ?>");
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
ft0106_iuranedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0106_iuranedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0106_iuranedit.lists["x_Jenis"] = <?php echo $t0106_iuran_edit->Jenis->Lookup->toClientList() ?>;
ft0106_iuranedit.lists["x_Jenis"].options = <?php echo JsonEncode($t0106_iuran_edit->Jenis->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0106_iuran_edit->showPageHeader(); ?>
<?php
$t0106_iuran_edit->showMessage();
?>
<form name="ft0106_iuranedit" id="ft0106_iuranedit" class="<?php echo $t0106_iuran_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0106_iuran_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0106_iuran_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0106_iuran">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t0106_iuran_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t0106_iuran->Iuran->Visible) { // Iuran ?>
	<div id="r_Iuran" class="form-group row">
		<label id="elh_t0106_iuran_Iuran" for="x_Iuran" class="<?php echo $t0106_iuran_edit->LeftColumnClass ?>"><?php echo $t0106_iuran->Iuran->caption() ?><?php echo ($t0106_iuran->Iuran->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0106_iuran_edit->RightColumnClass ?>"><div<?php echo $t0106_iuran->Iuran->cellAttributes() ?>>
<span id="el_t0106_iuran_Iuran">
<input type="text" data-table="t0106_iuran" data-field="x_Iuran" name="x_Iuran" id="x_Iuran" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t0106_iuran->Iuran->getPlaceHolder()) ?>" value="<?php echo $t0106_iuran->Iuran->EditValue ?>"<?php echo $t0106_iuran->Iuran->editAttributes() ?>>
</span>
<?php echo $t0106_iuran->Iuran->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0106_iuran->Jenis->Visible) { // Jenis ?>
	<div id="r_Jenis" class="form-group row">
		<label id="elh_t0106_iuran_Jenis" class="<?php echo $t0106_iuran_edit->LeftColumnClass ?>"><?php echo $t0106_iuran->Jenis->caption() ?><?php echo ($t0106_iuran->Jenis->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0106_iuran_edit->RightColumnClass ?>"><div<?php echo $t0106_iuran->Jenis->cellAttributes() ?>>
<span id="el_t0106_iuran_Jenis">
<div id="tp_x_Jenis" class="ew-template"><input type="radio" class="form-check-input" data-table="t0106_iuran" data-field="x_Jenis" data-value-separator="<?php echo $t0106_iuran->Jenis->displayValueSeparatorAttribute() ?>" name="x_Jenis" id="x_Jenis" value="{value}"<?php echo $t0106_iuran->Jenis->editAttributes() ?>></div>
<div id="dsl_x_Jenis" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t0106_iuran->Jenis->radioButtonListHtml(FALSE, "x_Jenis") ?>
</div></div>
</span>
<?php echo $t0106_iuran->Jenis->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t0106_iuran" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t0106_iuran->id->CurrentValue) ?>">
<?php if (!$t0106_iuran_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0106_iuran_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0106_iuran_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0106_iuran_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0106_iuran_edit->terminate();
?>