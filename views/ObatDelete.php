<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$ObatDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { obat: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fobatdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fobatdelete")
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
<form name="fobatdelete" id="fobatdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="obat">
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
<?php if ($Page->id_obat->Visible) { // id_obat ?>
        <th class="<?= $Page->id_obat->headerCellClass() ?>"><span id="elh_obat_id_obat" class="obat_id_obat"><?= $Page->id_obat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama_obat->Visible) { // nama_obat ?>
        <th class="<?= $Page->nama_obat->headerCellClass() ?>"><span id="elh_obat_nama_obat" class="obat_nama_obat"><?= $Page->nama_obat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->kategori->Visible) { // kategori ?>
        <th class="<?= $Page->kategori->headerCellClass() ?>"><span id="elh_obat_kategori" class="obat_kategori"><?= $Page->kategori->caption() ?></span></th>
<?php } ?>
<?php if ($Page->harga->Visible) { // harga ?>
        <th class="<?= $Page->harga->headerCellClass() ?>"><span id="elh_obat_harga" class="obat_harga"><?= $Page->harga->caption() ?></span></th>
<?php } ?>
<?php if ($Page->stok->Visible) { // stok ?>
        <th class="<?= $Page->stok->headerCellClass() ?>"><span id="elh_obat_stok" class="obat_stok"><?= $Page->stok->caption() ?></span></th>
<?php } ?>
<?php if ($Page->expired_date->Visible) { // expired_date ?>
        <th class="<?= $Page->expired_date->headerCellClass() ?>"><span id="elh_obat_expired_date" class="obat_expired_date"><?= $Page->expired_date->caption() ?></span></th>
<?php } ?>
<?php if ($Page->satuan->Visible) { // satuan ?>
        <th class="<?= $Page->satuan->headerCellClass() ?>"><span id="elh_obat_satuan" class="obat_satuan"><?= $Page->satuan->caption() ?></span></th>
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
<?php if ($Page->id_obat->Visible) { // id_obat ?>
        <td<?= $Page->id_obat->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_obat->viewAttributes() ?>>
<?= $Page->id_obat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nama_obat->Visible) { // nama_obat ?>
        <td<?= $Page->nama_obat->cellAttributes() ?>>
<span id="">
<span<?= $Page->nama_obat->viewAttributes() ?>>
<?= $Page->nama_obat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->kategori->Visible) { // kategori ?>
        <td<?= $Page->kategori->cellAttributes() ?>>
<span id="">
<span<?= $Page->kategori->viewAttributes() ?>>
<?= $Page->kategori->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->harga->Visible) { // harga ?>
        <td<?= $Page->harga->cellAttributes() ?>>
<span id="">
<span<?= $Page->harga->viewAttributes() ?>>
<?= $Page->harga->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->stok->Visible) { // stok ?>
        <td<?= $Page->stok->cellAttributes() ?>>
<span id="">
<span<?= $Page->stok->viewAttributes() ?>>
<?= $Page->stok->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->expired_date->Visible) { // expired_date ?>
        <td<?= $Page->expired_date->cellAttributes() ?>>
<span id="">
<span<?= $Page->expired_date->viewAttributes() ?>>
<?= $Page->expired_date->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->satuan->Visible) { // satuan ?>
        <td<?= $Page->satuan->cellAttributes() ?>>
<span id="">
<span<?= $Page->satuan->viewAttributes() ?>>
<?= $Page->satuan->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fobatdelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fobatdelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
