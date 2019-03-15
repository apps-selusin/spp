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
$t0104_daftarsiswamaster_add = new t0104_daftarsiswamaster_add();

// Run the page
$t0104_daftarsiswamaster_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0104_daftarsiswamaster_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft0104_daftarsiswamasteradd = currentForm = new ew.Form("ft0104_daftarsiswamasteradd", "add");

// Validate form
ft0104_daftarsiswamasteradd.validate = function() {
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
		<?php if ($t0104_daftarsiswamaster_add->tahunajaran_id->Required) { ?>
			elm = this.getElements("x" + infix + "_tahunajaran_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0104_daftarsiswamaster->tahunajaran_id->caption(), $t0104_daftarsiswamaster->tahunajaran_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0104_daftarsiswamaster_add->sekolah_id->Required) { ?>
			elm = this.getElements("x" + infix + "_sekolah_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0104_daftarsiswamaster->sekolah_id->caption(), $t0104_daftarsiswamaster->sekolah_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0104_daftarsiswamaster_add->kelas_id->Required) { ?>
			elm = this.getElements("x" + infix + "_kelas_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0104_daftarsiswamaster->kelas_id->caption(), $t0104_daftarsiswamaster->kelas_id->RequiredErrorMessage)) ?>");
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
ft0104_daftarsiswamasteradd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0104_daftarsiswamasteradd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0104_daftarsiswamasteradd.lists["x_tahunajaran_id"] = <?php echo $t0104_daftarsiswamaster_add->tahunajaran_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasteradd.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_add->tahunajaran_id->lookupOptions()) ?>;
ft0104_daftarsiswamasteradd.lists["x_sekolah_id"] = <?php echo $t0104_daftarsiswamaster_add->sekolah_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasteradd.lists["x_sekolah_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_add->sekolah_id->lookupOptions()) ?>;
ft0104_daftarsiswamasteradd.lists["x_kelas_id"] = <?php echo $t0104_daftarsiswamaster_add->kelas_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasteradd.lists["x_kelas_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_add->kelas_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0104_daftarsiswamaster_add->showPageHeader(); ?>
<?php
$t0104_daftarsiswamaster_add->showMessage();
?>
<form name="ft0104_daftarsiswamasteradd" id="ft0104_daftarsiswamasteradd" class="<?php echo $t0104_daftarsiswamaster_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0104_daftarsiswamaster_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0104_daftarsiswamaster_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0104_daftarsiswamaster">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t0104_daftarsiswamaster_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t0104_daftarsiswamaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<div id="r_tahunajaran_id" class="form-group row">
		<label id="elh_t0104_daftarsiswamaster_tahunajaran_id" for="x_tahunajaran_id" class="<?php echo $t0104_daftarsiswamaster_add->LeftColumnClass ?>"><?php echo $t0104_daftarsiswamaster->tahunajaran_id->caption() ?><?php echo ($t0104_daftarsiswamaster->tahunajaran_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0104_daftarsiswamaster_add->RightColumnClass ?>"><div<?php echo $t0104_daftarsiswamaster->tahunajaran_id->cellAttributes() ?>>
<span id="el_t0104_daftarsiswamaster_tahunajaran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0104_daftarsiswamaster" data-field="x_tahunajaran_id" data-value-separator="<?php echo $t0104_daftarsiswamaster->tahunajaran_id->displayValueSeparatorAttribute() ?>" id="x_tahunajaran_id" name="x_tahunajaran_id"<?php echo $t0104_daftarsiswamaster->tahunajaran_id->editAttributes() ?>>
		<?php echo $t0104_daftarsiswamaster->tahunajaran_id->selectOptionListHtml("x_tahunajaran_id") ?>
	</select>
</div>
<?php echo $t0104_daftarsiswamaster->tahunajaran_id->Lookup->getParamTag("p_x_tahunajaran_id") ?>
</span>
<?php echo $t0104_daftarsiswamaster->tahunajaran_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->sekolah_id->Visible) { // sekolah_id ?>
	<div id="r_sekolah_id" class="form-group row">
		<label id="elh_t0104_daftarsiswamaster_sekolah_id" for="x_sekolah_id" class="<?php echo $t0104_daftarsiswamaster_add->LeftColumnClass ?>"><?php echo $t0104_daftarsiswamaster->sekolah_id->caption() ?><?php echo ($t0104_daftarsiswamaster->sekolah_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0104_daftarsiswamaster_add->RightColumnClass ?>"><div<?php echo $t0104_daftarsiswamaster->sekolah_id->cellAttributes() ?>>
<span id="el_t0104_daftarsiswamaster_sekolah_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0104_daftarsiswamaster" data-field="x_sekolah_id" data-value-separator="<?php echo $t0104_daftarsiswamaster->sekolah_id->displayValueSeparatorAttribute() ?>" id="x_sekolah_id" name="x_sekolah_id"<?php echo $t0104_daftarsiswamaster->sekolah_id->editAttributes() ?>>
		<?php echo $t0104_daftarsiswamaster->sekolah_id->selectOptionListHtml("x_sekolah_id") ?>
	</select>
</div>
<?php echo $t0104_daftarsiswamaster->sekolah_id->Lookup->getParamTag("p_x_sekolah_id") ?>
</span>
<?php echo $t0104_daftarsiswamaster->sekolah_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->kelas_id->Visible) { // kelas_id ?>
	<div id="r_kelas_id" class="form-group row">
		<label id="elh_t0104_daftarsiswamaster_kelas_id" for="x_kelas_id" class="<?php echo $t0104_daftarsiswamaster_add->LeftColumnClass ?>"><?php echo $t0104_daftarsiswamaster->kelas_id->caption() ?><?php echo ($t0104_daftarsiswamaster->kelas_id->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0104_daftarsiswamaster_add->RightColumnClass ?>"><div<?php echo $t0104_daftarsiswamaster->kelas_id->cellAttributes() ?>>
<span id="el_t0104_daftarsiswamaster_kelas_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0104_daftarsiswamaster" data-field="x_kelas_id" data-value-separator="<?php echo $t0104_daftarsiswamaster->kelas_id->displayValueSeparatorAttribute() ?>" id="x_kelas_id" name="x_kelas_id"<?php echo $t0104_daftarsiswamaster->kelas_id->editAttributes() ?>>
		<?php echo $t0104_daftarsiswamaster->kelas_id->selectOptionListHtml("x_kelas_id") ?>
	</select>
</div>
<?php echo $t0104_daftarsiswamaster->kelas_id->Lookup->getParamTag("p_x_kelas_id") ?>
</span>
<?php echo $t0104_daftarsiswamaster->kelas_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("t0105_daftarsiswadetail", explode(",", $t0104_daftarsiswamaster->getCurrentDetailTable())) && $t0105_daftarsiswadetail->DetailAdd) {
?>
<?php if ($t0104_daftarsiswamaster->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t0105_daftarsiswadetail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t0105_daftarsiswadetailgrid.php" ?>
<?php } ?>
<?php if (!$t0104_daftarsiswamaster_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0104_daftarsiswamaster_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0104_daftarsiswamaster_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0104_daftarsiswamaster_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0104_daftarsiswamaster_add->terminate();
?>