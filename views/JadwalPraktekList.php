<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$JadwalPraktekList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { jadwal_praktek: currentTable } });
var currentPageID = ew.PAGE_ID = "list";
var currentForm;
var <?= $Page->FormName ?>;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("<?= $Page->FormName ?>")
        .setPageId("list")
        .setSubmitWithFetch(<?= $Page->UseAjaxActions ? "true" : "false" ?>)
        .setFormKeyCountName("<?= $Page->getFormKeyCountName() ?>")
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<script<?= Nonce() ?>>
ew.PREVIEW_SELECTOR ??= ".ew-preview-btn";
ew.PREVIEW_TYPE ??= "row";
ew.PREVIEW_NAV_STYLE ??= "tabs"; // tabs/pills/underline
ew.PREVIEW_MODAL_CLASS ??= "modal modal-fullscreen-sm-down";
ew.PREVIEW_ROW ??= true;
ew.PREVIEW_SINGLE_ROW ??= false;
ew.PREVIEW || ew.ready("head", ew.PATH_BASE + "js/preview.min.js?v=25.10.0", "preview");
</script>
<script<?= Nonce() ?>>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
</div>
<?php } ?>
<?php if (!$Page->IsModal) { ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if (MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE == TRUE) { ?>
<main class="list<?= ($Page->TotalRecords == 0 && !$Page->isAdd()) ? "" : "" ?>">
<?php } else { ?>
<main class="list<?= ($Page->TotalRecords == 0 && !$Page->isAdd()) ? " ew-no-record" : "" ?>">
<?php } ?>
<div id="ew-header-options">
<?php $Page->HeaderOptions?->render("body") ?>
</div>
<div id="ew-list">
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?= $Page->isAddOrEdit() ? " ew-grid-add-edit" : "" ?> <?= $Page->TableGridClass ?>">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd() && !($Page->isGridEdit() && $Page->ModalGridEdit) && !$Page->isMultiEdit()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
</div>
<?php } ?>
<form name="<?= $Page->FormName ?>" id="<?= $Page->FormName ?>" class="ew-form ew-list-form" action="<?= $Page->PageAction ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="jadwal_praktek">
<?php if ($Page->IsModal) { ?>
<input type="hidden" name="modal" value="1">
<?php } ?>
<div id="gmp_jadwal_praktek" class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit() || $Page->isMultiEdit()) { ?>
<table id="tbl_jadwal_prakteklist" class="<?= $Page->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = RowType::HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <th data-name="id_jadwal" class="<?= $Page->id_jadwal->headerCellClass() ?>"><div id="elh_jadwal_praktek_id_jadwal" class="jadwal_praktek_id_jadwal"><?= $Page->renderFieldHeader($Page->id_jadwal) ?></div></th>
<?php } ?>
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <th data-name="id_dokter" class="<?= $Page->id_dokter->headerCellClass() ?>"><div id="elh_jadwal_praktek_id_dokter" class="jadwal_praktek_id_dokter"><?= $Page->renderFieldHeader($Page->id_dokter) ?></div></th>
<?php } ?>
<?php if ($Page->hari->Visible) { // hari ?>
        <th data-name="hari" class="<?= $Page->hari->headerCellClass() ?>"><div id="elh_jadwal_praktek_hari" class="jadwal_praktek_hari"><?= $Page->renderFieldHeader($Page->hari) ?></div></th>
<?php } ?>
<?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
        <th data-name="jam_mulai" class="<?= $Page->jam_mulai->headerCellClass() ?>"><div id="elh_jadwal_praktek_jam_mulai" class="jadwal_praktek_jam_mulai"><?= $Page->renderFieldHeader($Page->jam_mulai) ?></div></th>
<?php } ?>
<?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
        <th data-name="jam_selesai" class="<?= $Page->jam_selesai->headerCellClass() ?>"><div id="elh_jadwal_praktek_jam_selesai" class="jadwal_praktek_jam_selesai"><?= $Page->renderFieldHeader($Page->jam_selesai) ?></div></th>
<?php } ?>
<?php if ($Page->kuota->Visible) { // kuota ?>
        <th data-name="kuota" class="<?= $Page->kuota->headerCellClass() ?>"><div id="elh_jadwal_praktek_kuota" class="jadwal_praktek_kuota"><?= $Page->renderFieldHeader($Page->kuota) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Page->getPageNumber() ?>">
<?php
$Page->setupGrid();
$isInlineAddOrCopy = ($Page->isCopy() || $Page->isAdd());
while ($Page->RecordCount < $Page->StopRecord || $Page->RowIndex === '$rowindex$' || $isInlineAddOrCopy && $Page->RowIndex == 0) {
    if (
        $Page->CurrentRow !== false
        && $Page->RowIndex !== '$rowindex$'
        && (!$Page->isGridAdd() || $Page->CurrentMode == "copy")
        && (!($isInlineAddOrCopy && $Page->RowIndex == 0))
    ) {
        $Page->fetch();
    }
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->setupRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <td data-name="id_jadwal"<?= $Page->id_jadwal->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_id_jadwal" class="el_jadwal_praktek_id_jadwal">
<span<?= $Page->id_jadwal->viewAttributes() ?>>
<?= $Page->id_jadwal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <td data-name="id_dokter"<?= $Page->id_dokter->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_id_dokter" class="el_jadwal_praktek_id_dokter">
<span<?= $Page->id_dokter->viewAttributes() ?>>
<?= $Page->id_dokter->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->hari->Visible) { // hari ?>
        <td data-name="hari"<?= $Page->hari->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_hari" class="el_jadwal_praktek_hari">
<span<?= $Page->hari->viewAttributes() ?>>
<?= $Page->hari->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
        <td data-name="jam_mulai"<?= $Page->jam_mulai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_jam_mulai" class="el_jadwal_praktek_jam_mulai">
<span<?= $Page->jam_mulai->viewAttributes() ?>>
<?= $Page->jam_mulai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
        <td data-name="jam_selesai"<?= $Page->jam_selesai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_jam_selesai" class="el_jadwal_praktek_jam_selesai">
<span<?= $Page->jam_selesai->viewAttributes() ?>>
<?= $Page->jam_selesai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->kuota->Visible) { // kuota ?>
        <td data-name="kuota"<?= $Page->kuota->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_kuota" class="el_jadwal_praktek_kuota">
<span<?= $Page->kuota->viewAttributes() ?>>
<?= $Page->kuota->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }

    // Reset for template row
    if ($Page->RowIndex === '$rowindex$') {
        $Page->RowIndex = 0;
    }
    // Reset inline add/copy row
    if (($Page->isCopy() || $Page->isAdd()) && $Page->RowIndex == 0) {
        $Page->RowIndex = 1;
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php // Begin of Empty Table by Masino Sinaga, September 10, 2023 ?>
<?php } else { ?>
<?php if (MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE == TRUE) { // --- Begin of if MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE ?>
<table id="tbl_jadwal_prakteklist" class="<?= $Page->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = RowType::HEADER;

// Render list options
// $Page->renderListOptions(); // do not display for empty table, by Masino Sinaga, September 10, 2023

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <th data-name="id_jadwal" class="<?= $Page->id_jadwal->headerCellClass() ?>"><div id="elh_jadwal_praktek_id_jadwal" class="jadwal_praktek_id_jadwal"><?= $Page->renderFieldHeader($Page->id_jadwal) ?></div></th>
<?php } ?>
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <th data-name="id_dokter" class="<?= $Page->id_dokter->headerCellClass() ?>"><div id="elh_jadwal_praktek_id_dokter" class="jadwal_praktek_id_dokter"><?= $Page->renderFieldHeader($Page->id_dokter) ?></div></th>
<?php } ?>
<?php if ($Page->hari->Visible) { // hari ?>
        <th data-name="hari" class="<?= $Page->hari->headerCellClass() ?>"><div id="elh_jadwal_praktek_hari" class="jadwal_praktek_hari"><?= $Page->renderFieldHeader($Page->hari) ?></div></th>
<?php } ?>
<?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
        <th data-name="jam_mulai" class="<?= $Page->jam_mulai->headerCellClass() ?>"><div id="elh_jadwal_praktek_jam_mulai" class="jadwal_praktek_jam_mulai"><?= $Page->renderFieldHeader($Page->jam_mulai) ?></div></th>
<?php } ?>
<?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
        <th data-name="jam_selesai" class="<?= $Page->jam_selesai->headerCellClass() ?>"><div id="elh_jadwal_praktek_jam_selesai" class="jadwal_praktek_jam_selesai"><?= $Page->renderFieldHeader($Page->jam_selesai) ?></div></th>
<?php } ?>
<?php if ($Page->kuota->Visible) { // kuota ?>
        <th data-name="kuota" class="<?= $Page->kuota->headerCellClass() ?>"><div id="elh_jadwal_praktek_kuota" class="jadwal_praktek_kuota"><?= $Page->renderFieldHeader($Page->kuota) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Page->getPageNumber() ?>">
    <tr class="border-bottom-0" style="height:36px;">
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <td data-name="id_jadwal"<?= $Page->id_jadwal->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_id_jadwal" class="el_jadwal_praktek_id_jadwal">
<span<?= $Page->id_jadwal->viewAttributes() ?>>
<?= $Page->id_jadwal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <td data-name="id_dokter"<?= $Page->id_dokter->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_id_dokter" class="el_jadwal_praktek_id_dokter">
<span<?= $Page->id_dokter->viewAttributes() ?>>
<?= $Page->id_dokter->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->hari->Visible) { // hari ?>
        <td data-name="hari"<?= $Page->hari->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_hari" class="el_jadwal_praktek_hari">
<span<?= $Page->hari->viewAttributes() ?>>
<?= $Page->hari->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
        <td data-name="jam_mulai"<?= $Page->jam_mulai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_jam_mulai" class="el_jadwal_praktek_jam_mulai">
<span<?= $Page->jam_mulai->viewAttributes() ?>>
<?= $Page->jam_mulai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
        <td data-name="jam_selesai"<?= $Page->jam_selesai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_jam_selesai" class="el_jadwal_praktek_jam_selesai">
<span<?= $Page->jam_selesai->viewAttributes() ?>>
<?= $Page->jam_selesai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->kuota->Visible) { // kuota ?>
        <td data-name="kuota"<?= $Page->kuota->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_kuota" class="el_jadwal_praktek_kuota">
<span<?= $Page->kuota->viewAttributes() ?>>
<?= $Page->kuota->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
</tbody>
</table><!-- /.ew-table -->
<?php } // --- End of if MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE ?>
<?php // End of Empty Table by Masino Sinaga, September 10, 2023 ?>
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction && !$Page->UseAjaxActions) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close result set
$Page->Result?->free();
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd() && !($Page->isGridEdit() && $Page->ModalGridEdit) && !$Page->isMultiEdit()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<?php // Begin of Empty Table by Masino Sinaga, September 30, 2020 ?>
<?php if (MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE == TRUE) { ?>
<div class="card ew-card ew-grid<?= $Page->isAddOrEdit() ? " ew-grid-add-edit" : "" ?> <?= $Page->TableGridClass ?>">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd() && !($Page->isGridEdit() && $Page->ModalGridEdit) && !$Page->isMultiEdit()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
</div>
<?php } ?>
<form name="<?= $Page->FormName ?>" id="<?= $Page->FormName ?>" class="ew-form ew-list-form" action="<?= $Page->PageAction ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="jadwal_praktek">
<?php if ($Page->IsModal) { ?>
<input type="hidden" name="modal" value="1">
<?php } ?>
<div id="gmp_jadwal_praktek" class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit() || $Page->isMultiEdit()) { ?>
<table id="tbl_jadwal_prakteklist" class="<?= $Page->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = RowType::HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <th data-name="id_jadwal" class="<?= $Page->id_jadwal->headerCellClass() ?>"><div id="elh_jadwal_praktek_id_jadwal" class="jadwal_praktek_id_jadwal"><?= $Page->renderFieldHeader($Page->id_jadwal) ?></div></th>
<?php } ?>
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <th data-name="id_dokter" class="<?= $Page->id_dokter->headerCellClass() ?>"><div id="elh_jadwal_praktek_id_dokter" class="jadwal_praktek_id_dokter"><?= $Page->renderFieldHeader($Page->id_dokter) ?></div></th>
<?php } ?>
<?php if ($Page->hari->Visible) { // hari ?>
        <th data-name="hari" class="<?= $Page->hari->headerCellClass() ?>"><div id="elh_jadwal_praktek_hari" class="jadwal_praktek_hari"><?= $Page->renderFieldHeader($Page->hari) ?></div></th>
<?php } ?>
<?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
        <th data-name="jam_mulai" class="<?= $Page->jam_mulai->headerCellClass() ?>"><div id="elh_jadwal_praktek_jam_mulai" class="jadwal_praktek_jam_mulai"><?= $Page->renderFieldHeader($Page->jam_mulai) ?></div></th>
<?php } ?>
<?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
        <th data-name="jam_selesai" class="<?= $Page->jam_selesai->headerCellClass() ?>"><div id="elh_jadwal_praktek_jam_selesai" class="jadwal_praktek_jam_selesai"><?= $Page->renderFieldHeader($Page->jam_selesai) ?></div></th>
<?php } ?>
<?php if ($Page->kuota->Visible) { // kuota ?>
        <th data-name="kuota" class="<?= $Page->kuota->headerCellClass() ?>"><div id="elh_jadwal_praktek_kuota" class="jadwal_praktek_kuota"><?= $Page->renderFieldHeader($Page->kuota) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Page->getPageNumber() ?>">
<?php
$Page->setupGrid();
$isInlineAddOrCopy = ($Page->isCopy() || $Page->isAdd());
while ($Page->RecordCount < $Page->StopRecord || $Page->RowIndex === '$rowindex$' || $isInlineAddOrCopy && $Page->RowIndex == 0) {
    if (
        $Page->CurrentRow !== false
        && $Page->RowIndex !== '$rowindex$'
        && (!$Page->isGridAdd() || $Page->CurrentMode == "copy")
        && (!($isInlineAddOrCopy && $Page->RowIndex == 0))
    ) {
        $Page->fetch();
    }
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->setupRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <td data-name="id_jadwal"<?= $Page->id_jadwal->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_id_jadwal" class="el_jadwal_praktek_id_jadwal">
<span<?= $Page->id_jadwal->viewAttributes() ?>>
<?= $Page->id_jadwal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <td data-name="id_dokter"<?= $Page->id_dokter->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_id_dokter" class="el_jadwal_praktek_id_dokter">
<span<?= $Page->id_dokter->viewAttributes() ?>>
<?= $Page->id_dokter->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->hari->Visible) { // hari ?>
        <td data-name="hari"<?= $Page->hari->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_hari" class="el_jadwal_praktek_hari">
<span<?= $Page->hari->viewAttributes() ?>>
<?= $Page->hari->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
        <td data-name="jam_mulai"<?= $Page->jam_mulai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_jam_mulai" class="el_jadwal_praktek_jam_mulai">
<span<?= $Page->jam_mulai->viewAttributes() ?>>
<?= $Page->jam_mulai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
        <td data-name="jam_selesai"<?= $Page->jam_selesai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_jam_selesai" class="el_jadwal_praktek_jam_selesai">
<span<?= $Page->jam_selesai->viewAttributes() ?>>
<?= $Page->jam_selesai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->kuota->Visible) { // kuota ?>
        <td data-name="kuota"<?= $Page->kuota->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_kuota" class="el_jadwal_praktek_kuota">
<span<?= $Page->kuota->viewAttributes() ?>>
<?= $Page->kuota->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }

    // Reset for template row
    if ($Page->RowIndex === '$rowindex$') {
        $Page->RowIndex = 0;
    }
    // Reset inline add/copy row
    if (($Page->isCopy() || $Page->isAdd()) && $Page->RowIndex == 0) {
        $Page->RowIndex = 1;
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php // Begin of Empty Table by Masino Sinaga, September 10, 2023 ?>
<?php } else { ?>
<?php if (MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE == TRUE) { // --- Begin of if MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE ?>
<table id="tbl_jadwal_prakteklist" class="<?= $Page->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = RowType::HEADER;

// Render list options
// $Page->renderListOptions(); // do not display for empty table, by Masino Sinaga, September 10, 2023

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <th data-name="id_jadwal" class="<?= $Page->id_jadwal->headerCellClass() ?>"><div id="elh_jadwal_praktek_id_jadwal" class="jadwal_praktek_id_jadwal"><?= $Page->renderFieldHeader($Page->id_jadwal) ?></div></th>
<?php } ?>
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <th data-name="id_dokter" class="<?= $Page->id_dokter->headerCellClass() ?>"><div id="elh_jadwal_praktek_id_dokter" class="jadwal_praktek_id_dokter"><?= $Page->renderFieldHeader($Page->id_dokter) ?></div></th>
<?php } ?>
<?php if ($Page->hari->Visible) { // hari ?>
        <th data-name="hari" class="<?= $Page->hari->headerCellClass() ?>"><div id="elh_jadwal_praktek_hari" class="jadwal_praktek_hari"><?= $Page->renderFieldHeader($Page->hari) ?></div></th>
<?php } ?>
<?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
        <th data-name="jam_mulai" class="<?= $Page->jam_mulai->headerCellClass() ?>"><div id="elh_jadwal_praktek_jam_mulai" class="jadwal_praktek_jam_mulai"><?= $Page->renderFieldHeader($Page->jam_mulai) ?></div></th>
<?php } ?>
<?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
        <th data-name="jam_selesai" class="<?= $Page->jam_selesai->headerCellClass() ?>"><div id="elh_jadwal_praktek_jam_selesai" class="jadwal_praktek_jam_selesai"><?= $Page->renderFieldHeader($Page->jam_selesai) ?></div></th>
<?php } ?>
<?php if ($Page->kuota->Visible) { // kuota ?>
        <th data-name="kuota" class="<?= $Page->kuota->headerCellClass() ?>"><div id="elh_jadwal_praktek_kuota" class="jadwal_praktek_kuota"><?= $Page->renderFieldHeader($Page->kuota) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Page->getPageNumber() ?>">
    <tr class="border-bottom-0" style="height:36px;">
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
        <td data-name="id_jadwal"<?= $Page->id_jadwal->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_id_jadwal" class="el_jadwal_praktek_id_jadwal">
<span<?= $Page->id_jadwal->viewAttributes() ?>>
<?= $Page->id_jadwal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id_dokter->Visible) { // id_dokter ?>
        <td data-name="id_dokter"<?= $Page->id_dokter->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_id_dokter" class="el_jadwal_praktek_id_dokter">
<span<?= $Page->id_dokter->viewAttributes() ?>>
<?= $Page->id_dokter->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->hari->Visible) { // hari ?>
        <td data-name="hari"<?= $Page->hari->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_hari" class="el_jadwal_praktek_hari">
<span<?= $Page->hari->viewAttributes() ?>>
<?= $Page->hari->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
        <td data-name="jam_mulai"<?= $Page->jam_mulai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_jam_mulai" class="el_jadwal_praktek_jam_mulai">
<span<?= $Page->jam_mulai->viewAttributes() ?>>
<?= $Page->jam_mulai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
        <td data-name="jam_selesai"<?= $Page->jam_selesai->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_jam_selesai" class="el_jadwal_praktek_jam_selesai">
<span<?= $Page->jam_selesai->viewAttributes() ?>>
<?= $Page->jam_selesai->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->kuota->Visible) { // kuota ?>
        <td data-name="kuota"<?= $Page->kuota->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_jadwal_praktek_kuota" class="el_jadwal_praktek_kuota">
<span<?= $Page->kuota->viewAttributes() ?>>
<?= $Page->kuota->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
</tbody>
</table><!-- /.ew-table -->
<?php } // --- End of if MS_SHOW_EMPTY_TABLE_ON_LIST_PAGE ?>
<?php // End of Empty Table by Masino Sinaga, September 10, 2023 ?>
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction && !$Page->UseAjaxActions) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close result set
$Page->Result?->free();
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd() && !($Page->isGridEdit() && $Page->ModalGridEdit) && !$Page->isMultiEdit()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } else { ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } // end of Empty Table by Masino Sinaga, September 30, 2020 ?>
<?php } ?>
</div>
<div id="ew-footer-options">
<?php $Page->FooterOptions?->render("body") ?>
</div>
</main>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("head", function() {
	$(".ew-grid").css("width", "100%");
	$(".sidebar, .main-sidebar, .main-header, .header-navbar, .main-menu").on("mouseenter", function(event) {
		$(".ew-grid").css("width", "100%");
	});
	$(".sidebar, .main-sidebar, .main-header, .header-navbar, .main-menu").on("mouseover", function(event) {
		$(".ew-grid").css("width", "100%");
	});
	var cssTransitionEnd = 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend';
	$('.main-header').on(cssTransitionEnd, function(event) {
		$(".ew-grid").css("width", "100%");
	});
	$(document).on('resize', function() {
		if ($('.ew-grid').length > 0) {
			$(".ew-grid").css("width", "100%");
		}
	});
	$(".nav-item.d-block").on("click", function(event) {
		$(".ew-grid").css("width", "100%");
	});
});
</script>
<?php } ?>
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
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fjadwal_praktekupdate.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fjadwal_praktekupdate").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fjadwal_praktekdelete.validateFields()){ew.prompt({title: ew.language.phrase("MessageDeleteConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fjadwal_praktekdelete").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<?php if (!$Page->IsModal && !$Page->isExport() && CurrentPageID()=="list") { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('.ew-grid-save, .ew-grid-insert').on('click',function(){ew.prompt({title: ew.language.phrase("MessageSaveGridConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fjadwal_prakteklist").submit();});return false;});});
</script>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('.ew-inline-update').on('click',function(){ew.prompt({title: ew.language.phrase("MessageSaveGridConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fjadwal_prakteklist").submit();});return false;});});
</script>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('.ew-inline-insert').on('click',function(){ew.prompt({title: ew.language.phrase("MessageSaveGridConfirm"),icon:'question',showCancelButton:true},result=>{if(result) $("#fjadwal_prakteklist").submit();});return false;});});
</script>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){var gridchange=false;$('[data-table="jadwal_praktek"]').change(function(){	gridchange=true;});$('.ew-grid-cancel,.ew-inline-cancel').click(function(){if (gridchange==true){ew.prompt({title: ew.language.phrase("ConfirmCancel"),icon:'question',showCancelButton:true},result=>{if(result) window.location = "<?php echo str_replace('_', '', 'jadwal_prakteklist'); ?>";});return false;}});});
</script>
<?php } ?>
<?php if (!$jadwal_praktek->isExport()) { ?>
<script>
loadjs.ready("jscookie", function() {
	var expires = new Date(new Date().getTime() + 525600 * 60 * 1000); // expire in 525600 
	var SearchToggle = $('.ew-search-toggle');
	SearchToggle.on('click', function(event) { 
		event.preventDefault(); 
		if (SearchToggle.hasClass('active')) { 
			ew.Cookies.set(ew.PROJECT_NAME + "_jadwal_praktek_searchpanel", "notactive", {
			  sameSite: ew.COOKIE_SAMESITE,
			  secure: ew.COOKIE_SECURE
			}); 
		} else { 
			ew.Cookies.set(ew.PROJECT_NAME + "_jadwal_praktek_searchpanel", "active", {
			  sameSite: ew.COOKIE_SAMESITE,
			  secure: ew.COOKIE_SECURE
			}); 
		} 
	});
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("jadwal_praktek");
});
</script>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
