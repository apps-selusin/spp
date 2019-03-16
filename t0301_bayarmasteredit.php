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
$t0301_bayarmaster_edit = new t0301_bayarmaster_edit();

// Run the page
$t0301_bayarmaster_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0301_bayarmaster_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft0301_bayarmasteredit = currentForm = new ew.Form("ft0301_bayarmasteredit", "edit");

// Validate form
ft0301_bayarmasteredit.validate = function() {
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
		<?php if ($t0301_bayarmaster_edit->Nomor->Required) { ?>
			elm = this.getElements("x" + infix + "_Nomor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0301_bayarmaster->Nomor->caption(), $t0301_bayarmaster->Nomor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0301_bayarmaster_edit->Tanggal->Required) { ?>
			elm = this.getElements("x" + infix + "_Tanggal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0301_bayarmaster->Tanggal->caption(), $t0301_bayarmaster->Tanggal->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Tanggal");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0301_bayarmaster->Tanggal->errorMessage()) ?>");
		<?php if ($t0301_bayarmaster_edit->tahunajaran_id->Required) { ?>
			elm = this.getElements("x" + infix + "_tahunajaran_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0301_bayarmaster->tahunajaran_id->caption(), $t0301_bayarmaster->tahunajaran_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0301_bayarmaster_edit->siswa_id->Required) { ?>
			elm = this.getElements("x" + infix + "_siswa_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0301_bayarmaster->siswa_id->caption(), $t0301_bayarmaster->siswa_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_siswa_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0301_bayarmaster->siswa_id->errorMessage()) ?>");
		<?php if ($t0301_bayarmaster_edit->Total->Required) { ?>
			elm = this.getElements("x" + infix + "_Total");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0301_bayarmaster->Total->caption(), $t0301_bayarmaster->Total->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Total");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0301_bayarmaster->Total->errorMessage()) ?>");

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
ft0301_bayarmasteredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0301_bayarmasteredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0301_bayarmasteredit.lists["x_tahunajaran_id"] = <?php echo $t0301_bayarmaster_edit->tahunajaran_id->Lookup->toClientList() ?>;
ft0301_bayarmasteredit.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0301_bayarmaster_edit->tahunajaran_id->lookupOptions()) ?>;
ft0301_bayarmasteredit.lists["x_siswa_id"] = <?php echo $t0301_bayarmaster_edit->siswa_id->Lookup->toClientList() ?>;
ft0301_bayarmasteredit.lists["x_siswa_id"].options = <?php echo JsonEncode($t0301_bayarmaster_edit->siswa_id->lookupOptions()) ?>;
ft0301_bayarmasteredit.autoSuggests["x_siswa_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0301_bayarmaster_edit->showPageHeader(); ?>
<?php
$t0301_bayarmaster_edit->showMessage();
?>
<form name="ft0301_bayarmasteredit" id="ft0301_bayarmasteredit" class="<?php echo $t0301_bayarmaster_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0301_bayarmaster_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0301_bayarmaster_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0301_bayarmaster">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t0301_bayarmaster_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t0301_bayarmaster->Nomor->Visible) { // Nomor ?>
	<div id="r_Nomor" class="form-group row">
		<label id="elh_t0301_bayarmaster_Nomor" for="x_Nomor" class="<?php echo $t0301_bayarmaster_edit->LeftColumnClass ?>"><?php echo $t0301_bayarmaster->Nomor->caption() ?><?php echo ($t0301_bayarmaster->Nomor->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0301_bayarmaster_edit->RightColumnClass ?>"><div<?php echo $t0301_bayarmaster->Nomor->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_Nomor">
<input type="text" data-table="t0301_bayarmaster" data-field="x_Nomor" name="x_Nomor" id="x_Nomor" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t0301_bayarmaster->Nomor->getPlaceHolder()) ?>" value="<?php echo $t0301_bayarmaster->Nomor->EditValue ?>"<?php echo $t0301_bayarmaster->Nomor->editAttributes() ?>>
</span>
<?php echo $t0301_bayarmaster->Nomor->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0301_bayarmaster->Tanggal->Visible) { // Tanggal ?>
	<div id="r_Tanggal" class="form-group row">
		<label id="elh_t0301_bayarmaster_Tanggal" for="x_Tanggal" class="<?php echo $t0301_bayarmaster_edit->LeftColumnClass ?>"><?php echo $t0301_bayarmaster->Tanggal->caption() ?><?php echo ($t0301_bayarmaster->Tanggal->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0301_bayarmaster_edit->RightColumnClass ?>"><div<?php echo $t0301_bayarmaster->Tanggal->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_Tanggal">
<input type="text" data-table="t0301_bayarmaster" data-field="x_Tanggal" data-format="7" name="x_Tanggal" id="x_Tanggal" placeholder="<?php echo HtmlEncode($t0301_bayarmaster->Tanggal->getPlaceHolder()) ?>" value="<?php echo $t0301_bayarmaster->Tanggal->EditValue ?>"<?php echo $t0301_bayarmaster->Tanggal->editAttributes() ?>>
<?php if (!$t0301_bayarmaster->Tanggal->ReadOnly && !$t0301_bayarmaster->Tanggal->Disabled && !isset($t0301_bayarmaster->Tanggal->EditAttrs["readonly"]) && !isset($t0301_bayarmaster->Tanggal->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("ft0301_bayarmasteredit", "x_Tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php echo $t0301_bayarmaster->Tanggal->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0301_bayarmaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<div id="r_tahunajaran_id" class="form-group row">
		<label id="elh_t0301_bayarmaster_tahunajaran_id" for="x_tahunajaran_id" class="<?php echo $t0301_bayarmaster_edit->LeftColumnClass ?>"><?php echo $t0301_bayarmaster->tahunajaran_id->caption() ?><?php echo ($t0301_bayarmaster->tahunajaran_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0301_bayarmaster_edit->RightColumnClass ?>"><div<?php echo $t0301_bayarmaster->tahunajaran_id->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_tahunajaran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0301_bayarmaster" data-field="x_tahunajaran_id" data-value-separator="<?php echo $t0301_bayarmaster->tahunajaran_id->displayValueSeparatorAttribute() ?>" id="x_tahunajaran_id" name="x_tahunajaran_id"<?php echo $t0301_bayarmaster->tahunajaran_id->editAttributes() ?>>
		<?php echo $t0301_bayarmaster->tahunajaran_id->selectOptionListHtml("x_tahunajaran_id") ?>
	</select>
</div>
<?php echo $t0301_bayarmaster->tahunajaran_id->Lookup->getParamTag("p_x_tahunajaran_id") ?>
</span>
<?php echo $t0301_bayarmaster->tahunajaran_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0301_bayarmaster->siswa_id->Visible) { // siswa_id ?>
	<div id="r_siswa_id" class="form-group row">
		<label id="elh_t0301_bayarmaster_siswa_id" class="<?php echo $t0301_bayarmaster_edit->LeftColumnClass ?>"><?php echo $t0301_bayarmaster->siswa_id->caption() ?><?php echo ($t0301_bayarmaster->siswa_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0301_bayarmaster_edit->RightColumnClass ?>"><div<?php echo $t0301_bayarmaster->siswa_id->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_siswa_id">
<?php
$wrkonchange = "" . trim(@$t0301_bayarmaster->siswa_id->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$t0301_bayarmaster->siswa_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_siswa_id" class="text-nowrap" style="z-index: 8950">
	<input type="text" class="form-control" name="sv_x_siswa_id" id="sv_x_siswa_id" value="<?php echo RemoveHtml($t0301_bayarmaster->siswa_id->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($t0301_bayarmaster->siswa_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t0301_bayarmaster->siswa_id->getPlaceHolder()) ?>"<?php echo $t0301_bayarmaster->siswa_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t0301_bayarmaster" data-field="x_siswa_id" data-value-separator="<?php echo $t0301_bayarmaster->siswa_id->displayValueSeparatorAttribute() ?>" name="x_siswa_id" id="x_siswa_id" value="<?php echo HtmlEncode($t0301_bayarmaster->siswa_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ft0301_bayarmasteredit.createAutoSuggest({"id":"x_siswa_id","forceSelect":false});
</script>
<?php echo $t0301_bayarmaster->siswa_id->Lookup->getParamTag("p_x_siswa_id") ?>
</span>
<?php echo $t0301_bayarmaster->siswa_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0301_bayarmaster->Total->Visible) { // Total ?>
	<div id="r_Total" class="form-group row">
		<label id="elh_t0301_bayarmaster_Total" for="x_Total" class="<?php echo $t0301_bayarmaster_edit->LeftColumnClass ?>"><?php echo $t0301_bayarmaster->Total->caption() ?><?php echo ($t0301_bayarmaster->Total->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0301_bayarmaster_edit->RightColumnClass ?>"><div<?php echo $t0301_bayarmaster->Total->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_Total">
<input type="text" data-table="t0301_bayarmaster" data-field="x_Total" name="x_Total" id="x_Total" size="30" placeholder="<?php echo HtmlEncode($t0301_bayarmaster->Total->getPlaceHolder()) ?>" value="<?php echo $t0301_bayarmaster->Total->EditValue ?>"<?php echo $t0301_bayarmaster->Total->editAttributes() ?>>
</span>
<?php echo $t0301_bayarmaster->Total->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t0301_bayarmaster" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t0301_bayarmaster->id->CurrentValue) ?>">
<?php
	if (in_array("t0302_bayardetail", explode(",", $t0301_bayarmaster->getCurrentDetailTable())) && $t0302_bayardetail->DetailEdit) {
?>
<?php if ($t0301_bayarmaster->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t0302_bayardetail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t0302_bayardetailgrid.php" ?>
<?php } ?>
<?php if (!$t0301_bayarmaster_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0301_bayarmaster_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0301_bayarmaster_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0301_bayarmaster_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0301_bayarmaster_edit->terminate();
?>