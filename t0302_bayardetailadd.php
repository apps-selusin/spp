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
$t0302_bayardetail_add = new t0302_bayardetail_add();

// Run the page
$t0302_bayardetail_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0302_bayardetail_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft0302_bayardetailadd = currentForm = new ew.Form("ft0302_bayardetailadd", "add");

// Validate form
ft0302_bayardetailadd.validate = function() {
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
		<?php if ($t0302_bayardetail_add->iuran_id->Required) { ?>
			elm = this.getElements("x" + infix + "_iuran_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0302_bayardetail->iuran_id->caption(), $t0302_bayardetail->iuran_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_iuran_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0302_bayardetail->iuran_id->errorMessage()) ?>");
		<?php if ($t0302_bayardetail_add->Periode1->Required) { ?>
			elm = this.getElements("x" + infix + "_Periode1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0302_bayardetail->Periode1->caption(), $t0302_bayardetail->Periode1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0302_bayardetail_add->Periode2->Required) { ?>
			elm = this.getElements("x" + infix + "_Periode2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0302_bayardetail->Periode2->caption(), $t0302_bayardetail->Periode2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0302_bayardetail_add->Keterangan->Required) { ?>
			elm = this.getElements("x" + infix + "_Keterangan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0302_bayardetail->Keterangan->caption(), $t0302_bayardetail->Keterangan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0302_bayardetail_add->Jumlah->Required) { ?>
			elm = this.getElements("x" + infix + "_Jumlah");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0302_bayardetail->Jumlah->caption(), $t0302_bayardetail->Jumlah->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Jumlah");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0302_bayardetail->Jumlah->errorMessage()) ?>");

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
ft0302_bayardetailadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0302_bayardetailadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0302_bayardetailadd.lists["x_iuran_id"] = <?php echo $t0302_bayardetail_add->iuran_id->Lookup->toClientList() ?>;
ft0302_bayardetailadd.lists["x_iuran_id"].options = <?php echo JsonEncode($t0302_bayardetail_add->iuran_id->lookupOptions()) ?>;
ft0302_bayardetailadd.autoSuggests["x_iuran_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ft0302_bayardetailadd.lists["x_Periode1"] = <?php echo $t0302_bayardetail_add->Periode1->Lookup->toClientList() ?>;
ft0302_bayardetailadd.lists["x_Periode1"].options = <?php echo JsonEncode($t0302_bayardetail_add->Periode1->options(FALSE, TRUE)) ?>;
ft0302_bayardetailadd.lists["x_Periode2"] = <?php echo $t0302_bayardetail_add->Periode2->Lookup->toClientList() ?>;
ft0302_bayardetailadd.lists["x_Periode2"].options = <?php echo JsonEncode($t0302_bayardetail_add->Periode2->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0302_bayardetail_add->showPageHeader(); ?>
<?php
$t0302_bayardetail_add->showMessage();
?>
<form name="ft0302_bayardetailadd" id="ft0302_bayardetailadd" class="<?php echo $t0302_bayardetail_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0302_bayardetail_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0302_bayardetail_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0302_bayardetail">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t0302_bayardetail_add->IsModal ?>">
<?php if ($t0302_bayardetail->getCurrentMasterTable() == "t0301_bayarmaster") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t0301_bayarmaster">
<input type="hidden" name="fk_id" value="<?php echo $t0302_bayardetail->bayarmaster_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
	<div id="r_iuran_id" class="form-group row">
		<label id="elh_t0302_bayardetail_iuran_id" class="<?php echo $t0302_bayardetail_add->LeftColumnClass ?>"><?php echo $t0302_bayardetail->iuran_id->caption() ?><?php echo ($t0302_bayardetail->iuran_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0302_bayardetail_add->RightColumnClass ?>"><div<?php echo $t0302_bayardetail->iuran_id->cellAttributes() ?>>
<span id="el_t0302_bayardetail_iuran_id">
<?php
$wrkonchange = "" . trim(@$t0302_bayardetail->iuran_id->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$t0302_bayardetail->iuran_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_iuran_id" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_iuran_id" id="sv_x_iuran_id" value="<?php echo RemoveHtml($t0302_bayardetail->iuran_id->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->getPlaceHolder()) ?>"<?php echo $t0302_bayardetail->iuran_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" data-value-separator="<?php echo $t0302_bayardetail->iuran_id->displayValueSeparatorAttribute() ?>" name="x_iuran_id" id="x_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ft0302_bayardetailadd.createAutoSuggest({"id":"x_iuran_id","forceSelect":false});
</script>
<?php echo $t0302_bayardetail->iuran_id->Lookup->getParamTag("p_x_iuran_id") ?>
</span>
<?php echo $t0302_bayardetail->iuran_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
	<div id="r_Periode1" class="form-group row">
		<label id="elh_t0302_bayardetail_Periode1" for="x_Periode1" class="<?php echo $t0302_bayardetail_add->LeftColumnClass ?>"><?php echo $t0302_bayardetail->Periode1->caption() ?><?php echo ($t0302_bayardetail->Periode1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0302_bayardetail_add->RightColumnClass ?>"><div<?php echo $t0302_bayardetail->Periode1->cellAttributes() ?>>
<span id="el_t0302_bayardetail_Periode1">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0302_bayardetail" data-field="x_Periode1" data-value-separator="<?php echo $t0302_bayardetail->Periode1->displayValueSeparatorAttribute() ?>" id="x_Periode1" name="x_Periode1"<?php echo $t0302_bayardetail->Periode1->editAttributes() ?>>
		<?php echo $t0302_bayardetail->Periode1->selectOptionListHtml("x_Periode1") ?>
	</select>
</div>
</span>
<?php echo $t0302_bayardetail->Periode1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
	<div id="r_Periode2" class="form-group row">
		<label id="elh_t0302_bayardetail_Periode2" for="x_Periode2" class="<?php echo $t0302_bayardetail_add->LeftColumnClass ?>"><?php echo $t0302_bayardetail->Periode2->caption() ?><?php echo ($t0302_bayardetail->Periode2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0302_bayardetail_add->RightColumnClass ?>"><div<?php echo $t0302_bayardetail->Periode2->cellAttributes() ?>>
<span id="el_t0302_bayardetail_Periode2">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0302_bayardetail" data-field="x_Periode2" data-value-separator="<?php echo $t0302_bayardetail->Periode2->displayValueSeparatorAttribute() ?>" id="x_Periode2" name="x_Periode2"<?php echo $t0302_bayardetail->Periode2->editAttributes() ?>>
		<?php echo $t0302_bayardetail->Periode2->selectOptionListHtml("x_Periode2") ?>
	</select>
</div>
</span>
<?php echo $t0302_bayardetail->Periode2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
	<div id="r_Keterangan" class="form-group row">
		<label id="elh_t0302_bayardetail_Keterangan" for="x_Keterangan" class="<?php echo $t0302_bayardetail_add->LeftColumnClass ?>"><?php echo $t0302_bayardetail->Keterangan->caption() ?><?php echo ($t0302_bayardetail->Keterangan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0302_bayardetail_add->RightColumnClass ?>"><div<?php echo $t0302_bayardetail->Keterangan->cellAttributes() ?>>
<span id="el_t0302_bayardetail_Keterangan">
<input type="text" data-table="t0302_bayardetail" data-field="x_Keterangan" name="x_Keterangan" id="x_Keterangan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Keterangan->EditValue ?>"<?php echo $t0302_bayardetail->Keterangan->editAttributes() ?>>
</span>
<?php echo $t0302_bayardetail->Keterangan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
	<div id="r_Jumlah" class="form-group row">
		<label id="elh_t0302_bayardetail_Jumlah" for="x_Jumlah" class="<?php echo $t0302_bayardetail_add->LeftColumnClass ?>"><?php echo $t0302_bayardetail->Jumlah->caption() ?><?php echo ($t0302_bayardetail->Jumlah->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0302_bayardetail_add->RightColumnClass ?>"><div<?php echo $t0302_bayardetail->Jumlah->cellAttributes() ?>>
<span id="el_t0302_bayardetail_Jumlah">
<input type="text" data-table="t0302_bayardetail" data-field="x_Jumlah" name="x_Jumlah" id="x_Jumlah" size="30" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Jumlah->EditValue ?>"<?php echo $t0302_bayardetail->Jumlah->editAttributes() ?>>
</span>
<?php echo $t0302_bayardetail->Jumlah->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<?php if (strval($t0302_bayardetail->bayarmaster_id->getSessionValue()) <> "") { ?>
	<input type="hidden" name="x_bayarmaster_id" id="x_bayarmaster_id" value="<?php echo HtmlEncode(strval($t0302_bayardetail->bayarmaster_id->getSessionValue())) ?>">
	<?php } ?>
<?php if (!$t0302_bayardetail_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0302_bayardetail_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0302_bayardetail_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0302_bayardetail_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0302_bayardetail_add->terminate();
?>