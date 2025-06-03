<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$KunjunganDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { kunjungan: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fkunjungandelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fkunjungandelete")
        .setPageId("delete")
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fkunjungandelete" id="fkunjungandelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="kunjungan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid <?= $Page->TableGridClass ?>">
<div class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<table class="<?= $Page->TableClass ?>">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id_kunjungan->Visible) { // id_kunjungan ?>
        <th class="<?= $Page->id_kunjungan->headerCellClass() ?>"><span id="elh_kunjungan_id_kunjungan" class="kunjungan_id_kunjungan"><?= $Page->id_kunjungan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
        <th class="<?= $Page->id_pasien->headerCellClass() ?>"><span id="elh_kunjungan_id_pasien" class="kunjungan_id_pasien"><?= $Page->id_pasien->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <th class="<?= $Page->id_dokter->headerCellClass() ?>"><span id="elh_kunjungan_id_dokter" class="kunjungan_id_dokter"><?= $Page->id_dokter->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <th class="<?= $Page->id_jadwal->headerCellClass() ?>"><span id="elh_kunjungan_id_jadwal" class="kunjungan_id_jadwal"><?= $Page->id_jadwal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
        <th class="<?= $Page->tanggal->headerCellClass() ?>"><span id="elh_kunjungan_tanggal" class="kunjungan_tanggal"><?= $Page->tanggal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->diagnosa->Visible) { // diagnosa ?>
        <th class="<?= $Page->diagnosa->headerCellClass() ?>"><span id="elh_kunjungan_diagnosa" class="kunjungan_diagnosa"><?= $Page->diagnosa->caption() ?></span></th>
<?php } ?>
<?php if ($Page->resep->Visible) { // resep ?>
        <th class="<?= $Page->resep->headerCellClass() ?>"><span id="elh_kunjungan_resep" class="kunjungan_resep"><?= $Page->resep->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><span id="elh_kunjungan_status" class="kunjungan_status"><?= $Page->status->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while ($Page->fetch()) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = RowType::VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->CurrentRow);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id_kunjungan->Visible) { // id_kunjungan ?>
        <td<?= $Page->id_kunjungan->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_kunjungan->viewAttributes() ?>>
<?= $Page->id_kunjungan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
        <td<?= $Page->id_pasien->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_pasien->viewAttributes() ?>>
<?= $Page->id_pasien->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <td<?= $Page->id_dokter->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_dokter->viewAttributes() ?>>
<?= $Page->id_dokter->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <td<?= $Page->id_jadwal->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_jadwal->viewAttributes() ?>>
<?= $Page->id_jadwal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
        <td<?= $Page->tanggal->cellAttributes() ?>>
<span id="">
<span<?= $Page->tanggal->viewAttributes() ?>>
<?= $Page->tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->diagnosa->Visible) { // diagnosa ?>
        <td<?= $Page->diagnosa->cellAttributes() ?>>
<span id="">
<span<?= $Page->diagnosa->viewAttributes() ?>>
<?= $Page->diagnosa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->resep->Visible) { // resep ?>
        <td<?= $Page->resep->cellAttributes() ?>>
<span id="">
<span<?= $Page->resep->viewAttributes() ?>>
<?= $Page->resep->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <td<?= $Page->status->cellAttributes() ?>>
<span id="">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
}
$Page->Result?->free();
?>
</tbody>
</table>
</div>
</div>
<div class="ew-buttons ew-desktop-buttons">
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fkunjungandelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fkunjungandelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
