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
$t0202_siswaiuran_add = new t0202_siswaiuran_add();

// Run the page
$t0202_siswaiuran_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0202_siswaiuran_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft0202_siswaiuranadd = currentForm = new ew.Form("ft0202_siswaiuranadd", "add");

// Validate form
ft0202_siswaiuranadd.validate = function() {
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
		<?php if ($t0202_siswaiuran_add->tahunajaran_id->Required) { ?>
			elm = this.getElements("x" + infix + "_tahunajaran_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->tahunajaran_id->caption(), $t0202_siswaiuran->tahunajaran_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_add->iuran_id->Required) { ?>
			elm = this.getElements("x" + infix + "_iuran_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->iuran_id->caption(), $t0202_siswaiuran->iuran_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_add->Nilai->Required) { ?>
			elm = this.getElements("x" + infix + "_Nilai");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->Nilai->caption(), $t0202_siswaiuran->Nilai->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Nilai");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0202_siswaiuran->Nilai->errorMessage()) ?>");

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
ft0202_siswaiuranadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0202_siswaiuranadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0202_siswaiuranadd.lists["x_tahunajaran_id"] = <?php echo $t0202_siswaiuran_add->tahunajaran_id->Lookup->toClientList() ?>;
ft0202_siswaiuranadd.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_add->tahunajaran_id->lookupOptions()) ?>;
ft0202_siswaiuranadd.lists["x_iuran_id"] = <?php echo $t0202_siswaiuran_add->iuran_id->Lookup->toClientList() ?>;
ft0202_siswaiuranadd.lists["x_iuran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_add->iuran_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0202_siswaiuran_add->showPageHeader(); ?>
<?php
$t0202_siswaiuran_add->showMessage();
?>
<form name="ft0202_siswaiuranadd" id="ft0202_siswaiuranadd" class="<?php echo $t0202_siswaiuran_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0202_siswaiuran_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0202_siswaiuran_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0202_siswaiuran">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t0202_siswaiuran_add->IsModal ?>">
<?php if ($t0202_siswaiuran->getCurrentMasterTable() == "t0201_siswa") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t0201_siswa">
<input type="hidden" name="fk_id" value="<?php echo $t0202_siswaiuran->siswa_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<div id="r_tahunajaran_id" class="form-group row">
		<label id="elh_t0202_siswaiuran_tahunajaran_id" for="x_tahunajaran_id" class="<?php echo $t0202_siswaiuran_add->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->tahunajaran_id->caption() ?><?php echo ($t0202_siswaiuran->tahunajaran_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_add->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->tahunajaran_id->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_tahunajaran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" data-value-separator="<?php echo $t0202_siswaiuran->tahunajaran_id->displayValueSeparatorAttribute() ?>" id="x_tahunajaran_id" name="x_tahunajaran_id"<?php echo $t0202_siswaiuran->tahunajaran_id->editAttributes() ?>>
		<?php echo $t0202_siswaiuran->tahunajaran_id->selectOptionListHtml("x_tahunajaran_id") ?>
	</select>
</div>
<?php echo $t0202_siswaiuran->tahunajaran_id->Lookup->getParamTag("p_x_tahunajaran_id") ?>
</span>
<?php echo $t0202_siswaiuran->tahunajaran_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
	<div id="r_iuran_id" class="form-group row">
		<label id="elh_t0202_siswaiuran_iuran_id" for="x_iuran_id" class="<?php echo $t0202_siswaiuran_add->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->iuran_id->caption() ?><?php echo ($t0202_siswaiuran->iuran_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_add->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->iuran_id->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_iuran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0202_siswaiuran" data-field="x_iuran_id" data-value-separator="<?php echo $t0202_siswaiuran->iuran_id->displayValueSeparatorAttribute() ?>" id="x_iuran_id" name="x_iuran_id"<?php echo $t0202_siswaiuran->iuran_id->editAttributes() ?>>
		<?php echo $t0202_siswaiuran->iuran_id->selectOptionListHtml("x_iuran_id") ?>
	</select>
</div>
<?php echo $t0202_siswaiuran->iuran_id->Lookup->getParamTag("p_x_iuran_id") ?>
</span>
<?php echo $t0202_siswaiuran->iuran_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
	<div id="r_Nilai" class="form-group row">
		<label id="elh_t0202_siswaiuran_Nilai" for="x_Nilai" class="<?php echo $t0202_siswaiuran_add->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->Nilai->caption() ?><?php echo ($t0202_siswaiuran->Nilai->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_add->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->Nilai->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_Nilai">
<input type="text" data-table="t0202_siswaiuran" data-field="x_Nilai" name="x_Nilai" id="x_Nilai" size="30" placeholder="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->getPlaceHolder()) ?>" value="<?php echo $t0202_siswaiuran->Nilai->EditValue ?>"<?php echo $t0202_siswaiuran->Nilai->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->Nilai->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<?php if (strval($t0202_siswaiuran->siswa_id->getSessionValue()) <> "") { ?>
	<input type="hidden" name="x_siswa_id" id="x_siswa_id" value="<?php echo HtmlEncode(strval($t0202_siswaiuran->siswa_id->getSessionValue())) ?>">
	<?php } ?>
<?php if (!$t0202_siswaiuran_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0202_siswaiuran_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0202_siswaiuran_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0202_siswaiuran_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0202_siswaiuran_add->terminate();
?>