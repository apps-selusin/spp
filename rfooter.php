<?php
namespace PHPMaker2019\spp_prj;
?>
<?php if (@$ExportType == "") { ?>
<!-- popup filter -->
<div id="ew-popup-filter-dialog"></div>
<!-- export chart -->
<div id="ew-export-dialog"></div>
<!-- drill down -->
<?php if (@!$DrillDownInPanel) { ?>
<div id="ew-drilldown-panel"></div>
<?php } ?>
<script>

// User event handlers
jQuery.get(ew.RELATIVE_PATH + "phprptjs/rusrevt12.js");
</script>
<?php } ?>