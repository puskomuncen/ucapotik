<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$JadwalPraktekAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { jadwal_praktek: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fjadwal_praktekadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fjadwal_praktekadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["id_dokter", [fields.id_dokter.visible && fields.id_dokter.required ? ew.Validators.required(fields.id_dokter.caption) : null], fields.id_dokter.isInvalid],
            ["hari", [fields.hari.visible && fields.hari.required ? ew.Validators.required(fields.hari.caption) : null], fields.hari.isInvalid],
            ["jam_mulai", [fields.jam_mulai.visible && fields.jam_mulai.required ? ew.Validators.required(fields.jam_mulai.caption) : null, ew.Validators.time(fields.jam_mulai.clientFormatPattern)], fields.jam_mulai.isInvalid],
            ["jam_selesai", [fields.jam_selesai.visible && fields.jam_selesai.required ? ew.Validators.required(fields.jam_selesai.caption) : null, ew.Validators.time(fields.jam_selesai.clientFormatPattern)], fields.jam_selesai.isInvalid],
            ["kuota", [fields.kuota.visible && fields.kuota.required ? ew.Validators.required(fields.kuota.caption) : null, ew.Validators.integer], fields.kuota.isInvalid]
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
            "id_dokter": <?= $Page->id_dokter->toClientList($Page) ?>,
            "hari": <?= $Page->hari->toClientList($Page) ?>,
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php // Begin of Card view by Masino Sinaga, September 10, 2023 ?>
<?php if (!$Page->IsModal) { ?>
<div class="col-md-12">
  <div class="card shadow-sm">
    <div class="card-header">
	  <h4 class="card-title"><?php echo Language()->phrase("AddCaption"); ?></h4>
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
<form name="fjadwal_praktekadd" id="fjadwal_praktekadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="jadwal_praktek">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->id_dokter->Visible) { // id_dokter ?>
    <div id="r_id_dokter"<?= $Page->id_dokter->rowAttributes() ?>>
        <label id="elh_jadwal_praktek_id_dokter" for="x_id_dokter" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_dokter->caption() ?><?= $Page->id_dokter->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_dokter->cellAttributes() ?>>
<span id="el_jadwal_praktek_id_dokter">
    <select
        id="x_id_dokter"
        name="x_id_dokter"
        class="form-select ew-select<?= $Page->id_dokter->isInvalidClass() ?>"
        <?php if (!$Page->id_dokter->IsNativeSelect) { ?>
        data-select2-id="fjadwal_praktekadd_x_id_dokter"
        <?php } ?>
        data-table="jadwal_praktek"
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
loadjs.ready("fjadwal_praktekadd", function() {
    var options = { name: "x_id_dokter", selectId: "fjadwal_praktekadd_x_id_dokter" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fjadwal_praktekadd.lists.id_dokter?.lookupOptions.length) {
        options.data = { id: "x_id_dokter", form: "fjadwal_praktekadd" };
    } else {
        options.ajax = { id: "x_id_dokter", form: "fjadwal_praktekadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.jadwal_praktek.fields.id_dokter.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->hari->Visible) { // hari ?>
    <div id="r_hari"<?= $Page->hari->rowAttributes() ?>>
        <label id="elh_jadwal_praktek_hari" class="<?= $Page->LeftColumnClass ?>"><?= $Page->hari->caption() ?><?= $Page->hari->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->hari->cellAttributes() ?>>
<span id="el_jadwal_praktek_hari">
<template id="tp_x_hari">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="jadwal_praktek" data-field="x_hari" name="x_hari" id="x_hari"<?= $Page->hari->editAttributes() ?>>
        <label class="form-check-label"></label>
    </div>
</template>
<div id="dsl_x_hari" class="ew-item-list"></div>
<selection-list hidden
    id="x_hari"
    name="x_hari"
    value="<?= HtmlEncode($Page->hari->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_hari"
    data-target="dsl_x_hari"
    data-repeatcolumn="5"
    class="form-control<?= $Page->hari->isInvalidClass() ?>"
    data-table="jadwal_praktek"
    data-field="x_hari"
    data-value-separator="<?= $Page->hari->displayValueSeparatorAttribute() ?>"
    <?= $Page->hari->editAttributes() ?>></selection-list>
<?= $Page->hari->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->hari->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->jam_mulai->Visible) { // jam_mulai ?>
    <div id="r_jam_mulai"<?= $Page->jam_mulai->rowAttributes() ?>>
        <label id="elh_jadwal_praktek_jam_mulai" for="x_jam_mulai" class="<?= $Page->LeftColumnClass ?>"><?= $Page->jam_mulai->caption() ?><?= $Page->jam_mulai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->jam_mulai->cellAttributes() ?>>
<span id="el_jadwal_praktek_jam_mulai">
<input type="<?= $Page->jam_mulai->getInputTextType() ?>" name="x_jam_mulai" id="x_jam_mulai" data-table="jadwal_praktek" data-field="x_jam_mulai" value="<?= $Page->jam_mulai->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->jam_mulai->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->jam_mulai->formatPattern()) ?>"<?= $Page->jam_mulai->editAttributes() ?> aria-describedby="x_jam_mulai_help">
<?= $Page->jam_mulai->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->jam_mulai->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['fjadwal_praktekadd', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fjadwal_praktekadd", "x_jam_mulai", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->jam_selesai->Visible) { // jam_selesai ?>
    <div id="r_jam_selesai"<?= $Page->jam_selesai->rowAttributes() ?>>
        <label id="elh_jadwal_praktek_jam_selesai" for="x_jam_selesai" class="<?= $Page->LeftColumnClass ?>"><?= $Page->jam_selesai->caption() ?><?= $Page->jam_selesai->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->jam_selesai->cellAttributes() ?>>
<span id="el_jadwal_praktek_jam_selesai">
<input type="<?= $Page->jam_selesai->getInputTextType() ?>" name="x_jam_selesai" id="x_jam_selesai" data-table="jadwal_praktek" data-field="x_jam_selesai" value="<?= $Page->jam_selesai->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->jam_selesai->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->jam_selesai->formatPattern()) ?>"<?= $Page->jam_selesai->editAttributes() ?> aria-describedby="x_jam_selesai_help">
<?= $Page->jam_selesai->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->jam_selesai->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['fjadwal_praktekadd', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fjadwal_praktekadd", "x_jam_selesai", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->kuota->Visible) { // kuota ?>
    <div id="r_kuota"<?= $Page->kuota->rowAttributes() ?>>
        <label id="elh_jadwal_praktek_kuota" for="x_kuota" class="<?= $Page->LeftColumnClass ?>"><?= $Page->kuota->caption() ?><?= $Page->kuota->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->kuota->cellAttributes() ?>>
<span id="el_jadwal_praktek_kuota">
<input type="<?= $Page->kuota->getInputTextType() ?>" name="x_kuota" id="x_kuota" data-table="jadwal_praktek" data-field="x_kuota" value="<?= $Page->kuota->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->kuota->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->kuota->formatPattern()) ?>"<?= $Page->kuota->editAttributes() ?> aria-describedby="x_kuota_help">
<?= $Page->kuota->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->kuota->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['fjadwal_praktekadd', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fjadwal_praktekadd", "x_kuota", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fjadwal_praktekadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fjadwal_praktekadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
<?php
$Page->showPageFooter();
?>
<?php if (!$Page->IsModal && !$Page->isExport()) { ?>
<script>
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fjadwal_praktekadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fjadwal_praktekadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("jadwal_praktek");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fjadwal_praktekadd:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
