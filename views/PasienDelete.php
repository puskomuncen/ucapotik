<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$PasienDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { pasien: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fpasiendelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpasiendelete")
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
<form name="fpasiendelete" id="fpasiendelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pasien">
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
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
        <th class="<?= $Page->id_pasien->headerCellClass() ?>"><span id="elh_pasien_id_pasien" class="pasien_id_pasien"><?= $Page->id_pasien->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
        <th class="<?= $Page->nama->headerCellClass() ?>"><span id="elh_pasien_nama" class="pasien_nama"><?= $Page->nama->caption() ?></span></th>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
        <th class="<?= $Page->alamat->headerCellClass() ?>"><span id="elh_pasien_alamat" class="pasien_alamat"><?= $Page->alamat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->no_telp->Visible) { // no_telp ?>
        <th class="<?= $Page->no_telp->headerCellClass() ?>"><span id="elh_pasien_no_telp" class="pasien_no_telp"><?= $Page->no_telp->caption() ?></span></th>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
        <th class="<?= $Page->email->headerCellClass() ?>"><span id="elh_pasien_email" class="pasien_email"><?= $Page->email->caption() ?></span></th>
<?php } ?>
<?php if ($Page->jenis_kelamin->Visible) { // jenis_kelamin ?>
        <th class="<?= $Page->jenis_kelamin->headerCellClass() ?>"><span id="elh_pasien_jenis_kelamin" class="pasien_jenis_kelamin"><?= $Page->jenis_kelamin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tanggal_lahir->Visible) { // tanggal_lahir ?>
        <th class="<?= $Page->tanggal_lahir->headerCellClass() ?>"><span id="elh_pasien_tanggal_lahir" class="pasien_tanggal_lahir"><?= $Page->tanggal_lahir->caption() ?></span></th>
<?php } ?>
<?php if ($Page->alergi->Visible) { // alergi ?>
        <th class="<?= $Page->alergi->headerCellClass() ?>"><span id="elh_pasien_alergi" class="pasien_alergi"><?= $Page->alergi->caption() ?></span></th>
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
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
        <td<?= $Page->id_pasien->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_pasien->viewAttributes() ?>>
<?= $Page->id_pasien->getViewValue() ?></span>
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
<?php if ($Page->alamat->Visible) { // alamat ?>
        <td<?= $Page->alamat->cellAttributes() ?>>
<span id="">
<span<?= $Page->alamat->viewAttributes() ?>>
<?= $Page->alamat->getViewValue() ?></span>
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
<?php if ($Page->jenis_kelamin->Visible) { // jenis_kelamin ?>
        <td<?= $Page->jenis_kelamin->cellAttributes() ?>>
<span id="">
<span<?= $Page->jenis_kelamin->viewAttributes() ?>>
<?= $Page->jenis_kelamin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tanggal_lahir->Visible) { // tanggal_lahir ?>
        <td<?= $Page->tanggal_lahir->cellAttributes() ?>>
<span id="">
<span<?= $Page->tanggal_lahir->viewAttributes() ?>>
<?= $Page->tanggal_lahir->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->alergi->Visible) { // alergi ?>
        <td<?= $Page->alergi->cellAttributes() ?>>
<span id="">
<span<?= $Page->alergi->viewAttributes() ?>>
<?= $Page->alergi->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fpasiendelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fpasiendelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
