<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$TransaksiDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { transaksi: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var ftransaksidelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftransaksidelete")
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
<form name="ftransaksidelete" id="ftransaksidelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="transaksi">
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
<?php if ($Page->id_transaksi->Visible) { // id_transaksi ?>
        <th class="<?= $Page->id_transaksi->headerCellClass() ?>"><span id="elh_transaksi_id_transaksi" class="transaksi_id_transaksi"><?= $Page->id_transaksi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_kunjungan->Visible) { // id_kunjungan ?>
        <th class="<?= $Page->id_kunjungan->headerCellClass() ?>"><span id="elh_transaksi_id_kunjungan" class="transaksi_id_kunjungan"><?= $Page->id_kunjungan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->total_biaya->Visible) { // total_biaya ?>
        <th class="<?= $Page->total_biaya->headerCellClass() ?>"><span id="elh_transaksi_total_biaya" class="transaksi_total_biaya"><?= $Page->total_biaya->caption() ?></span></th>
<?php } ?>
<?php if ($Page->metode_pembayaran->Visible) { // metode_pembayaran ?>
        <th class="<?= $Page->metode_pembayaran->headerCellClass() ?>"><span id="elh_transaksi_metode_pembayaran" class="transaksi_metode_pembayaran"><?= $Page->metode_pembayaran->caption() ?></span></th>
<?php } ?>
<?php if ($Page->status_pembayaran->Visible) { // status_pembayaran ?>
        <th class="<?= $Page->status_pembayaran->headerCellClass() ?>"><span id="elh_transaksi_status_pembayaran" class="transaksi_status_pembayaran"><?= $Page->status_pembayaran->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tanggal_transaksi->Visible) { // tanggal_transaksi ?>
        <th class="<?= $Page->tanggal_transaksi->headerCellClass() ?>"><span id="elh_transaksi_tanggal_transaksi" class="transaksi_tanggal_transaksi"><?= $Page->tanggal_transaksi->caption() ?></span></th>
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
<?php if ($Page->id_transaksi->Visible) { // id_transaksi ?>
        <td<?= $Page->id_transaksi->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_transaksi->viewAttributes() ?>>
<?= $Page->id_transaksi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->id_kunjungan->Visible) { // id_kunjungan ?>
        <td<?= $Page->id_kunjungan->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_kunjungan->viewAttributes() ?>>
<?= $Page->id_kunjungan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->total_biaya->Visible) { // total_biaya ?>
        <td<?= $Page->total_biaya->cellAttributes() ?>>
<span id="">
<span<?= $Page->total_biaya->viewAttributes() ?>>
<?= $Page->total_biaya->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->metode_pembayaran->Visible) { // metode_pembayaran ?>
        <td<?= $Page->metode_pembayaran->cellAttributes() ?>>
<span id="">
<span<?= $Page->metode_pembayaran->viewAttributes() ?>>
<?= $Page->metode_pembayaran->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->status_pembayaran->Visible) { // status_pembayaran ?>
        <td<?= $Page->status_pembayaran->cellAttributes() ?>>
<span id="">
<span<?= $Page->status_pembayaran->viewAttributes() ?>>
<?= $Page->status_pembayaran->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tanggal_transaksi->Visible) { // tanggal_transaksi ?>
        <td<?= $Page->tanggal_transaksi->cellAttributes() ?>>
<span id="">
<span<?= $Page->tanggal_transaksi->viewAttributes() ?>>
<?= $Page->tanggal_transaksi->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(ftransaksidelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#ftransaksidelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
