<?php
namespace PHPMaker2019\spp_prj;
?>
<?php if ($t0104_daftarsiswamaster->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t0104_daftarsiswamastermaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t0104_daftarsiswamaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<tr id="r_tahunajaran_id">
			<td class="<?php echo $t0104_daftarsiswamaster->TableLeftColumnClass ?>"><?php echo $t0104_daftarsiswamaster->tahunajaran_id->caption() ?></td>
			<td<?php echo $t0104_daftarsiswamaster->tahunajaran_id->cellAttributes() ?>>
<span id="el_t0104_daftarsiswamaster_tahunajaran_id">
<span<?php echo $t0104_daftarsiswamaster->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->sekolah_id->Visible) { // sekolah_id ?>
		<tr id="r_sekolah_id">
			<td class="<?php echo $t0104_daftarsiswamaster->TableLeftColumnClass ?>"><?php echo $t0104_daftarsiswamaster->sekolah_id->caption() ?></td>
			<td<?php echo $t0104_daftarsiswamaster->sekolah_id->cellAttributes() ?>>
<span id="el_t0104_daftarsiswamaster_sekolah_id">
<span<?php echo $t0104_daftarsiswamaster->sekolah_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->sekolah_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->kelas_id->Visible) { // kelas_id ?>
		<tr id="r_kelas_id">
			<td class="<?php echo $t0104_daftarsiswamaster->TableLeftColumnClass ?>"><?php echo $t0104_daftarsiswamaster->kelas_id->caption() ?></td>
			<td<?php echo $t0104_daftarsiswamaster->kelas_id->cellAttributes() ?>>
<span id="el_t0104_daftarsiswamaster_kelas_id">
<span<?php echo $t0104_daftarsiswamaster->kelas_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->kelas_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>