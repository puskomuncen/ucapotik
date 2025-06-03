<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$PasienEdit = &$Page;
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
<form name="fpasienedit" id="fpasienedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { pasien: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fpasienedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fpasienedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id_pasien", [fields.id_pasien.visible && fields.id_pasien.required ? ew.Validators.required(fields.id_pasien.caption) : null], fields.id_pasien.isInvalid],
            ["nama", [fields.nama.visible && fields.nama.required ? ew.Validators.required(fields.nama.caption) : null], fields.nama.isInvalid],
            ["alamat", [fields.alamat.visible && fields.alamat.required ? ew.Validators.required(fields.alamat.caption) : null], fields.alamat.isInvalid],
            ["no_telp", [fields.no_telp.visible && fields.no_telp.required ? ew.Validators.required(fields.no_telp.caption) : null], fields.no_telp.isInvalid],
            ["email", [fields.email.visible && fields.email.required ? ew.Validators.required(fields.email.caption) : null], fields.email.isInvalid],
            ["jenis_kelamin", [fields.jenis_kelamin.visible && fields.jenis_kelamin.required ? ew.Validators.required(fields.jenis_kelamin.caption) : null], fields.jenis_kelamin.isInvalid],
            ["tanggal_lahir", [fields.tanggal_lahir.visible && fields.tanggal_lahir.required ? ew.Validators.required(fields.tanggal_lahir.caption) : null, ew.Validators.datetime(fields.tanggal_lahir.clientFormatPattern)], fields.tanggal_lahir.isInvalid],
            ["alergi", [fields.alergi.visible && fields.alergi.required ? ew.Validators.required(fields.alergi.caption) : null], fields.alergi.isInvalid],
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
            "jenis_kelamin": <?= $Page->jenis_kelamin->toClientList($Page) ?>,
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
<input type="hidden" name="t" value="pasien">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
    <div id="r_id_pasien"<?= $Page->id_pasien->rowAttributes() ?>>
        <label id="elh_pasien_id_pasien" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_pasien->caption() ?><?= $Page->id_pasien->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_pasien->cellAttributes() ?>>
<span id="el_pasien_id_pasien">
<span<?= $Page->id_pasien->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_pasien->getDisplayValue($Page->id_pasien->getEditValue()))) ?>"></span>
<input type="hidden" data-table="pasien" data-field="x_id_pasien" data-hidden="1" name="x_id_pasien" id="x_id_pasien" value="<?= HtmlEncode($Page->id_pasien->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nama->Visible) { // nama ?>
    <div id="r_nama"<?= $Page->nama->rowAttributes() ?>>
        <label id="elh_pasien_nama" for="x_nama" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama->caption() ?><?= $Page->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nama->cellAttributes() ?>>
<span id="el_pasien_nama">
<input type="<?= $Page->nama->getInputTextType() ?>" name="x_nama" id="x_nama" data-table="pasien" data-field="x_nama" value="<?= $Page->nama->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nama->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->nama->formatPattern()) ?>"<?= $Page->nama->editAttributes() ?> aria-describedby="x_nama_help">
<?= $Page->nama->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
    <div id="r_alamat"<?= $Page->alamat->rowAttributes() ?>>
        <label id="elh_pasien_alamat" for="x_alamat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->alamat->caption() ?><?= $Page->alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->alamat->cellAttributes() ?>>
<span id="el_pasien_alamat">
<input type="<?= $Page->alamat->getInputTextType() ?>" name="x_alamat" id="x_alamat" data-table="pasien" data-field="x_alamat" value="<?= $Page->alamat->getEditValue() ?>" size="30" maxlength="65535" placeholder="<?= HtmlEncode($Page->alamat->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->alamat->formatPattern()) ?>"<?= $Page->alamat->editAttributes() ?> aria-describedby="x_alamat_help">
<?= $Page->alamat->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->alamat->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->no_telp->Visible) { // no_telp ?>
    <div id="r_no_telp"<?= $Page->no_telp->rowAttributes() ?>>
        <label id="elh_pasien_no_telp" for="x_no_telp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->no_telp->caption() ?><?= $Page->no_telp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->no_telp->cellAttributes() ?>>
<span id="el_pasien_no_telp">
<input type="<?= $Page->no_telp->getInputTextType() ?>" name="x_no_telp" id="x_no_telp" data-table="pasien" data-field="x_no_telp" value="<?= $Page->no_telp->getEditValue() ?>" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->no_telp->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->no_telp->formatPattern()) ?>"<?= $Page->no_telp->editAttributes() ?> aria-describedby="x_no_telp_help">
<?= $Page->no_telp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->no_telp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
    <div id="r_email"<?= $Page->email->rowAttributes() ?>>
        <label id="elh_pasien_email" for="x_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->email->caption() ?><?= $Page->email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->email->cellAttributes() ?>>
<span id="el_pasien_email">
<input type="<?= $Page->email->getInputTextType() ?>" name="x_email" id="x_email" data-table="pasien" data-field="x_email" value="<?= $Page->email->getEditValue() ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->email->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->email->formatPattern()) ?>"<?= $Page->email->editAttributes() ?> aria-describedby="x_email_help">
<?= $Page->email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->jenis_kelamin->Visible) { // jenis_kelamin ?>
    <div id="r_jenis_kelamin"<?= $Page->jenis_kelamin->rowAttributes() ?>>
        <label id="elh_pasien_jenis_kelamin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->jenis_kelamin->caption() ?><?= $Page->jenis_kelamin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->jenis_kelamin->cellAttributes() ?>>
<span id="el_pasien_jenis_kelamin">
<template id="tp_x_jenis_kelamin">
    <div class="form-check">
        <input type="radio" class="form-check-input" data-table="pasien" data-field="x_jenis_kelamin" name="x_jenis_kelamin" id="x_jenis_kelamin"<?= $Page->jenis_kelamin->editAttributes() ?>>
        <label class="form-check-label"></label>
    </div>
</template>
<div id="dsl_x_jenis_kelamin" class="ew-item-list"></div>
<selection-list hidden
    id="x_jenis_kelamin"
    name="x_jenis_kelamin"
    value="<?= HtmlEncode($Page->jenis_kelamin->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_jenis_kelamin"
    data-target="dsl_x_jenis_kelamin"
    data-repeatcolumn="5"
    class="form-control<?= $Page->jenis_kelamin->isInvalidClass() ?>"
    data-table="pasien"
    data-field="x_jenis_kelamin"
    data-value-separator="<?= $Page->jenis_kelamin->displayValueSeparatorAttribute() ?>"
    <?= $Page->jenis_kelamin->editAttributes() ?>></selection-list>
<?= $Page->jenis_kelamin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->jenis_kelamin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tanggal_lahir->Visible) { // tanggal_lahir ?>
    <div id="r_tanggal_lahir"<?= $Page->tanggal_lahir->rowAttributes() ?>>
        <label id="elh_pasien_tanggal_lahir" for="x_tanggal_lahir" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tanggal_lahir->caption() ?><?= $Page->tanggal_lahir->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tanggal_lahir->cellAttributes() ?>>
<span id="el_pasien_tanggal_lahir">
<input type="<?= $Page->tanggal_lahir->getInputTextType() ?>" name="x_tanggal_lahir" id="x_tanggal_lahir" data-table="pasien" data-field="x_tanggal_lahir" value="<?= $Page->tanggal_lahir->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->tanggal_lahir->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->tanggal_lahir->formatPattern()) ?>"<?= $Page->tanggal_lahir->editAttributes() ?> aria-describedby="x_tanggal_lahir_help">
<?= $Page->tanggal_lahir->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tanggal_lahir->getErrorMessage() ?></div>
<?php if (!$Page->tanggal_lahir->ReadOnly && !$Page->tanggal_lahir->Disabled && !isset($Page->tanggal_lahir->EditAttrs["readonly"]) && !isset($Page->tanggal_lahir->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fpasienedit", "datetimepicker"], function () {
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
        "fpasienedit",
        "x_tanggal_lahir",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready(['fpasienedit', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fpasienedit", "x_tanggal_lahir", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->alergi->Visible) { // alergi ?>
    <div id="r_alergi"<?= $Page->alergi->rowAttributes() ?>>
        <label id="elh_pasien_alergi" for="x_alergi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->alergi->caption() ?><?= $Page->alergi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->alergi->cellAttributes() ?>>
<span id="el_pasien_alergi">
<input type="<?= $Page->alergi->getInputTextType() ?>" name="x_alergi" id="x_alergi" data-table="pasien" data-field="x_alergi" value="<?= $Page->alergi->getEditValue() ?>" size="30" maxlength="65535" placeholder="<?= HtmlEncode($Page->alergi->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->alergi->formatPattern()) ?>"<?= $Page->alergi->editAttributes() ?> aria-describedby="x_alergi_help">
<?= $Page->alergi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->alergi->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fpasienedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fpasienedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fpasienedit.validateFields()){ew.prompt({title: ew.language.phrase("MessageEditConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fpasienedit").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("pasien");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fpasienedit:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
