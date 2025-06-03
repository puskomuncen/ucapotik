<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$TransaksiEdit = &$Page;
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
<form name="ftransaksiedit" id="ftransaksiedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { transaksi: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var ftransaksiedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftransaksiedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id_transaksi", [fields.id_transaksi.visible && fields.id_transaksi.required ? ew.Validators.required(fields.id_transaksi.caption) : null], fields.id_transaksi.isInvalid],
            ["id_kunjungan", [fields.id_kunjungan.visible && fields.id_kunjungan.required ? ew.Validators.required(fields.id_kunjungan.caption) : null], fields.id_kunjungan.isInvalid],
            ["total_biaya", [fields.total_biaya.visible && fields.total_biaya.required ? ew.Validators.required(fields.total_biaya.caption) : null, ew.Validators.float], fields.total_biaya.isInvalid],
            ["metode_pembayaran", [fields.metode_pembayaran.visible && fields.metode_pembayaran.required ? ew.Validators.required(fields.metode_pembayaran.caption) : null], fields.metode_pembayaran.isInvalid],
            ["status_pembayaran", [fields.status_pembayaran.visible && fields.status_pembayaran.required ? ew.Validators.required(fields.status_pembayaran.caption) : null], fields.status_pembayaran.isInvalid],
            ["tanggal_transaksi", [fields.tanggal_transaksi.visible && fields.tanggal_transaksi.required ? ew.Validators.required(fields.tanggal_transaksi.caption) : null, ew.Validators.datetime(fields.tanggal_transaksi.clientFormatPattern)], fields.tanggal_transaksi.isInvalid]
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
            "id_kunjungan": <?= $Page->id_kunjungan->toClientList($Page) ?>,
            "metode_pembayaran": <?= $Page->metode_pembayaran->toClientList($Page) ?>,
            "status_pembayaran": <?= $Page->status_pembayaran->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="transaksi">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_transaksi->Visible) { // id_transaksi ?>
    <div id="r_id_transaksi"<?= $Page->id_transaksi->rowAttributes() ?>>
        <label id="elh_transaksi_id_transaksi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_transaksi->caption() ?><?= $Page->id_transaksi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_transaksi->cellAttributes() ?>>
<span id="el_transaksi_id_transaksi">
<span<?= $Page->id_transaksi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_transaksi->getDisplayValue($Page->id_transaksi->getEditValue()))) ?>"></span>
<input type="hidden" data-table="transaksi" data-field="x_id_transaksi" data-hidden="1" name="x_id_transaksi" id="x_id_transaksi" value="<?= HtmlEncode($Page->id_transaksi->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_kunjungan->Visible) { // id_kunjungan ?>
    <div id="r_id_kunjungan"<?= $Page->id_kunjungan->rowAttributes() ?>>
        <label id="elh_transaksi_id_kunjungan" for="x_id_kunjungan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_kunjungan->caption() ?><?= $Page->id_kunjungan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_kunjungan->cellAttributes() ?>>
<span id="el_transaksi_id_kunjungan">
    <select
        id="x_id_kunjungan"
        name="x_id_kunjungan"
        class="form-select ew-select<?= $Page->id_kunjungan->isInvalidClass() ?>"
        <?php if (!$Page->id_kunjungan->IsNativeSelect) { ?>
        data-select2-id="ftransaksiedit_x_id_kunjungan"
        <?php } ?>
        data-table="transaksi"
        data-field="x_id_kunjungan"
        data-value-separator="<?= $Page->id_kunjungan->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_kunjungan->getPlaceHolder()) ?>"
        <?= $Page->id_kunjungan->editAttributes() ?>>
        <?= $Page->id_kunjungan->selectOptionListHtml("x_id_kunjungan") ?>
    </select>
    <?= $Page->id_kunjungan->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_kunjungan->getErrorMessage() ?></div>
<?= $Page->id_kunjungan->Lookup->getParamTag($Page, "p_x_id_kunjungan") ?>
<?php if (!$Page->id_kunjungan->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("ftransaksiedit", function() {
    var options = { name: "x_id_kunjungan", selectId: "ftransaksiedit_x_id_kunjungan" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (ftransaksiedit.lists.id_kunjungan?.lookupOptions.length) {
        options.data = { id: "x_id_kunjungan", form: "ftransaksiedit" };
    } else {
        options.ajax = { id: "x_id_kunjungan", form: "ftransaksiedit", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.transaksi.fields.id_kunjungan.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->total_biaya->Visible) { // total_biaya ?>
    <div id="r_total_biaya"<?= $Page->total_biaya->rowAttributes() ?>>
        <label id="elh_transaksi_total_biaya" for="x_total_biaya" class="<?= $Page->LeftColumnClass ?>"><?= $Page->total_biaya->caption() ?><?= $Page->total_biaya->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->total_biaya->cellAttributes() ?>>
<span id="el_transaksi_total_biaya">
<input type="<?= $Page->total_biaya->getInputTextType() ?>" name="x_total_biaya" id="x_total_biaya" data-table="transaksi" data-field="x_total_biaya" value="<?= $Page->total_biaya->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->total_biaya->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->total_biaya->formatPattern()) ?>"<?= $Page->total_biaya->editAttributes() ?> aria-describedby="x_total_biaya_help">
<?= $Page->total_biaya->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->total_biaya->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['ftransaksiedit', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("ftransaksiedit", "x_total_biaya", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->metode_pembayaran->Visible) { // metode_pembayaran ?>
    <div id="r_metode_pembayaran"<?= $Page->metode_pembayaran->rowAttributes() ?>>
        <label id="elh_transaksi_metode_pembayaran" class="<?= $Page->LeftColumnClass ?>"><?= $Page->metode_pembayaran->caption() ?><?= $Page->metode_pembayaran->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->metode_pembayaran->cellAttributes() ?>>
<span id="el_transaksi_metode_pembayaran">
<template id="tp_x_metode_pembayaran">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="transaksi" data-field="x_metode_pembayaran" name="x_metode_pembayaran" id="x_metode_pembayaran"<?= $Page->metode_pembayaran->editAttributes() ?>>
        <label class="form-check-label"></label>
    </div>
</template>
<div id="dsl_x_metode_pembayaran" class="ew-item-list"></div>
<selection-list hidden
    id="x_metode_pembayaran"
    name="x_metode_pembayaran"
    value="<?= HtmlEncode($Page->metode_pembayaran->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_metode_pembayaran"
    data-target="dsl_x_metode_pembayaran"
    data-repeatcolumn="5"
    class="form-control<?= $Page->metode_pembayaran->isInvalidClass() ?>"
    data-table="transaksi"
    data-field="x_metode_pembayaran"
    data-value-separator="<?= $Page->metode_pembayaran->displayValueSeparatorAttribute() ?>"
    <?= $Page->metode_pembayaran->editAttributes() ?>></selection-list>
<?= $Page->metode_pembayaran->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->metode_pembayaran->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status_pembayaran->Visible) { // status_pembayaran ?>
    <div id="r_status_pembayaran"<?= $Page->status_pembayaran->rowAttributes() ?>>
        <label id="elh_transaksi_status_pembayaran" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status_pembayaran->caption() ?><?= $Page->status_pembayaran->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->status_pembayaran->cellAttributes() ?>>
<span id="el_transaksi_status_pembayaran">
<template id="tp_x_status_pembayaran">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="transaksi" data-field="x_status_pembayaran" name="x_status_pembayaran" id="x_status_pembayaran"<?= $Page->status_pembayaran->editAttributes() ?>>
        <label class="form-check-label"></label>
    </div>
</template>
<div id="dsl_x_status_pembayaran" class="ew-item-list"></div>
<selection-list hidden
    id="x_status_pembayaran"
    name="x_status_pembayaran"
    value="<?= HtmlEncode($Page->status_pembayaran->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_status_pembayaran"
    data-target="dsl_x_status_pembayaran"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status_pembayaran->isInvalidClass() ?>"
    data-table="transaksi"
    data-field="x_status_pembayaran"
    data-value-separator="<?= $Page->status_pembayaran->displayValueSeparatorAttribute() ?>"
    <?= $Page->status_pembayaran->editAttributes() ?>></selection-list>
<?= $Page->status_pembayaran->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status_pembayaran->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tanggal_transaksi->Visible) { // tanggal_transaksi ?>
    <div id="r_tanggal_transaksi"<?= $Page->tanggal_transaksi->rowAttributes() ?>>
        <label id="elh_transaksi_tanggal_transaksi" for="x_tanggal_transaksi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tanggal_transaksi->caption() ?><?= $Page->tanggal_transaksi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tanggal_transaksi->cellAttributes() ?>>
<span id="el_transaksi_tanggal_transaksi">
<input type="<?= $Page->tanggal_transaksi->getInputTextType() ?>" name="x_tanggal_transaksi" id="x_tanggal_transaksi" data-table="transaksi" data-field="x_tanggal_transaksi" value="<?= $Page->tanggal_transaksi->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->tanggal_transaksi->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->tanggal_transaksi->formatPattern()) ?>"<?= $Page->tanggal_transaksi->editAttributes() ?> aria-describedby="x_tanggal_transaksi_help">
<?= $Page->tanggal_transaksi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tanggal_transaksi->getErrorMessage() ?></div>
<?php if (!$Page->tanggal_transaksi->ReadOnly && !$Page->tanggal_transaksi->Disabled && !isset($Page->tanggal_transaksi->EditAttrs["readonly"]) && !isset($Page->tanggal_transaksi->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["ftransaksiedit", "datetimepicker"], function () {
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
        "ftransaksiedit",
        "x_tanggal_transaksi",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready(['ftransaksiedit', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("ftransaksiedit", "x_tanggal_transaksi", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="ftransaksiedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="ftransaksiedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(ftransaksiedit.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#ftransaksiedit").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("transaksi");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#ftransaksiedit:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
