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
$t0106_iuran_view = new t0106_iuran_view();

// Run the page
$t0106_iuran_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0106_iuran_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0106_iuran->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0106_iuranview = currentForm = new ew.Form("ft0106_iuranview", "view");

// Form_CustomValidate event
ft0106_iuranview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0106_iuranview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0106_iuranview.lists["x_Jenis"] = <?php echo $t0106_iuran_view->Jenis->Lookup->toClientList() ?>;
ft0106_iuranview.lists["x_Jenis"].options = <?php echo JsonEncode($t0106_iuran_view->Jenis->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0106_iuran->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0106_iuran_view->ExportOptions->render("body") ?>
<?php $t0106_iuran_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0106_iuran_view->showPageHeader(); ?>
<?php
$t0106_iuran_view->showMessage();
?>
<form name="ft0106_iuranview" id="ft0106_iuranview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0106_iuran_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0106_iuran_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0106_iuran">
<input type="hidden" name="modal" value="<?php echo (int)$t0106_iuran_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0106_iuran->Iuran->Visible) { // Iuran ?>
	<tr id="r_Iuran">
		<td class="<?php echo $t0106_iuran_view->TableLeftColumnClass ?>"><span id="elh_t0106_iuran_Iuran"><?php echo $t0106_iuran->Iuran->caption() ?></span></td>
		<td data-name="Iuran"<?php echo $t0106_iuran->Iuran->cellAttributes() ?>>
<span id="el_t0106_iuran_Iuran">
<span<?php echo $t0106_iuran->Iuran->viewAttributes() ?>>
<?php echo $t0106_iuran->Iuran->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0106_iuran->Jenis->Visible) { // Jenis ?>
	<tr id="r_Jenis">
		<td class="<?php echo $t0106_iuran_view->TableLeftColumnClass ?>"><span id="elh_t0106_iuran_Jenis"><?php echo $t0106_iuran->Jenis->caption() ?></span></td>
		<td data-name="Jenis"<?php echo $t0106_iuran->Jenis->cellAttributes() ?>>
<span id="el_t0106_iuran_Jenis">
<span<?php echo $t0106_iuran->Jenis->viewAttributes() ?>>
<?php echo $t0106_iuran->Jenis->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0106_iuran_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0106_iuran->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0106_iuran_view->terminate();
?>