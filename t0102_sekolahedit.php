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
$t0102_sekolah_edit = new t0102_sekolah_edit();

// Run the page
$t0102_sekolah_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0102_sekolah_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ft0102_sekolahedit = currentForm = new ew.Form("ft0102_sekolahedit", "edit");

// Validate form
ft0102_sekolahedit.validate = function() {
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
		<?php if ($t0102_sekolah_edit->Sekolah->Required) { ?>
			elm = this.getElements("x" + infix + "_Sekolah");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0102_sekolah->Sekolah->caption(), $t0102_sekolah->Sekolah->RequiredErrorMessage)) ?>");
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
ft0102_sekolahedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0102_sekolahedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0102_sekolah_edit->showPageHeader(); ?>
<?php
$t0102_sekolah_edit->showMessage();
?>
<form name="ft0102_sekolahedit" id="ft0102_sekolahedit" class="<?php echo $t0102_sekolah_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0102_sekolah_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0102_sekolah_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0102_sekolah">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t0102_sekolah_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t0102_sekolah->Sekolah->Visible) { // Sekolah ?>
	<div id="r_Sekolah" class="form-group row">
		<label id="elh_t0102_sekolah_Sekolah" for="x_Sekolah" class="<?php echo $t0102_sekolah_edit->LeftColumnClass ?>"><?php echo $t0102_sekolah->Sekolah->caption() ?><?php echo ($t0102_sekolah->Sekolah->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0102_sekolah_edit->RightColumnClass ?>"><div<?php echo $t0102_sekolah->Sekolah->cellAttributes() ?>>
<span id="el_t0102_sekolah_Sekolah">
<input type="text" data-table="t0102_sekolah" data-field="x_Sekolah" name="x_Sekolah" id="x_Sekolah" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t0102_sekolah->Sekolah->getPlaceHolder()) ?>" value="<?php echo $t0102_sekolah->Sekolah->EditValue ?>"<?php echo $t0102_sekolah->Sekolah->editAttributes() ?>>
</span>
<?php echo $t0102_sekolah->Sekolah->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t0102_sekolah" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t0102_sekolah->id->CurrentValue) ?>">
<?php if (!$t0102_sekolah_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0102_sekolah_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0102_sekolah_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0102_sekolah_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0102_sekolah_edit->terminate();
?>