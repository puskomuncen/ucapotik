<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$JadwalPraktekDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { jadwal_praktek: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fjadwal_praktekdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fjadwal_praktekdelete")
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
<form name="fjadwal_praktekdelete" id="fjadwal_praktekdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="jadwal_praktek">
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
<?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <th class="<?= $Page->id_jadwal->headerCellClass() ?>"><span id="elh_jadwal_praktek_id_jadwal" class="jadwal_praktek_id_jadwal"><?= $Page->id_jadwal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <th class="<?= $Page->id_dokter->headerCellClass() ?>"><span id="elh_jadwal_praktek_id_dokter" class="jadwal_praktek_id_dokter"><?= $Page->id_dokter->caption() ?></span></th>
<?php } ?>
<?php if ($Page->hari->Visible) { // hari ?>
        <th class="<?= $Page->hari->headerCellClass() ?>"><span id="elh_jadwal_praktek_hari" class="jadwal_praktek_hari"><?= $Page->hari->caption() ?></span></th>
<?php } ?>
<?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
        <th class="<?= $Page->jam_mulai->headerCellClass() ?>"><span id="elh_jadwal_praktek_jam_mulai" class="jadwal_praktek_jam_mulai"><?= $Page->jam_mulai->caption() ?></span></th>
<?php } ?>
<?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
        <th class="<?= $Page->jam_selesai->headerCellClass() ?>"><span id="elh_jadwal_praktek_jam_selesai" class="jadwal_praktek_jam_selesai"><?= $Page->jam_selesai->caption() ?></span></th>
<?php } ?>
<?php if ($Page->kuota->Visible) { // kuota ?>
        <th class="<?= $Page->kuota->headerCellClass() ?>"><span id="elh_jadwal_praktek_kuota" class="jadwal_praktek_kuota"><?= $Page->kuota->caption() ?></span></th>
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
<?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <td<?= $Page->id_jadwal->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_jadwal->viewAttributes() ?>>
<?= $Page->id_jadwal->getViewValue() ?></span>
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
<?php if ($Page->hari->Visible) { // hari ?>
        <td<?= $Page->hari->cellAttributes() ?>>
<span id="">
<span<?= $Page->hari->viewAttributes() ?>>
<?= $Page->hari->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
        <td<?= $Page->jam_mulai->cellAttributes() ?>>
<span id="">
<span<?= $Page->jam_mulai->viewAttributes() ?>>
<?= $Page->jam_mulai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
        <td<?= $Page->jam_selesai->cellAttributes() ?>>
<span id="">
<span<?= $Page->jam_selesai->viewAttributes() ?>>
<?= $Page->jam_selesai->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->kuota->Visible) { // kuota ?>
        <td<?= $Page->kuota->cellAttributes() ?>>
<span id="">
<span<?= $Page->kuota->viewAttributes() ?>>
<?= $Page->kuota->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fjadwal_praktekdelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fjadwal_praktekdelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
