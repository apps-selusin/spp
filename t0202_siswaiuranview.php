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
$t0202_siswaiuran_view = new t0202_siswaiuran_view();

// Run the page
$t0202_siswaiuran_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0202_siswaiuran_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0202_siswaiuran->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0202_siswaiuranview = currentForm = new ew.Form("ft0202_siswaiuranview", "view");

// Form_CustomValidate event
ft0202_siswaiuranview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0202_siswaiuranview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0202_siswaiuranview.lists["x_tahunajaran_id"] = <?php echo $t0202_siswaiuran_view->tahunajaran_id->Lookup->toClientList() ?>;
ft0202_siswaiuranview.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_view->tahunajaran_id->lookupOptions()) ?>;
ft0202_siswaiuranview.lists["x_iuran_id"] = <?php echo $t0202_siswaiuran_view->iuran_id->Lookup->toClientList() ?>;
ft0202_siswaiuranview.lists["x_iuran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_view->iuran_id->lookupOptions()) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0202_siswaiuran->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0202_siswaiuran_view->ExportOptions->render("body") ?>
<?php $t0202_siswaiuran_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0202_siswaiuran_view->showPageHeader(); ?>
<?php
$t0202_siswaiuran_view->showMessage();
?>
<form name="ft0202_siswaiuranview" id="ft0202_siswaiuranview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0202_siswaiuran_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0202_siswaiuran_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0202_siswaiuran">
<input type="hidden" name="modal" value="<?php echo (int)$t0202_siswaiuran_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<tr id="r_tahunajaran_id">
		<td class="<?php echo $t0202_siswaiuran_view->TableLeftColumnClass ?>"><span id="elh_t0202_siswaiuran_tahunajaran_id"><?php echo $t0202_siswaiuran->tahunajaran_id->caption() ?></span></td>
		<td data-name="tahunajaran_id"<?php echo $t0202_siswaiuran->tahunajaran_id->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_tahunajaran_id">
<span<?php echo $t0202_siswaiuran->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
	<tr id="r_iuran_id">
		<td class="<?php echo $t0202_siswaiuran_view->TableLeftColumnClass ?>"><span id="elh_t0202_siswaiuran_iuran_id"><?php echo $t0202_siswaiuran->iuran_id->caption() ?></span></td>
		<td data-name="iuran_id"<?php echo $t0202_siswaiuran->iuran_id->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_iuran_id">
<span<?php echo $t0202_siswaiuran->iuran_id->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->iuran_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
	<tr id="r_Nilai">
		<td class="<?php echo $t0202_siswaiuran_view->TableLeftColumnClass ?>"><span id="elh_t0202_siswaiuran_Nilai"><?php echo $t0202_siswaiuran->Nilai->caption() ?></span></td>
		<td data-name="Nilai"<?php echo $t0202_siswaiuran->Nilai->cellAttributes() ?>>
<span id="el_t0202_siswaiuran_Nilai">
<span<?php echo $t0202_siswaiuran->Nilai->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->Nilai->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0202_siswaiuran_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0202_siswaiuran->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0202_siswaiuran_view->terminate();
?>