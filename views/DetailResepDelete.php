<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$DetailResepDelete = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { detail_resep: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fdetail_resepdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdetail_resepdelete")
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
<form name="fdetail_resepdelete" id="fdetail_resepdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="detail_resep">
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
<?php if ($Page->id_detail->Visible) { // id_detail ?>
        <th class="<?= $Page->id_detail->headerCellClass() ?>"><span id="elh_detail_resep_id_detail" class="detail_resep_id_detail"><?= $Page->id_detail->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_kunjungan->Visible) { // id_kunjungan ?>
        <th class="<?= $Page->id_kunjungan->headerCellClass() ?>"><span id="elh_detail_resep_id_kunjungan" class="detail_resep_id_kunjungan"><?= $Page->id_kunjungan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->id_obat->Visible) { // id_obat ?>
        <th class="<?= $Page->id_obat->headerCellClass() ?>"><span id="elh_detail_resep_id_obat" class="detail_resep_id_obat"><?= $Page->id_obat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->jumlah->Visible) { // jumlah ?>
        <th class="<?= $Page->jumlah->headerCellClass() ?>"><span id="elh_detail_resep_jumlah" class="detail_resep_jumlah"><?= $Page->jumlah->caption() ?></span></th>
<?php } ?>
<?php if ($Page->dosis->Visible) { // dosis ?>
        <th class="<?= $Page->dosis->headerCellClass() ?>"><span id="elh_detail_resep_dosis" class="detail_resep_dosis"><?= $Page->dosis->caption() ?></span></th>
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
<?php if ($Page->id_detail->Visible) { // id_detail ?>
        <td<?= $Page->id_detail->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_detail->viewAttributes() ?>>
<?= $Page->id_detail->getViewValue() ?></span>
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
<?php if ($Page->id_obat->Visible) { // id_obat ?>
        <td<?= $Page->id_obat->cellAttributes() ?>>
<span id="">
<span<?= $Page->id_obat->viewAttributes() ?>>
<?= $Page->id_obat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->jumlah->Visible) { // jumlah ?>
        <td<?= $Page->jumlah->cellAttributes() ?>>
<span id="">
<span<?= $Page->jumlah->viewAttributes() ?>>
<?= $Page->jumlah->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->dosis->Visible) { // dosis ?>
        <td<?= $Page->dosis->cellAttributes() ?>>
<span id="">
<span<?= $Page->dosis->viewAttributes() ?>>
<?= $Page->dosis->getViewValue() ?></span>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fdetail_resepdelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fdetail_resepdelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
