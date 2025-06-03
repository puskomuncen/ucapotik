<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$DokterAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { dokter: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fdokteradd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdokteradd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["nama", [fields.nama.visible && fields.nama.required ? ew.Validators.required(fields.nama.caption) : null], fields.nama.isInvalid],
            ["spesialisasi", [fields.spesialisasi.visible && fields.spesialisasi.required ? ew.Validators.required(fields.spesialisasi.caption) : null], fields.spesialisasi.isInvalid],
            ["no_lisensi", [fields.no_lisensi.visible && fields.no_lisensi.required ? ew.Validators.required(fields.no_lisensi.caption) : null], fields.no_lisensi.isInvalid],
            ["tarif_konsultasi", [fields.tarif_konsultasi.visible && fields.tarif_konsultasi.required ? ew.Validators.required(fields.tarif_konsultasi.caption) : null, ew.Validators.float], fields.tarif_konsultasi.isInvalid],
            ["no_telp", [fields.no_telp.visible && fields.no_telp.required ? ew.Validators.required(fields.no_telp.caption) : null], fields.no_telp.isInvalid],
            ["email", [fields.email.visible && fields.email.required ? ew.Validators.required(fields.email.caption) : null], fields.email.isInvalid]
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
<form name="fdokteradd" id="fdokteradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="dokter">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->nama->Visible) { // nama ?>
    <div id="r_nama"<?= $Page->nama->rowAttributes() ?>>
        <label id="elh_dokter_nama" for="x_nama" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nama->caption() ?><?= $Page->nama->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->nama->cellAttributes() ?>>
<span id="el_dokter_nama">
<input type="<?= $Page->nama->getInputTextType() ?>" name="x_nama" id="x_nama" data-table="dokter" data-field="x_nama" value="<?= $Page->nama->getEditValue() ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->nama->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->nama->formatPattern()) ?>"<?= $Page->nama->editAttributes() ?> aria-describedby="x_nama_help">
<?= $Page->nama->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nama->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->spesialisasi->Visible) { // spesialisasi ?>
    <div id="r_spesialisasi"<?= $Page->spesialisasi->rowAttributes() ?>>
        <label id="elh_dokter_spesialisasi" for="x_spesialisasi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->spesialisasi->caption() ?><?= $Page->spesialisasi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->spesialisasi->cellAttributes() ?>>
<span id="el_dokter_spesialisasi">
<input type="<?= $Page->spesialisasi->getInputTextType() ?>" name="x_spesialisasi" id="x_spesialisasi" data-table="dokter" data-field="x_spesialisasi" value="<?= $Page->spesialisasi->getEditValue() ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->spesialisasi->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->spesialisasi->formatPattern()) ?>"<?= $Page->spesialisasi->editAttributes() ?> aria-describedby="x_spesialisasi_help">
<?= $Page->spesialisasi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->spesialisasi->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->no_lisensi->Visible) { // no_lisensi ?>
    <div id="r_no_lisensi"<?= $Page->no_lisensi->rowAttributes() ?>>
        <label id="elh_dokter_no_lisensi" for="x_no_lisensi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->no_lisensi->caption() ?><?= $Page->no_lisensi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->no_lisensi->cellAttributes() ?>>
<span id="el_dokter_no_lisensi">
<input type="<?= $Page->no_lisensi->getInputTextType() ?>" name="x_no_lisensi" id="x_no_lisensi" data-table="dokter" data-field="x_no_lisensi" value="<?= $Page->no_lisensi->getEditValue() ?>" size="30" maxlength="20" placeholder="<?= HtmlEncode($Page->no_lisensi->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->no_lisensi->formatPattern()) ?>"<?= $Page->no_lisensi->editAttributes() ?> aria-describedby="x_no_lisensi_help">
<?= $Page->no_lisensi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->no_lisensi->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tarif_konsultasi->Visible) { // tarif_konsultasi ?>
    <div id="r_tarif_konsultasi"<?= $Page->tarif_konsultasi->rowAttributes() ?>>
        <label id="elh_dokter_tarif_konsultasi" for="x_tarif_konsultasi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tarif_konsultasi->caption() ?><?= $Page->tarif_konsultasi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->tarif_konsultasi->cellAttributes() ?>>
<span id="el_dokter_tarif_konsultasi">
<input type="<?= $Page->tarif_konsultasi->getInputTextType() ?>" name="x_tarif_konsultasi" id="x_tarif_konsultasi" data-table="dokter" data-field="x_tarif_konsultasi" value="<?= $Page->tarif_konsultasi->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->tarif_konsultasi->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->tarif_konsultasi->formatPattern()) ?>"<?= $Page->tarif_konsultasi->editAttributes() ?> aria-describedby="x_tarif_konsultasi_help">
<?= $Page->tarif_konsultasi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tarif_konsultasi->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['fdokteradd', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fdokteradd", "x_tarif_konsultasi", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->no_telp->Visible) { // no_telp ?>
    <div id="r_no_telp"<?= $Page->no_telp->rowAttributes() ?>>
        <label id="elh_dokter_no_telp" for="x_no_telp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->no_telp->caption() ?><?= $Page->no_telp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->no_telp->cellAttributes() ?>>
<span id="el_dokter_no_telp">
<input type="<?= $Page->no_telp->getInputTextType() ?>" name="x_no_telp" id="x_no_telp" data-table="dokter" data-field="x_no_telp" value="<?= $Page->no_telp->getEditValue() ?>" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->no_telp->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->no_telp->formatPattern()) ?>"<?= $Page->no_telp->editAttributes() ?> aria-describedby="x_no_telp_help">
<?= $Page->no_telp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->no_telp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->email->Visible) { // email ?>
    <div id="r_email"<?= $Page->email->rowAttributes() ?>>
        <label id="elh_dokter_email" for="x_email" class="<?= $Page->LeftColumnClass ?>"><?= $Page->email->caption() ?><?= $Page->email->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->email->cellAttributes() ?>>
<span id="el_dokter_email">
<input type="<?= $Page->email->getInputTextType() ?>" name="x_email" id="x_email" data-table="dokter" data-field="x_email" value="<?= $Page->email->getEditValue() ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->email->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->email->formatPattern()) ?>"<?= $Page->email->editAttributes() ?> aria-describedby="x_email_help">
<?= $Page->email->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->email->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fdokteradd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fdokteradd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fdokteradd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fdokteradd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("dokter");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fdokteradd:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
