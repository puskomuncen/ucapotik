<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$KunjunganEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
<div class="col-md-12">
  <div class="card shadow-sm">
    <div class="card-header">
	  <h4 class="card-title"><?php echo Language()->phrase("EditCaption"); ?></h4>
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
<form name="fkunjunganedit" id="fkunjunganedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { kunjungan: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fkunjunganedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fkunjunganedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id_kunjungan", [fields.id_kunjungan.visible && fields.id_kunjungan.required ? ew.Validators.required(fields.id_kunjungan.caption) : null], fields.id_kunjungan.isInvalid],
            ["id_pasien", [fields.id_pasien.visible && fields.id_pasien.required ? ew.Validators.required(fields.id_pasien.caption) : null], fields.id_pasien.isInvalid],
            ["id_dokter", [fields.id_dokter.visible && fields.id_dokter.required ? ew.Validators.required(fields.id_dokter.caption) : null], fields.id_dokter.isInvalid],
            ["id_jadwal", [fields.id_jadwal.visible && fields.id_jadwal.required ? ew.Validators.required(fields.id_jadwal.caption) : null], fields.id_jadwal.isInvalid],
            ["tanggal", [fields.tanggal.visible && fields.tanggal.required ? ew.Validators.required(fields.tanggal.caption) : null, ew.Validators.datetime(fields.tanggal.clientFormatPattern)], fields.tanggal.isInvalid],
            ["diagnosa", [fields.diagnosa.visible && fields.diagnosa.required ? ew.Validators.required(fields.diagnosa.caption) : null], fields.diagnosa.isInvalid],
            ["resep", [fields.resep.visible && fields.resep.required ? ew.Validators.required(fields.resep.caption) : null], fields.resep.isInvalid],
            ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
            ["created_at", [fields.created_at.visible && fields.created_at.required ? ew.Validators.required(fields.created_at.caption) : null], fields.created_at.isInvalid]
        ])

        // Form_CustomValidate
        .setCustomValidate(
            function (fobj) { // DO NOT CHANGE THIS LINE! (except for adding "async" keyword)
                    // Your custom validation code in JAVASCRIPT here, return false if invalid.
                    return true;
                }
        )

        // Use JavaScript validation or not
        .setValidateRequired(ew.CLIENT_VALIDATE)

        // Dynamic selection lists
        .setLists({
            "id_pasien": <?= $Page->id_pasien->toClientList($Page) ?>,
            "id_dokter": <?= $Page->id_dokter->toClientList($Page) ?>,
            "id_jadwal": <?= $Page->id_jadwal->toClientList($Page) ?>,
            "status": <?= $Page->status->toClientList($Page) ?>,
        })
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
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="kunjungan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_kunjungan->Visible) { // id_kunjungan ?>
    <div id="r_id_kunjungan"<?= $Page->id_kunjungan->rowAttributes() ?>>
        <label id="elh_kunjungan_id_kunjungan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_kunjungan->caption() ?><?= $Page->id_kunjungan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_kunjungan->cellAttributes() ?>>
<span id="el_kunjungan_id_kunjungan">
<span<?= $Page->id_kunjungan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_kunjungan->getDisplayValue($Page->id_kunjungan->getEditValue()))) ?>"></span>
<input type="hidden" data-table="kunjungan" data-field="x_id_kunjungan" data-hidden="1" name="x_id_kunjungan" id="x_id_kunjungan" value="<?= HtmlEncode($Page->id_kunjungan->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
    <div id="r_id_pasien"<?= $Page->id_pasien->rowAttributes() ?>>
        <label id="elh_kunjungan_id_pasien" for="x_id_pasien" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_pasien->caption() ?><?= $Page->id_pasien->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_pasien->cellAttributes() ?>>
<span id="el_kunjungan_id_pasien">
    <select
        id="x_id_pasien"
        name="x_id_pasien"
        class="form-select ew-select<?= $Page->id_pasien->isInvalidClass() ?>"
        <?php if (!$Page->id_pasien->IsNativeSelect) { ?>
        data-select2-id="fkunjunganedit_x_id_pasien"
        <?php } ?>
        data-table="kunjungan"
        data-field="x_id_pasien"
        data-value-separator="<?= $Page->id_pasien->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_pasien->getPlaceHolder()) ?>"
        <?= $Page->id_pasien->editAttributes() ?>>
        <?= $Page->id_pasien->selectOptionListHtml("x_id_pasien") ?>
    </select>
    <?= $Page->id_pasien->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_pasien->getErrorMessage() ?></div>
<?= $Page->id_pasien->Lookup->getParamTag($Page, "p_x_id_pasien") ?>
<?php if (!$Page->id_pasien->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fkunjunganedit", function() {
    var options = { name: "x_id_pasien", selectId: "fkunjunganedit_x_id_pasien" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fkunjunganedit.lists.id_pasien?.lookupOptions.length) {
        options.data = { id: "x_id_pasien", form: "fkunjunganedit" };
    } else {
        options.ajax = { id: "x_id_pasien", form: "fkunjunganedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumInputLength = ew.selectMinimumInputLength;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.kunjungan.fields.id_pasien.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
    <div id="r_id_dokter"<?= $Page->id_dokter->rowAttributes() ?>>
        <label id="elh_kunjungan_id_dokter" for="x_id_dokter" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_dokter->caption() ?><?= $Page->id_dokter->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_dokter->cellAttributes() ?>>
<span id="el_kunjungan_id_dokter">
    <select
        id="x_id_dokter"
        name="x_id_dokter"
        class="form-select ew-select<?= $Page->id_dokter->isInvalidClass() ?>"
        <?php if (!$Page->id_dokter->IsNativeSelect) { ?>
        data-select2-id="fkunjunganedit_x_id_dokter"
        <?php } ?>
        data-table="kunjungan"
        data-field="x_id_dokter"
        data-value-separator="<?= $Page->id_dokter->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_dokter->getPlaceHolder()) ?>"
        <?= $Page->id_dokter->editAttributes() ?>>
        <?= $Page->id_dokter->selectOptionListHtml("x_id_dokter") ?>
    </select>
    <?= $Page->id_dokter->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_dokter->getErrorMessage() ?></div>
<?= $Page->id_dokter->Lookup->getParamTag($Page, "p_x_id_dokter") ?>
<?php if (!$Page->id_dokter->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fkunjunganedit", function() {
    var options = { name: "x_id_dokter", selectId: "fkunjunganedit_x_id_dokter" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fkunjunganedit.lists.id_dokter?.lookupOptions.length) {
        options.data = { id: "x_id_dokter", form: "fkunjunganedit" };
    } else {
        options.ajax = { id: "x_id_dokter", form: "fkunjunganedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.kunjungan.fields.id_dokter.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_jadwal->Visible) { // id_jadwal ?>
    <div id="r_id_jadwal"<?= $Page->id_jadwal->rowAttributes() ?>>
        <label id="elh_kunjungan_id_jadwal" for="x_id_jadwal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_jadwal->caption() ?><?= $Page->id_jadwal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_jadwal->cellAttributes() ?>>
<span id="el_kunjungan_id_jadwal">
    <select
        id="x_id_jadwal"
        name="x_id_jadwal"
        class="form-select ew-select<?= $Page->id_jadwal->isInvalidClass() ?>"
        <?php if (!$Page->id_jadwal->IsNativeSelect) { ?>
        data-select2-id="fkunjunganedit_x_id_jadwal"
        <?php } ?>
        data-table="kunjungan"
        data-field="x_id_jadwal"
        data-value-separator="<?= $Page->id_jadwal->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_jadwal->getPlaceHolder()) ?>"
        <?= $Page->id_jadwal->editAttributes() ?>>
        <?= $Page->id_jadwal->selectOptionListHtml("x_id_jadwal") ?>
    </select>
    <?= $Page->id_jadwal->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_jadwal->getErrorMessage() ?></div>
<?= $Page->id_jadwal->Lookup->getParamTag($Page, "p_x_id_jadwal") ?>
<?php if (!$Page->id_jadwal->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fkunjunganedit", function() {
    var options = { name: "x_id_jadwal", selectId: "fkunjunganedit_x_id_jadwal" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fkunjunganedit.lists.id_jadwal?.lookupOptions.length) {
        options.data = { id: "x_id_jadwal", form: "fkunjunganedit" };
    } else {
        options.ajax = { id: "x_id_jadwal", form: "fkunjunganedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.kunjungan.fields.id_jadwal.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
    <div id="r_tanggal"<?= $Page->tanggal->rowAttributes() ?>>
        <label id="elh_kunjungan_tanggal" for="x_tanggal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tanggal->caption() ?><?= $Page->tanggal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tanggal->cellAttributes() ?>>
<span id="el_kunjungan_tanggal">
<input type="<?= $Page->tanggal->getInputTextType() ?>" name="x_tanggal" id="x_tanggal" data-table="kunjungan" data-field="x_tanggal" value="<?= $Page->tanggal->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->tanggal->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->tanggal->formatPattern()) ?>"<?= $Page->tanggal->editAttributes() ?> aria-describedby="x_tanggal_help">
<?= $Page->tanggal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tanggal->getErrorMessage() ?></div>
<?php if (!$Page->tanggal->ReadOnly && !$Page->tanggal->Disabled && !isset($Page->tanggal->EditAttrs["readonly"]) && !isset($Page->tanggal->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fkunjunganedit", "datetimepicker"], function () {
    let format = "<?= DateFormat(0) ?>",
        options = {
            localization: {
                locale: ew.LANGUAGE_ID + "-u-nu-" + ew.getNumberingSystem(),
                hourCycle: format.match(/H/) ? "h24" : "h12",
                format,
                ...ew.language.phrase("datetimepicker")
            },
            display: {
                icons: {
                    previous: ew.IS_RTL ? "fa-solid fa-chevron-right" : "fa-solid fa-chevron-left",
                    next: ew.IS_RTL ? "fa-solid fa-chevron-left" : "fa-solid fa-chevron-right"
                },
                components: {
                    clock: !!format.match(/h/i) || !!format.match(/m/) || !!format.match(/s/i),
                    hours: !!format.match(/h/i),
                    minutes: !!format.match(/m/),
                    seconds: !!format.match(/s/i)
                },
                theme: ew.getPreferredTheme()
            }
        };
    ew.createDateTimePicker(
        "fkunjunganedit",
        "x_tanggal",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready(['fkunjunganedit', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fkunjunganedit", "x_tanggal", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->diagnosa->Visible) { // diagnosa ?>
    <div id="r_diagnosa"<?= $Page->diagnosa->rowAttributes() ?>>
        <label id="elh_kunjungan_diagnosa" for="x_diagnosa" class="<?= $Page->LeftColumnClass ?>"><?= $Page->diagnosa->caption() ?><?= $Page->diagnosa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->diagnosa->cellAttributes() ?>>
<span id="el_kunjungan_diagnosa">
<input type="<?= $Page->diagnosa->getInputTextType() ?>" name="x_diagnosa" id="x_diagnosa" data-table="kunjungan" data-field="x_diagnosa" value="<?= $Page->diagnosa->getEditValue() ?>" size="30" maxlength="65535" placeholder="<?= HtmlEncode($Page->diagnosa->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->diagnosa->formatPattern()) ?>"<?= $Page->diagnosa->editAttributes() ?> aria-describedby="x_diagnosa_help">
<?= $Page->diagnosa->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->diagnosa->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->resep->Visible) { // resep ?>
    <div id="r_resep"<?= $Page->resep->rowAttributes() ?>>
        <label id="elh_kunjungan_resep" for="x_resep" class="<?= $Page->LeftColumnClass ?>"><?= $Page->resep->caption() ?><?= $Page->resep->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->resep->cellAttributes() ?>>
<span id="el_kunjungan_resep">
<input type="<?= $Page->resep->getInputTextType() ?>" name="x_resep" id="x_resep" data-table="kunjungan" data-field="x_resep" value="<?= $Page->resep->getEditValue() ?>" size="30" maxlength="65535" placeholder="<?= HtmlEncode($Page->resep->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->resep->formatPattern()) ?>"<?= $Page->resep->editAttributes() ?> aria-describedby="x_resep_help">
<?= $Page->resep->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->resep->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status"<?= $Page->status->rowAttributes() ?>>
        <label id="elh_kunjungan_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->status->cellAttributes() ?>>
<span id="el_kunjungan_status">
<template id="tp_x_status">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="kunjungan" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
        <label class="form-check-label"></label>
    </div>
</template>
<div id="dsl_x_status" class="ew-item-list"></div>
<selection-list hidden
    id="x_status"
    name="x_status"
    value="<?= HtmlEncode($Page->status->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_status"
    data-target="dsl_x_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="kunjungan"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>></selection-list>
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fkunjunganedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fkunjunganedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
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
</main>
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fkunjunganedit.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fkunjunganedit").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("kunjungan");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fkunjunganedit:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
