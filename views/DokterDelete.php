<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$DokterDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { dokter: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fdokterdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdokterdelete")
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
<form name="fdokterdelete" id="fdokterdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="dokter">
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
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <th class="<?= $Page->id_dokter->headerCellClass() ?>"><span id="elh_dokter_id_dokter" class="dokter_id_dokter"><?= $Page->id_dokter->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <th class="<?= $Page->nama->headerCellClass() ?>"><span id="elh_dokter_nama" class="dokter_nama"><?= $Page->nama->caption() ?></span></th>
<?php } ?>
<?php if ($Page->spesialisasi->Visible) { // spesialisasi ?>
        <th class="<?= $Page->spesialisasi->headerCellClass() ?>"><span id="elh_dokter_spesialisasi" class="dokter_spesialisasi"><?= $Page->spesialisasi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->no_lisensi->Visible) { // no_lisensi ?>
        <th class="<?= $Page->no_lisensi->headerCellClass() ?>"><span id="elh_dokter_no_lisensi" class="dokter_no_lisensi"><?= $Page->no_lisensi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tarif_konsultasi->Visible) { // tarif_konsultasi ?>
        <th class="<?= $Page->tarif_konsultasi->headerCellClass() ?>"><span id="elh_dokter_tarif_konsultasi" class="dokter_tarif_konsultasi"><?= $Page->tarif_konsultasi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->no_telp->Visible) { // no_telp ?>
        <th class="<?= $Page->no_telp->headerCellClass() ?>"><span id="elh_dokter_no_telp" class="dokter_no_telp"><?= $Page->no_telp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
        <th class="<?= $Page->email->headerCellClass() ?>"><span id="elh_dokter_email" class="dokter_email"><?= $Page->email->caption() ?></span></th>
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
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <td<?= $Page->id_dokter->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_dokter->viewAttributes() ?>>
<?= $Page->id_dokter->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <td<?= $Page->nama->cellAttributes() ?>>
<span id="">
<span<?= $Page->nama->viewAttributes() ?>>
<?= $Page->nama->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->spesialisasi->Visible) { // spesialisasi ?>
        <td<?= $Page->spesialisasi->cellAttributes() ?>>
<span id="">
<span<?= $Page->spesialisasi->viewAttributes() ?>>
<?= $Page->spesialisasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->no_lisensi->Visible) { // no_lisensi ?>
        <td<?= $Page->no_lisensi->cellAttributes() ?>>
<span id="">
<span<?= $Page->no_lisensi->viewAttributes() ?>>
<?= $Page->no_lisensi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tarif_konsultasi->Visible) { // tarif_konsultasi ?>
        <td<?= $Page->tarif_konsultasi->cellAttributes() ?>>
<span id="">
<span<?= $Page->tarif_konsultasi->viewAttributes() ?>>
<?= $Page->tarif_konsultasi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->no_telp->Visible) { // no_telp ?>
        <td<?= $Page->no_telp->cellAttributes() ?>>
<span id="">
<span<?= $Page->no_telp->viewAttributes() ?>>
<?= $Page->no_telp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
        <td<?= $Page->email->cellAttributes() ?>>
<span id="">
<span<?= $Page->email->viewAttributes() ?>>
<?= $Page->email->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fdokterdelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fdokterdelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
