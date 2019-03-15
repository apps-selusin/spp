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
$t0101_tahunajaran_add = new t0101_tahunajaran_add();

// Run the page
$t0101_tahunajaran_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0101_tahunajaran_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft0101_tahunajaranadd = currentForm = new ew.Form("ft0101_tahunajaranadd", "add");

// Validate form
ft0101_tahunajaranadd.validate = function() {
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
		<?php if ($t0101_tahunajaran_add->AwalBulan->Required) { ?>
			elm = this.getElements("x" + infix + "_AwalBulan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0101_tahunajaran->AwalBulan->caption(), $t0101_tahunajaran->AwalBulan->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AwalBulan");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0101_tahunajaran->AwalBulan->errorMessage()) ?>");
		<?php if ($t0101_tahunajaran_add->AwalTahun->Required) { ?>
			elm = this.getElements("x" + infix + "_AwalTahun");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0101_tahunajaran->AwalTahun->caption(), $t0101_tahunajaran->AwalTahun->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AwalTahun");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0101_tahunajaran->AwalTahun->errorMessage()) ?>");
		<?php if ($t0101_tahunajaran_add->AkhirBulan->Required) { ?>
			elm = this.getElements("x" + infix + "_AkhirBulan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0101_tahunajaran->AkhirBulan->caption(), $t0101_tahunajaran->AkhirBulan->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AkhirBulan");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0101_tahunajaran->AkhirBulan->errorMessage()) ?>");
		<?php if ($t0101_tahunajaran_add->AkhirTahun->Required) { ?>
			elm = this.getElements("x" + infix + "_AkhirTahun");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0101_tahunajaran->AkhirTahun->caption(), $t0101_tahunajaran->AkhirTahun->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_AkhirTahun");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0101_tahunajaran->AkhirTahun->errorMessage()) ?>");
		<?php if ($t0101_tahunajaran_add->TahunAjaran->Required) { ?>
			elm = this.getElements("x" + infix + "_TahunAjaran");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0101_tahunajaran->TahunAjaran->caption(), $t0101_tahunajaran->TahunAjaran->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0101_tahunajaran_add->Aktif->Required) { ?>
			elm = this.getElements("x" + infix + "_Aktif");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0101_tahunajaran->Aktif->caption(), $t0101_tahunajaran->Aktif->RequiredErrorMessage)) ?>");
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
ft0101_tahunajaranadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0101_tahunajaranadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0101_tahunajaranadd.lists["x_Aktif"] = <?php echo $t0101_tahunajaran_add->Aktif->Lookup->toClientList() ?>;
ft0101_tahunajaranadd.lists["x_Aktif"].options = <?php echo JsonEncode($t0101_tahunajaran_add->Aktif->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0101_tahunajaran_add->showPageHeader(); ?>
<?php
$t0101_tahunajaran_add->showMessage();
?>
<form name="ft0101_tahunajaranadd" id="ft0101_tahunajaranadd" class="<?php echo $t0101_tahunajaran_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0101_tahunajaran_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0101_tahunajaran_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0101_tahunajaran">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t0101_tahunajaran_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t0101_tahunajaran->AwalBulan->Visible) { // AwalBulan ?>
	<div id="r_AwalBulan" class="form-group row">
		<label id="elh_t0101_tahunajaran_AwalBulan" for="x_AwalBulan" class="<?php echo $t0101_tahunajaran_add->LeftColumnClass ?>"><?php echo $t0101_tahunajaran->AwalBulan->caption() ?><?php echo ($t0101_tahunajaran->AwalBulan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0101_tahunajaran_add->RightColumnClass ?>"><div<?php echo $t0101_tahunajaran->AwalBulan->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_AwalBulan">
<input type="text" data-table="t0101_tahunajaran" data-field="x_AwalBulan" name="x_AwalBulan" id="x_AwalBulan" size="30" placeholder="<?php echo HtmlEncode($t0101_tahunajaran->AwalBulan->getPlaceHolder()) ?>" value="<?php echo $t0101_tahunajaran->AwalBulan->EditValue ?>"<?php echo $t0101_tahunajaran->AwalBulan->editAttributes() ?>>
</span>
<?php echo $t0101_tahunajaran->AwalBulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0101_tahunajaran->AwalTahun->Visible) { // AwalTahun ?>
	<div id="r_AwalTahun" class="form-group row">
		<label id="elh_t0101_tahunajaran_AwalTahun" for="x_AwalTahun" class="<?php echo $t0101_tahunajaran_add->LeftColumnClass ?>"><?php echo $t0101_tahunajaran->AwalTahun->caption() ?><?php echo ($t0101_tahunajaran->AwalTahun->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0101_tahunajaran_add->RightColumnClass ?>"><div<?php echo $t0101_tahunajaran->AwalTahun->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_AwalTahun">
<input type="text" data-table="t0101_tahunajaran" data-field="x_AwalTahun" name="x_AwalTahun" id="x_AwalTahun" size="30" placeholder="<?php echo HtmlEncode($t0101_tahunajaran->AwalTahun->getPlaceHolder()) ?>" value="<?php echo $t0101_tahunajaran->AwalTahun->EditValue ?>"<?php echo $t0101_tahunajaran->AwalTahun->editAttributes() ?>>
</span>
<?php echo $t0101_tahunajaran->AwalTahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0101_tahunajaran->AkhirBulan->Visible) { // AkhirBulan ?>
	<div id="r_AkhirBulan" class="form-group row">
		<label id="elh_t0101_tahunajaran_AkhirBulan" for="x_AkhirBulan" class="<?php echo $t0101_tahunajaran_add->LeftColumnClass ?>"><?php echo $t0101_tahunajaran->AkhirBulan->caption() ?><?php echo ($t0101_tahunajaran->AkhirBulan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0101_tahunajaran_add->RightColumnClass ?>"><div<?php echo $t0101_tahunajaran->AkhirBulan->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_AkhirBulan">
<input type="text" data-table="t0101_tahunajaran" data-field="x_AkhirBulan" name="x_AkhirBulan" id="x_AkhirBulan" size="30" placeholder="<?php echo HtmlEncode($t0101_tahunajaran->AkhirBulan->getPlaceHolder()) ?>" value="<?php echo $t0101_tahunajaran->AkhirBulan->EditValue ?>"<?php echo $t0101_tahunajaran->AkhirBulan->editAttributes() ?>>
</span>
<?php echo $t0101_tahunajaran->AkhirBulan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0101_tahunajaran->AkhirTahun->Visible) { // AkhirTahun ?>
	<div id="r_AkhirTahun" class="form-group row">
		<label id="elh_t0101_tahunajaran_AkhirTahun" for="x_AkhirTahun" class="<?php echo $t0101_tahunajaran_add->LeftColumnClass ?>"><?php echo $t0101_tahunajaran->AkhirTahun->caption() ?><?php echo ($t0101_tahunajaran->AkhirTahun->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0101_tahunajaran_add->RightColumnClass ?>"><div<?php echo $t0101_tahunajaran->AkhirTahun->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_AkhirTahun">
<input type="text" data-table="t0101_tahunajaran" data-field="x_AkhirTahun" name="x_AkhirTahun" id="x_AkhirTahun" size="30" placeholder="<?php echo HtmlEncode($t0101_tahunajaran->AkhirTahun->getPlaceHolder()) ?>" value="<?php echo $t0101_tahunajaran->AkhirTahun->EditValue ?>"<?php echo $t0101_tahunajaran->AkhirTahun->editAttributes() ?>>
</span>
<?php echo $t0101_tahunajaran->AkhirTahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0101_tahunajaran->TahunAjaran->Visible) { // TahunAjaran ?>
	<div id="r_TahunAjaran" class="form-group row">
		<label id="elh_t0101_tahunajaran_TahunAjaran" for="x_TahunAjaran" class="<?php echo $t0101_tahunajaran_add->LeftColumnClass ?>"><?php echo $t0101_tahunajaran->TahunAjaran->caption() ?><?php echo ($t0101_tahunajaran->TahunAjaran->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0101_tahunajaran_add->RightColumnClass ?>"><div<?php echo $t0101_tahunajaran->TahunAjaran->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_TahunAjaran">
<input type="text" data-table="t0101_tahunajaran" data-field="x_TahunAjaran" name="x_TahunAjaran" id="x_TahunAjaran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t0101_tahunajaran->TahunAjaran->getPlaceHolder()) ?>" value="<?php echo $t0101_tahunajaran->TahunAjaran->EditValue ?>"<?php echo $t0101_tahunajaran->TahunAjaran->editAttributes() ?>>
</span>
<?php echo $t0101_tahunajaran->TahunAjaran->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0101_tahunajaran->Aktif->Visible) { // Aktif ?>
	<div id="r_Aktif" class="form-group row">
		<label id="elh_t0101_tahunajaran_Aktif" class="<?php echo $t0101_tahunajaran_add->LeftColumnClass ?>"><?php echo $t0101_tahunajaran->Aktif->caption() ?><?php echo ($t0101_tahunajaran->Aktif->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0101_tahunajaran_add->RightColumnClass ?>"><div<?php echo $t0101_tahunajaran->Aktif->cellAttributes() ?>>
<span id="el_t0101_tahunajaran_Aktif">
<div id="tp_x_Aktif" class="ew-template"><input type="radio" class="form-check-input" data-table="t0101_tahunajaran" data-field="x_Aktif" data-value-separator="<?php echo $t0101_tahunajaran->Aktif->displayValueSeparatorAttribute() ?>" name="x_Aktif" id="x_Aktif" value="{value}"<?php echo $t0101_tahunajaran->Aktif->editAttributes() ?>></div>
<div id="dsl_x_Aktif" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $t0101_tahunajaran->Aktif->radioButtonListHtml(FALSE, "x_Aktif") ?>
</div></div>
</span>
<?php echo $t0101_tahunajaran->Aktif->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t0101_tahunajaran_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0101_tahunajaran_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0101_tahunajaran_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0101_tahunajaran_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0101_tahunajaran_add->terminate();
?>