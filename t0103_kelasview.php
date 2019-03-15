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
$t0103_kelas_view = new t0103_kelas_view();

// Run the page
$t0103_kelas_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0103_kelas_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0103_kelas->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0103_kelasview = currentForm = new ew.Form("ft0103_kelasview", "view");

// Form_CustomValidate event
ft0103_kelasview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0103_kelasview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0103_kelas->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0103_kelas_view->ExportOptions->render("body") ?>
<?php $t0103_kelas_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0103_kelas_view->showPageHeader(); ?>
<?php
$t0103_kelas_view->showMessage();
?>
<form name="ft0103_kelasview" id="ft0103_kelasview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0103_kelas_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0103_kelas_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0103_kelas">
<input type="hidden" name="modal" value="<?php echo (int)$t0103_kelas_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0103_kelas->Kelas->Visible) { // Kelas ?>
	<tr id="r_Kelas">
		<td class="<?php echo $t0103_kelas_view->TableLeftColumnClass ?>"><span id="elh_t0103_kelas_Kelas"><?php echo $t0103_kelas->Kelas->caption() ?></span></td>
		<td data-name="Kelas"<?php echo $t0103_kelas->Kelas->cellAttributes() ?>>
<span id="el_t0103_kelas_Kelas">
<span<?php echo $t0103_kelas->Kelas->viewAttributes() ?>>
<?php echo $t0103_kelas->Kelas->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0103_kelas_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0103_kelas->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0103_kelas_view->terminate();
?>