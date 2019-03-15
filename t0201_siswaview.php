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
$t0201_siswa_view = new t0201_siswa_view();

// Run the page
$t0201_siswa_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0201_siswa_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0201_siswa->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0201_siswaview = currentForm = new ew.Form("ft0201_siswaview", "view");

// Form_CustomValidate event
ft0201_siswaview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0201_siswaview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0201_siswa->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0201_siswa_view->ExportOptions->render("body") ?>
<?php $t0201_siswa_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0201_siswa_view->showPageHeader(); ?>
<?php
$t0201_siswa_view->showMessage();
?>
<form name="ft0201_siswaview" id="ft0201_siswaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0201_siswa_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0201_siswa_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0201_siswa">
<input type="hidden" name="modal" value="<?php echo (int)$t0201_siswa_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0201_siswa->NIS->Visible) { // NIS ?>
	<tr id="r_NIS">
		<td class="<?php echo $t0201_siswa_view->TableLeftColumnClass ?>"><span id="elh_t0201_siswa_NIS"><?php echo $t0201_siswa->NIS->caption() ?></span></td>
		<td data-name="NIS"<?php echo $t0201_siswa->NIS->cellAttributes() ?>>
<span id="el_t0201_siswa_NIS">
<span<?php echo $t0201_siswa->NIS->viewAttributes() ?>>
<?php echo $t0201_siswa->NIS->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0201_siswa->Nama->Visible) { // Nama ?>
	<tr id="r_Nama">
		<td class="<?php echo $t0201_siswa_view->TableLeftColumnClass ?>"><span id="elh_t0201_siswa_Nama"><?php echo $t0201_siswa->Nama->caption() ?></span></td>
		<td data-name="Nama"<?php echo $t0201_siswa->Nama->cellAttributes() ?>>
<span id="el_t0201_siswa_Nama">
<span<?php echo $t0201_siswa->Nama->viewAttributes() ?>>
<?php echo $t0201_siswa->Nama->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("t0202_siswaiuran", explode(",", $t0201_siswa->getCurrentDetailTable())) && $t0202_siswaiuran->DetailView) {
?>
<?php if ($t0201_siswa->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("t0202_siswaiuran", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t0202_siswaiurangrid.php" ?>
<?php } ?>
</form>
<?php
$t0201_siswa_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0201_siswa->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0201_siswa_view->terminate();
?>