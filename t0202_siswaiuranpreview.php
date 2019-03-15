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
$t0202_siswaiuran_preview = new t0202_siswaiuran_preview();

// Run the page
$t0202_siswaiuran_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0202_siswaiuran_preview->Page_Render();
?>
<?php $t0202_siswaiuran_preview->showPageHeader(); ?>
<div class="card ew-grid t0202_siswaiuran"><!-- .card -->
<?php if ($t0202_siswaiuran_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$t0202_siswaiuran_preview->renderListOptions();

// Render list options (header, left)
$t0202_siswaiuran_preview->ListOptions->render("header", "left");
?>
<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<?php if ($t0202_siswaiuran->SortUrl($t0202_siswaiuran->tahunajaran_id) == "") { ?>
		<th class="<?php echo $t0202_siswaiuran->tahunajaran_id->headerCellClass() ?>"><?php echo $t0202_siswaiuran->tahunajaran_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t0202_siswaiuran->tahunajaran_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t0202_siswaiuran->tahunajaran_id->Name ?>" data-sort-order="<?php echo $t0202_siswaiuran_preview->SortField == $t0202_siswaiuran->tahunajaran_id->Name && $t0202_siswaiuran_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t0202_siswaiuran->tahunajaran_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t0202_siswaiuran_preview->SortField == $t0202_siswaiuran->tahunajaran_id->Name) { ?><?php if ($t0202_siswaiuran_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t0202_siswaiuran_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
	<?php if ($t0202_siswaiuran->SortUrl($t0202_siswaiuran->iuran_id) == "") { ?>
		<th class="<?php echo $t0202_siswaiuran->iuran_id->headerCellClass() ?>"><?php echo $t0202_siswaiuran->iuran_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t0202_siswaiuran->iuran_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t0202_siswaiuran->iuran_id->Name ?>" data-sort-order="<?php echo $t0202_siswaiuran_preview->SortField == $t0202_siswaiuran->iuran_id->Name && $t0202_siswaiuran_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t0202_siswaiuran->iuran_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t0202_siswaiuran_preview->SortField == $t0202_siswaiuran->iuran_id->Name) { ?><?php if ($t0202_siswaiuran_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t0202_siswaiuran_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
	<?php if ($t0202_siswaiuran->SortUrl($t0202_siswaiuran->Nilai) == "") { ?>
		<th class="<?php echo $t0202_siswaiuran->Nilai->headerCellClass() ?>"><?php echo $t0202_siswaiuran->Nilai->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t0202_siswaiuran->Nilai->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t0202_siswaiuran->Nilai->Name ?>" data-sort-order="<?php echo $t0202_siswaiuran_preview->SortField == $t0202_siswaiuran->Nilai->Name && $t0202_siswaiuran_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t0202_siswaiuran->Nilai->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t0202_siswaiuran_preview->SortField == $t0202_siswaiuran->Nilai->Name) { ?><?php if ($t0202_siswaiuran_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t0202_siswaiuran_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0202_siswaiuran_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$t0202_siswaiuran_preview->RecCount = 0;
$t0202_siswaiuran_preview->RowCnt = 0;
while ($t0202_siswaiuran_preview->Recordset && !$t0202_siswaiuran_preview->Recordset->EOF) {

	// Init row class and style
	$t0202_siswaiuran_preview->RecCount++;
	$t0202_siswaiuran_preview->RowCnt++;
	$t0202_siswaiuran_preview->CssStyle = "";
	$t0202_siswaiuran_preview->loadListRowValues($t0202_siswaiuran_preview->Recordset);

	// Render row
	$t0202_siswaiuran_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$t0202_siswaiuran_preview->resetAttributes();
	$t0202_siswaiuran_preview->renderListRow();

	// Render list options
	$t0202_siswaiuran_preview->renderListOptions();
?>
	<tr<?php echo $t0202_siswaiuran_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0202_siswaiuran_preview->ListOptions->render("body", "left", $t0202_siswaiuran_preview->RowCnt);
?>
<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<!-- tahunajaran_id -->
		<td<?php echo $t0202_siswaiuran->tahunajaran_id->cellAttributes() ?>>
<span<?php echo $t0202_siswaiuran->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->tahunajaran_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
		<!-- iuran_id -->
		<td<?php echo $t0202_siswaiuran->iuran_id->cellAttributes() ?>>
<span<?php echo $t0202_siswaiuran->iuran_id->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->iuran_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
		<!-- Nilai -->
		<td<?php echo $t0202_siswaiuran->Nilai->cellAttributes() ?>>
<span<?php echo $t0202_siswaiuran->Nilai->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->Nilai->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$t0202_siswaiuran_preview->ListOptions->render("body", "right", $t0202_siswaiuran_preview->RowCnt);
?>
	</tr>
<?php
	$t0202_siswaiuran_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($t0202_siswaiuran_preview->TotalRecs > 0) { ?>
<?php if (!isset($t0202_siswaiuran_preview->Pager)) $t0202_siswaiuran_preview->Pager = new PrevNextPager($t0202_siswaiuran_preview->StartRec, $t0202_siswaiuran_preview->DisplayRecs, $t0202_siswaiuran_preview->TotalRecs) ?>
<?php if ($t0202_siswaiuran_preview->Pager->RecordCount > 0 && $t0202_siswaiuran_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($t0202_siswaiuran_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $t0202_siswaiuran_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($t0202_siswaiuran_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $t0202_siswaiuran_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($t0202_siswaiuran_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $t0202_siswaiuran_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($t0202_siswaiuran_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $t0202_siswaiuran_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0202_siswaiuran_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0202_siswaiuran_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0202_siswaiuran_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($t0202_siswaiuran_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$t0202_siswaiuran_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($t0202_siswaiuran_preview->Recordset)
	$t0202_siswaiuran_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$t0202_siswaiuran_preview->terminate();
?>