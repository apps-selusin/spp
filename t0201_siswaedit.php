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
$t0201_siswa_edit = new t0201_siswa_edit();

// Run the page
$t0201_siswa_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0201_siswa_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft0201_siswaedit = currentForm = new ew.Form("ft0201_siswaedit", "edit");

// Validate form
ft0201_siswaedit.validate = function() {
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
		<?php if ($t0201_siswa_edit->NIS->Required) { ?>
			elm = this.getElements("x" + infix + "_NIS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0201_siswa->NIS->caption(), $t0201_siswa->NIS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0201_siswa_edit->Nama->Required) { ?>
			elm = this.getElements("x" + infix + "_Nama");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0201_siswa->Nama->caption(), $t0201_siswa->Nama->RequiredErrorMessage)) ?>");
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
ft0201_siswaedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0201_siswaedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0201_siswa_edit->showPageHeader(); ?>
<?php
$t0201_siswa_edit->showMessage();
?>
<form name="ft0201_siswaedit" id="ft0201_siswaedit" class="<?php echo $t0201_siswa_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0201_siswa_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0201_siswa_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0201_siswa">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t0201_siswa_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t0201_siswa->NIS->Visible) { // NIS ?>
	<div id="r_NIS" class="form-group row">
		<label id="elh_t0201_siswa_NIS" for="x_NIS" class="<?php echo $t0201_siswa_edit->LeftColumnClass ?>"><?php echo $t0201_siswa->NIS->caption() ?><?php echo ($t0201_siswa->NIS->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0201_siswa_edit->RightColumnClass ?>"><div<?php echo $t0201_siswa->NIS->cellAttributes() ?>>
<span id="el_t0201_siswa_NIS">
<input type="text" data-table="t0201_siswa" data-field="x_NIS" name="x_NIS" id="x_NIS" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t0201_siswa->NIS->getPlaceHolder()) ?>" value="<?php echo $t0201_siswa->NIS->EditValue ?>"<?php echo $t0201_siswa->NIS->editAttributes() ?>>
</span>
<?php echo $t0201_siswa->NIS->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t0201_siswa->Nama->Visible) { // Nama ?>
	<div id="r_Nama" class="form-group row">
		<label id="elh_t0201_siswa_Nama" for="x_Nama" class="<?php echo $t0201_siswa_edit->LeftColumnClass ?>"><?php echo $t0201_siswa->Nama->caption() ?><?php echo ($t0201_siswa->Nama->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0201_siswa_edit->RightColumnClass ?>"><div<?php echo $t0201_siswa->Nama->cellAttributes() ?>>
<span id="el_t0201_siswa_Nama">
<input type="text" data-table="t0201_siswa" data-field="x_Nama" name="x_Nama" id="x_Nama" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t0201_siswa->Nama->getPlaceHolder()) ?>" value="<?php echo $t0201_siswa->Nama->EditValue ?>"<?php echo $t0201_siswa->Nama->editAttributes() ?>>
</span>
<?php echo $t0201_siswa->Nama->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t0201_siswa" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t0201_siswa->id->CurrentValue) ?>">
<?php
	if (in_array("t0202_siswaiuran", explode(",", $t0201_siswa->getCurrentDetailTable())) && $t0202_siswaiuran->DetailEdit) {
?>
<?php if ($t0201_siswa->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t0202_siswaiuran", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t0202_siswaiurangrid.php" ?>
<?php } ?>
<?php if (!$t0201_siswa_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0201_siswa_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0201_siswa_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0201_siswa_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0201_siswa_edit->terminate();
?>