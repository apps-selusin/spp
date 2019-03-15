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
$t0202_siswaiuran_edit = new t0202_siswaiuran_edit();

// Run the page
$t0202_siswaiuran_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0202_siswaiuran_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft0202_siswaiuranedit = currentForm = new ew.Form("ft0202_siswaiuranedit", "edit");

// Validate form
ft0202_siswaiuranedit.validate = function() {
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
		<?php if ($t0202_siswaiuran_edit->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->id->caption(), $t0202_siswaiuran->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->tahunajaran_id->Required) { ?>
			elm = this.getElements("x" + infix + "_tahunajaran_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->tahunajaran_id->caption(), $t0202_siswaiuran->tahunajaran_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->siswa_id->Required) { ?>
			elm = this.getElements("x" + infix + "_siswa_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->siswa_id->caption(), $t0202_siswaiuran->siswa_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_siswa_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0202_siswaiuran->siswa_id->errorMessage()) ?>");
		<?php if ($t0202_siswaiuran_edit->iuran_id->Required) { ?>
			elm = this.getElements("x" + infix + "_iuran_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->iuran_id->caption(), $t0202_siswaiuran->iuran_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->Nilai->Required) { ?>
			elm = this.getElements("x" + infix + "_Nilai");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->Nilai->caption(), $t0202_siswaiuran->Nilai->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Nilai");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0202_siswaiuran->Nilai->errorMessage()) ?>");
		<?php if ($t0202_siswaiuran_edit->Terbayar->Required) { ?>
			elm = this.getElements("x" + infix + "_Terbayar");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->Terbayar->caption(), $t0202_siswaiuran->Terbayar->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Terbayar");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0202_siswaiuran->Terbayar->errorMessage()) ?>");
		<?php if ($t0202_siswaiuran_edit->Sisa->Required) { ?>
			elm = this.getElements("x" + infix + "_Sisa");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->Sisa->caption(), $t0202_siswaiuran->Sisa->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Sisa");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0202_siswaiuran->Sisa->errorMessage()) ?>");
		<?php if ($t0202_siswaiuran_edit->P01->Required) { ?>
			elm = this.getElements("x" + infix + "_P01[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P01->caption(), $t0202_siswaiuran->P01->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P02->Required) { ?>
			elm = this.getElements("x" + infix + "_P02[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P02->caption(), $t0202_siswaiuran->P02->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P03->Required) { ?>
			elm = this.getElements("x" + infix + "_P03[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P03->caption(), $t0202_siswaiuran->P03->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P04->Required) { ?>
			elm = this.getElements("x" + infix + "_P04[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P04->caption(), $t0202_siswaiuran->P04->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P05->Required) { ?>
			elm = this.getElements("x" + infix + "_P05[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P05->caption(), $t0202_siswaiuran->P05->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P06->Required) { ?>
			elm = this.getElements("x" + infix + "_P06[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P06->caption(), $t0202_siswaiuran->P06->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P07->Required) { ?>
			elm = this.getElements("x" + infix + "_P07[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P07->caption(), $t0202_siswaiuran->P07->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P08->Required) { ?>
			elm = this.getElements("x" + infix + "_P08[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P08->caption(), $t0202_siswaiuran->P08->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P09->Required) { ?>
			elm = this.getElements("x" + infix + "_P09[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P09->caption(), $t0202_siswaiuran->P09->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P10->Required) { ?>
			elm = this.getElements("x" + infix + "_P10[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P10->caption(), $t0202_siswaiuran->P10->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P11->Required) { ?>
			elm = this.getElements("x" + infix + "_P11[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P11->caption(), $t0202_siswaiuran->P11->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_edit->P12->Required) { ?>
			elm = this.getElements("x" + infix + "_P12[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->P12->caption(), $t0202_siswaiuran->P12->RequiredErrorMessage)) ?>");
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
ft0202_siswaiuranedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0202_siswaiuranedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0202_siswaiuranedit.lists["x_tahunajaran_id"] = <?php echo $t0202_siswaiuran_edit->tahunajaran_id->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->tahunajaran_id->lookupOptions()) ?>;
ft0202_siswaiuranedit.lists["x_iuran_id"] = <?php echo $t0202_siswaiuran_edit->iuran_id->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_iuran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->iuran_id->lookupOptions()) ?>;
ft0202_siswaiuranedit.lists["x_P01[]"] = <?php echo $t0202_siswaiuran_edit->P01->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P01[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P01->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P02[]"] = <?php echo $t0202_siswaiuran_edit->P02->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P02[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P02->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P03[]"] = <?php echo $t0202_siswaiuran_edit->P03->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P03[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P03->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P04[]"] = <?php echo $t0202_siswaiuran_edit->P04->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P04[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P04->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P05[]"] = <?php echo $t0202_siswaiuran_edit->P05->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P05[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P05->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P06[]"] = <?php echo $t0202_siswaiuran_edit->P06->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P06[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P06->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P07[]"] = <?php echo $t0202_siswaiuran_edit->P07->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P07[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P07->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P08[]"] = <?php echo $t0202_siswaiuran_edit->P08->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P08[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P08->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P09[]"] = <?php echo $t0202_siswaiuran_edit->P09->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P09[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P09->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P10[]"] = <?php echo $t0202_siswaiuran_edit->P10->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P10[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P10->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P11[]"] = <?php echo $t0202_siswaiuran_edit->P11->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P11[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P11->options(FALSE, TRUE)) ?>;
ft0202_siswaiuranedit.lists["x_P12[]"] = <?php echo $t0202_siswaiuran_edit->P12->Lookup->toClientList() ?>;
ft0202_siswaiuranedit.lists["x_P12[]"].options = <?php echo JsonEncode($t0202_siswaiuran_edit->P12->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0202_siswaiuran_edit->showPageHeader(); ?>
<?php
$t0202_siswaiuran_edit->showMessage();
?>
<form name="ft0202_siswaiuranedit" id="ft0202_siswaiuranedit" class="<?php echo $t0202_siswaiuran_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0202_siswaiuran_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0202_siswaiuran_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0202_siswaiuran">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t0202_siswaiuran_edit->IsModal ?>">
<?php if ($t0202_siswaiuran->getCurrentMasterTable() == "t0201_siswa") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t0201_siswa">
<input type="hidden" name="fk_id" value="<?php echo $t0202_siswaiuran->siswa_id->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($t0202_siswaiuran->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_t0202_siswaiuran_id" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->id->caption() ?><?php echo ($t0202_siswaiuran->id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->id->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_id">
<span<?php echo $t0202_siswaiuran->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0202_siswaiuran->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t0202_siswaiuran->id->CurrentValue) ?>">
<?php echo $t0202_siswaiuran->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<div id="r_tahunajaran_id" class="form-group row">
		<label id="elh_t0202_siswaiuran_tahunajaran_id" for="x_tahunajaran_id" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->tahunajaran_id->caption() ?><?php echo ($t0202_siswaiuran->tahunajaran_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->tahunajaran_id->cellAttributes() ?>>
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
<?php if ($t0202_siswaiuran->siswa_id->Visible) { // siswa_id ?>
	<div id="r_siswa_id" class="form-group row">
		<label id="elh_t0202_siswaiuran_siswa_id" for="x_siswa_id" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->siswa_id->caption() ?><?php echo ($t0202_siswaiuran->siswa_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->siswa_id->cellAttributes() ?>>
<?php if ($t0202_siswaiuran->siswa_id->getSessionValue() <> "") { ?>
<span id="el_t0202_siswaiuran_siswa_id">
<span<?php echo $t0202_siswaiuran->siswa_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0202_siswaiuran->siswa_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_siswa_id" name="x_siswa_id" value="<?php echo HtmlEncode($t0202_siswaiuran->siswa_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_t0202_siswaiuran_siswa_id">
<input type="text" data-table="t0202_siswaiuran" data-field="x_siswa_id" name="x_siswa_id" id="x_siswa_id" size="30" placeholder="<?php echo HtmlEncode($t0202_siswaiuran->siswa_id->getPlaceHolder()) ?>" value="<?php echo $t0202_siswaiuran->siswa_id->EditValue ?>"<?php echo $t0202_siswaiuran->siswa_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $t0202_siswaiuran->siswa_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
	<div id="r_iuran_id" class="form-group row">
		<label id="elh_t0202_siswaiuran_iuran_id" for="x_iuran_id" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->iuran_id->caption() ?><?php echo ($t0202_siswaiuran->iuran_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->iuran_id->cellAttributes() ?>>
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
		<label id="elh_t0202_siswaiuran_Nilai" for="x_Nilai" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->Nilai->caption() ?><?php echo ($t0202_siswaiuran->Nilai->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->Nilai->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_Nilai">
<input type="text" data-table="t0202_siswaiuran" data-field="x_Nilai" name="x_Nilai" id="x_Nilai" size="30" placeholder="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->getPlaceHolder()) ?>" value="<?php echo $t0202_siswaiuran->Nilai->EditValue ?>"<?php echo $t0202_siswaiuran->Nilai->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->Nilai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->Terbayar->Visible) { // Terbayar ?>
	<div id="r_Terbayar" class="form-group row">
		<label id="elh_t0202_siswaiuran_Terbayar" for="x_Terbayar" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->Terbayar->caption() ?><?php echo ($t0202_siswaiuran->Terbayar->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->Terbayar->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_Terbayar">
<input type="text" data-table="t0202_siswaiuran" data-field="x_Terbayar" name="x_Terbayar" id="x_Terbayar" size="30" placeholder="<?php echo HtmlEncode($t0202_siswaiuran->Terbayar->getPlaceHolder()) ?>" value="<?php echo $t0202_siswaiuran->Terbayar->EditValue ?>"<?php echo $t0202_siswaiuran->Terbayar->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->Terbayar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->Sisa->Visible) { // Sisa ?>
	<div id="r_Sisa" class="form-group row">
		<label id="elh_t0202_siswaiuran_Sisa" for="x_Sisa" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->Sisa->caption() ?><?php echo ($t0202_siswaiuran->Sisa->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->Sisa->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_Sisa">
<input type="text" data-table="t0202_siswaiuran" data-field="x_Sisa" name="x_Sisa" id="x_Sisa" size="30" placeholder="<?php echo HtmlEncode($t0202_siswaiuran->Sisa->getPlaceHolder()) ?>" value="<?php echo $t0202_siswaiuran->Sisa->EditValue ?>"<?php echo $t0202_siswaiuran->Sisa->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->Sisa->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P01->Visible) { // P01 ?>
	<div id="r_P01" class="form-group row">
		<label id="elh_t0202_siswaiuran_P01" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P01->caption() ?><?php echo ($t0202_siswaiuran->P01->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P01->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P01">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P01->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P01" name="x_P01[]" id="x_P01[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P01->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P01->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P02->Visible) { // P02 ?>
	<div id="r_P02" class="form-group row">
		<label id="elh_t0202_siswaiuran_P02" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P02->caption() ?><?php echo ($t0202_siswaiuran->P02->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P02->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P02">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P02->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P02" name="x_P02[]" id="x_P02[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P02->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P02->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P03->Visible) { // P03 ?>
	<div id="r_P03" class="form-group row">
		<label id="elh_t0202_siswaiuran_P03" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P03->caption() ?><?php echo ($t0202_siswaiuran->P03->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P03->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P03">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P03->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P03" name="x_P03[]" id="x_P03[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P03->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P03->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P04->Visible) { // P04 ?>
	<div id="r_P04" class="form-group row">
		<label id="elh_t0202_siswaiuran_P04" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P04->caption() ?><?php echo ($t0202_siswaiuran->P04->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P04->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P04">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P04->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P04" name="x_P04[]" id="x_P04[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P04->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P04->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P05->Visible) { // P05 ?>
	<div id="r_P05" class="form-group row">
		<label id="elh_t0202_siswaiuran_P05" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P05->caption() ?><?php echo ($t0202_siswaiuran->P05->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P05->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P05">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P05->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P05" name="x_P05[]" id="x_P05[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P05->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P05->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P06->Visible) { // P06 ?>
	<div id="r_P06" class="form-group row">
		<label id="elh_t0202_siswaiuran_P06" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P06->caption() ?><?php echo ($t0202_siswaiuran->P06->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P06->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P06">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P06->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P06" name="x_P06[]" id="x_P06[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P06->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P06->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P07->Visible) { // P07 ?>
	<div id="r_P07" class="form-group row">
		<label id="elh_t0202_siswaiuran_P07" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P07->caption() ?><?php echo ($t0202_siswaiuran->P07->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P07->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P07">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P07->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P07" name="x_P07[]" id="x_P07[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P07->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P07->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P08->Visible) { // P08 ?>
	<div id="r_P08" class="form-group row">
		<label id="elh_t0202_siswaiuran_P08" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P08->caption() ?><?php echo ($t0202_siswaiuran->P08->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P08->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P08">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P08->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P08" name="x_P08[]" id="x_P08[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P08->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P08->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P09->Visible) { // P09 ?>
	<div id="r_P09" class="form-group row">
		<label id="elh_t0202_siswaiuran_P09" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P09->caption() ?><?php echo ($t0202_siswaiuran->P09->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P09->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P09">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P09->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P09" name="x_P09[]" id="x_P09[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P09->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P09->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P10->Visible) { // P10 ?>
	<div id="r_P10" class="form-group row">
		<label id="elh_t0202_siswaiuran_P10" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P10->caption() ?><?php echo ($t0202_siswaiuran->P10->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P10->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P10">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P10->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P10" name="x_P10[]" id="x_P10[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P10->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P10->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P11->Visible) { // P11 ?>
	<div id="r_P11" class="form-group row">
		<label id="elh_t0202_siswaiuran_P11" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P11->caption() ?><?php echo ($t0202_siswaiuran->P11->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P11->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P11">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P11->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P11" name="x_P11[]" id="x_P11[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P11->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P11->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0202_siswaiuran->P12->Visible) { // P12 ?>
	<div id="r_P12" class="form-group row">
		<label id="elh_t0202_siswaiuran_P12" class="<?php echo $t0202_siswaiuran_edit->LeftColumnClass ?>"><?php echo $t0202_siswaiuran->P12->caption() ?><?php echo ($t0202_siswaiuran->P12->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0202_siswaiuran_edit->RightColumnClass ?>"><div<?php echo $t0202_siswaiuran->P12->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_P12">
<?php
$selwrk = (ConvertToBool($t0202_siswaiuran->P12->CurrentValue)) ? " checked" : "";
?>
<input type="checkbox" data-table="t0202_siswaiuran" data-field="x_P12" name="x_P12[]" id="x_P12[]" value="1"<?php echo $selwrk ?><?php echo $t0202_siswaiuran->P12->editAttributes() ?>>
</span>
<?php echo $t0202_siswaiuran->P12->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t0202_siswaiuran_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0202_siswaiuran_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0202_siswaiuran_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0202_siswaiuran_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0202_siswaiuran_edit->terminate();
?>