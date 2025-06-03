<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$JadwalPraktekView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="view">
<?php if (!$Page->IsModal) { ?>
<?php if (!$Page->isExport()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<?php } ?>
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
<div class="col-md-12">
  <div class="card shadow-sm">
    <div class="card-header">
	  <h4 class="card-title"><?php echo Language()->phrase("ViewCaption"); ?></h4>
	  <div class="card-tools">
	  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
	  </button>
	  </div>
	  <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
<?php } ?>
<?php // End of Card view by Masino Sinaga, September 10, 2023 ?>
<form name="fjadwal_praktekview" id="fjadwal_praktekview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { jadwal_praktek: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fjadwal_praktekview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fjadwal_praktekview")
        .setPageId("view")
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="jadwal_praktek">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
    <tr id="r_id_jadwal"<?= $Page->id_jadwal->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_jadwal_praktek_id_jadwal"><?= $Page->id_jadwal->caption() ?></span></td>
        <td data-name="id_jadwal"<?= $Page->id_jadwal->cellAttributes() ?>>
<span id="el_jadwal_praktek_id_jadwal">
<span<?= $Page->id_jadwal->viewAttributes() ?>>
<?= $Page->id_jadwal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
    <tr id="r_id_dokter"<?= $Page->id_dokter->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_jadwal_praktek_id_dokter"><?= $Page->id_dokter->caption() ?></span></td>
        <td data-name="id_dokter"<?= $Page->id_dokter->cellAttributes() ?>>
<span id="el_jadwal_praktek_id_dokter">
<span<?= $Page->id_dokter->viewAttributes() ?>>
<?= $Page->id_dokter->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->hari->Visible) { // hari ?>
    <tr id="r_hari"<?= $Page->hari->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_jadwal_praktek_hari"><?= $Page->hari->caption() ?></span></td>
        <td data-name="hari"<?= $Page->hari->cellAttributes() ?>>
<span id="el_jadwal_praktek_hari">
<span<?= $Page->hari->viewAttributes() ?>>
<?= $Page->hari->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
    <tr id="r_jam_mulai"<?= $Page->jam_mulai->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_jadwal_praktek_jam_mulai"><?= $Page->jam_mulai->caption() ?></span></td>
        <td data-name="jam_mulai"<?= $Page->jam_mulai->cellAttributes() ?>>
<span id="el_jadwal_praktek_jam_mulai">
<span<?= $Page->jam_mulai->viewAttributes() ?>>
<?= $Page->jam_mulai->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
    <tr id="r_jam_selesai"<?= $Page->jam_selesai->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_jadwal_praktek_jam_selesai"><?= $Page->jam_selesai->caption() ?></span></td>
        <td data-name="jam_selesai"<?= $Page->jam_selesai->cellAttributes() ?>>
<span id="el_jadwal_praktek_jam_selesai">
<span<?= $Page->jam_selesai->viewAttributes() ?>>
<?= $Page->jam_selesai->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->kuota->Visible) { // kuota ?>
    <tr id="r_kuota"<?= $Page->kuota->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_jadwal_praktek_kuota"><?= $Page->kuota->caption() ?></span></td>
        <td data-name="kuota"<?= $Page->kuota->cellAttributes() ?>>
<span id="el_jadwal_praktek_kuota">
<span<?= $Page->kuota->viewAttributes() ?>>
<?= $Page->kuota->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
		</div>
     <!-- /.card-body -->
     </div>
  <!-- /.card -->
</div>
<?php } ?>
<?php // End of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
<?php if (!$Page->isExport()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<?php } ?>
</main>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fjadwal_praktekadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fjadwal_praktekadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fjadwal_praktekedit.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fjadwal_praktekedit").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
