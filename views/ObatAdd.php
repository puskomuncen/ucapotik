<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$ObatAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { obat: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fobatadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fobatadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["nama_obat", [fields.nama_obat.visible && fields.nama_obat.required ? ew.Validators.required(fields.nama_obat.caption) : null], fields.nama_obat.isInvalid],
            ["kategori", [fields.kategori.visible && fields.kategori.required ? ew.Validators.required(fields.kategori.caption) : null], fields.kategori.isInvalid],
            ["harga", [fields.harga.visible && fields.harga.required ? ew.Validators.required(fields.harga.caption) : null, ew.Validators.float], fields.harga.isInvalid],
            ["stok", [fields.stok.visible && fields.stok.required ? ew.Validators.required(fields.stok.caption) : null, ew.Validators.integer], fields.stok.isInvalid],
            ["expired_date", [fields.expired_date.visible && fields.expired_date.required ? ew.Validators.required(fields.expired_date.caption) : null, ew.Validators.datetime(fields.expired_date.clientFormatPattern)], fields.expired_date.isInvalid],
            ["satuan", [fields.satuan.visible && fields.satuan.required ? ew.Validators.required(fields.satuan.caption) : null], fields.satuan.isInvalid]
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
<form name="fobatadd" id="fobatadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="obat">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->nama_obat->Visible) { // nama_obat ?>
    <div id="r_nama_obat"<?= $Page->nama_obat->rowAttributes() ?>>
        <label id="elh_obat_nama_obat" for="x_nama_obat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama_obat->caption() ?><?= $Page->nama_obat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nama_obat->cellAttributes() ?>>
<span id="el_obat_nama_obat">
<input type="<?= $Page->nama_obat->getInputTextType() ?>" name="x_nama_obat" id="x_nama_obat" data-table="obat" data-field="x_nama_obat" value="<?= $Page->nama_obat->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nama_obat->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->nama_obat->formatPattern()) ?>"<?= $Page->nama_obat->editAttributes() ?> aria-describedby="x_nama_obat_help">
<?= $Page->nama_obat->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama_obat->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->kategori->Visible) { // kategori ?>
    <div id="r_kategori"<?= $Page->kategori->rowAttributes() ?>>
        <label id="elh_obat_kategori" for="x_kategori" class="<?= $Page->LeftColumnClass ?>"><?= $Page->kategori->caption() ?><?= $Page->kategori->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->kategori->cellAttributes() ?>>
<span id="el_obat_kategori">
<input type="<?= $Page->kategori->getInputTextType() ?>" name="x_kategori" id="x_kategori" data-table="obat" data-field="x_kategori" value="<?= $Page->kategori->getEditValue() ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->kategori->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->kategori->formatPattern()) ?>"<?= $Page->kategori->editAttributes() ?> aria-describedby="x_kategori_help">
<?= $Page->kategori->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->kategori->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->harga->Visible) { // harga ?>
    <div id="r_harga"<?= $Page->harga->rowAttributes() ?>>
        <label id="elh_obat_harga" for="x_harga" class="<?= $Page->LeftColumnClass ?>"><?= $Page->harga->caption() ?><?= $Page->harga->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->harga->cellAttributes() ?>>
<span id="el_obat_harga">
<input type="<?= $Page->harga->getInputTextType() ?>" name="x_harga" id="x_harga" data-table="obat" data-field="x_harga" value="<?= $Page->harga->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->harga->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->harga->formatPattern()) ?>"<?= $Page->harga->editAttributes() ?> aria-describedby="x_harga_help">
<?= $Page->harga->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->harga->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['fobatadd', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fobatadd", "x_harga", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->stok->Visible) { // stok ?>
    <div id="r_stok"<?= $Page->stok->rowAttributes() ?>>
        <label id="elh_obat_stok" for="x_stok" class="<?= $Page->LeftColumnClass ?>"><?= $Page->stok->caption() ?><?= $Page->stok->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->stok->cellAttributes() ?>>
<span id="el_obat_stok">
<input type="<?= $Page->stok->getInputTextType() ?>" name="x_stok" id="x_stok" data-table="obat" data-field="x_stok" value="<?= $Page->stok->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->stok->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->stok->formatPattern()) ?>"<?= $Page->stok->editAttributes() ?> aria-describedby="x_stok_help">
<?= $Page->stok->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->stok->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['fobatadd', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fobatadd", "x_stok", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->expired_date->Visible) { // expired_date ?>
    <div id="r_expired_date"<?= $Page->expired_date->rowAttributes() ?>>
        <label id="elh_obat_expired_date" for="x_expired_date" class="<?= $Page->LeftColumnClass ?>"><?= $Page->expired_date->caption() ?><?= $Page->expired_date->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->expired_date->cellAttributes() ?>>
<span id="el_obat_expired_date">
<input type="<?= $Page->expired_date->getInputTextType() ?>" name="x_expired_date" id="x_expired_date" data-table="obat" data-field="x_expired_date" value="<?= $Page->expired_date->getEditValue() ?>" placeholder="<?= HtmlEncode($Page->expired_date->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->expired_date->formatPattern()) ?>"<?= $Page->expired_date->editAttributes() ?> aria-describedby="x_expired_date_help">
<?= $Page->expired_date->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->expired_date->getErrorMessage() ?></div>
<?php if (!$Page->expired_date->ReadOnly && !$Page->expired_date->Disabled && !isset($Page->expired_date->EditAttrs["readonly"]) && !isset($Page->expired_date->EditAttrs["disabled"])) { ?>
<script<?= Nonce() ?>>
loadjs.ready(["fobatadd", "datetimepicker"], function () {
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
        "fobatadd",
        "x_expired_date",
        ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options),
        {"inputGroup":true}
    );
});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready(['fobatadd', 'jqueryinputmask'], function() {
	options = {
		'jitMasking': false,
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fobatadd", "x_expired_date", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->satuan->Visible) { // satuan ?>
    <div id="r_satuan"<?= $Page->satuan->rowAttributes() ?>>
        <label id="elh_obat_satuan" for="x_satuan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->satuan->caption() ?><?= $Page->satuan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->satuan->cellAttributes() ?>>
<span id="el_obat_satuan">
<input type="<?= $Page->satuan->getInputTextType() ?>" name="x_satuan" id="x_satuan" data-table="obat" data-field="x_satuan" value="<?= $Page->satuan->getEditValue() ?>" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->satuan->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->satuan->formatPattern()) ?>"<?= $Page->satuan->editAttributes() ?> aria-describedby="x_satuan_help">
<?= $Page->satuan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->satuan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fobatadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fobatadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fobatadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fobatadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("obat");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fobatadd:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
