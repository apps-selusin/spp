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
WriteHeader(FALSE, "utf-8");

// Create page object
$t0105_daftarsiswadetail_preview = new t0105_daftarsiswadetail_preview();

// Run the page
$t0105_daftarsiswadetail_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0105_daftarsiswadetail_preview->Page_Render();
?>
<?php $t0105_daftarsiswadetail_preview->showPageHeader(); ?>
<div class="card ew-grid t0105_daftarsiswadetail"><!-- .card -->
<?php if ($t0105_daftarsiswadetail_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$t0105_daftarsiswadetail_preview->renderListOptions();

// Render list options (header, left)
$t0105_daftarsiswadetail_preview->ListOptions->render("header", "left");
?>
<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
	<?php if ($t0105_daftarsiswadetail->SortUrl($t0105_daftarsiswadetail->siswa_id) == "") { ?>
		<th class="<?php echo $t0105_daftarsiswadetail->siswa_id->headerCellClass() ?>"><?php echo $t0105_daftarsiswadetail->siswa_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t0105_daftarsiswadetail->siswa_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t0105_daftarsiswadetail->siswa_id->Name ?>" data-sort-order="<?php echo $t0105_daftarsiswadetail_preview->SortField == $t0105_daftarsiswadetail->siswa_id->Name && $t0105_daftarsiswadetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t0105_daftarsiswadetail->siswa_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t0105_daftarsiswadetail_preview->SortField == $t0105_daftarsiswadetail->siswa_id->Name) { ?><?php if ($t0105_daftarsiswadetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t0105_daftarsiswadetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0105_daftarsiswadetail_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$t0105_daftarsiswadetail_preview->RecCount = 0;
$t0105_daftarsiswadetail_preview->RowCnt = 0;
while ($t0105_daftarsiswadetail_preview->Recordset && !$t0105_daftarsiswadetail_preview->Recordset->EOF) {

	// Init row class and style
	$t0105_daftarsiswadetail_preview->RecCount++;
	$t0105_daftarsiswadetail_preview->RowCnt++;
	$t0105_daftarsiswadetail_preview->CssStyle = "";
	$t0105_daftarsiswadetail_preview->loadListRowValues($t0105_daftarsiswadetail_preview->Recordset);

	// Render row
	$t0105_daftarsiswadetail_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$t0105_daftarsiswadetail_preview->resetAttributes();
	$t0105_daftarsiswadetail_preview->renderListRow();

	// Render list options
	$t0105_daftarsiswadetail_preview->renderListOptions();
?>
	<tr<?php echo $t0105_daftarsiswadetail_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0105_daftarsiswadetail_preview->ListOptions->render("body", "left", $t0105_daftarsiswadetail_preview->RowCnt);
?>
<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
		<!-- siswa_id -->
		<td<?php echo $t0105_daftarsiswadetail->siswa_id->cellAttributes() ?>>
<span<?php echo $t0105_daftarsiswadetail->siswa_id->viewAttributes() ?>>
<?php echo $t0105_daftarsiswadetail->siswa_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$t0105_daftarsiswadetail_preview->ListOptions->render("body", "right", $t0105_daftarsiswadetail_preview->RowCnt);
?>
	</tr>
<?php
	$t0105_daftarsiswadetail_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($t0105_daftarsiswadetail_preview->TotalRecs > 0) { ?>
<?php if (!isset($t0105_daftarsiswadetail_preview->Pager)) $t0105_daftarsiswadetail_preview->Pager = new PrevNextPager($t0105_daftarsiswadetail_preview->StartRec, $t0105_daftarsiswadetail_preview->DisplayRecs, $t0105_daftarsiswadetail_preview->TotalRecs) ?>
<?php if ($t0105_daftarsiswadetail_preview->Pager->RecordCount > 0 && $t0105_daftarsiswadetail_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($t0105_daftarsiswadetail_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $t0105_daftarsiswadetail_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($t0105_daftarsiswadetail_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $t0105_daftarsiswadetail_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($t0105_daftarsiswadetail_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $t0105_daftarsiswadetail_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($t0105_daftarsiswadetail_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $t0105_daftarsiswadetail_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0105_daftarsiswadetail_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0105_daftarsiswadetail_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0105_daftarsiswadetail_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($t0105_daftarsiswadetail_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$t0105_daftarsiswadetail_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($t0105_daftarsiswadetail_preview->Recordset)
	$t0105_daftarsiswadetail_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$t0105_daftarsiswadetail_preview->terminate();
?>