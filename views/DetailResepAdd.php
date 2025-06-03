<?php

namespace PHPMaker2025\apotik2025baru;

// Page object
$DetailResepAdd = &$Page;
?>
<script<?= Nonce() ?>>
var currentTable = <?= json_encode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { detail_resep: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fdetail_resepadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdetail_resepadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["id_kunjungan", [fields.id_kunjungan.visible && fields.id_kunjungan.required ? ew.Validators.required(fields.id_kunjungan.caption) : null], fields.id_kunjungan.isInvalid],
            ["id_obat", [fields.id_obat.visible && fields.id_obat.required ? ew.Validators.required(fields.id_obat.caption) : null], fields.id_obat.isInvalid],
            ["jumlah", [fields.jumlah.visible && fields.jumlah.required ? ew.Validators.required(fields.jumlah.caption) : null, ew.Validators.integer], fields.jumlah.isInvalid],
            ["dosis", [fields.dosis.visible && fields.dosis.required ? ew.Validators.required(fields.dosis.caption) : null], fields.dosis.isInvalid]
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
            "id_obat": <?= $Page->id_obat->toClientList($Page) ?>,
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
<form name="fdetail_resepadd" id="fdetail_resepadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CSRF_PROTECTION") && Csrf()->isEnabled()) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" id="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" id="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="detail_resep">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->getFormOldKeyName() ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->id_kunjungan->Visible) { // id_kunjungan ?>
    <div id="r_id_kunjungan"<?= $Page->id_kunjungan->rowAttributes() ?>>
        <label id="elh_detail_resep_id_kunjungan" for="x_id_kunjungan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_kunjungan->caption() ?><?= $Page->id_kunjungan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_kunjungan->cellAttributes() ?>>
<span id="el_detail_resep_id_kunjungan">
    <select
        id="x_id_kunjungan"
        name="x_id_kunjungan"
        class="form-select ew-select<?= $Page->id_kunjungan->isInvalidClass() ?>"
        <?php if (!$Page->id_kunjungan->IsNativeSelect) { ?>
        data-select2-id="fdetail_resepadd_x_id_kunjungan"
        <?php } ?>
        data-table="detail_resep"
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
loadjs.ready("fdetail_resepadd", function() {
    var options = { name: "x_id_kunjungan", selectId: "fdetail_resepadd_x_id_kunjungan" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fdetail_resepadd.lists.id_kunjungan?.lookupOptions.length) {
        options.data = { id: "x_id_kunjungan", form: "fdetail_resepadd" };
    } else {
        options.ajax = { id: "x_id_kunjungan", form: "fdetail_resepadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.detail_resep.fields.id_kunjungan.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_obat->Visible) { // id_obat ?>
    <div id="r_id_obat"<?= $Page->id_obat->rowAttributes() ?>>
        <label id="elh_detail_resep_id_obat" for="x_id_obat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_obat->caption() ?><?= $Page->id_obat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_obat->cellAttributes() ?>>
<span id="el_detail_resep_id_obat">
    <select
        id="x_id_obat"
        name="x_id_obat"
        class="form-select ew-select<?= $Page->id_obat->isInvalidClass() ?>"
        <?php if (!$Page->id_obat->IsNativeSelect) { ?>
        data-select2-id="fdetail_resepadd_x_id_obat"
        <?php } ?>
        data-table="detail_resep"
        data-field="x_id_obat"
        data-value-separator="<?= $Page->id_obat->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_obat->getPlaceHolder()) ?>"
        <?= $Page->id_obat->editAttributes() ?>>
        <?= $Page->id_obat->selectOptionListHtml("x_id_obat") ?>
    </select>
    <?= $Page->id_obat->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_obat->getErrorMessage() ?></div>
<?= $Page->id_obat->Lookup->getParamTag($Page, "p_x_id_obat") ?>
<?php if (!$Page->id_obat->IsNativeSelect) { ?>
<script<?= Nonce() ?>>
loadjs.ready("fdetail_resepadd", function() {
    var options = { name: "x_id_obat", selectId: "fdetail_resepadd_x_id_obat" },
        el = document.querySelector("select[data-select2-id='" + options.selectId + "']");
    if (!el)
        return;
    options.closeOnSelect = !options.multiple;
    options.dropdownParent = el.closest("#ew-modal-dialog, #ew-add-opt-dialog");
    if (fdetail_resepadd.lists.id_obat?.lookupOptions.length) {
        options.data = { id: "x_id_obat", form: "fdetail_resepadd" };
    } else {
        options.ajax = { id: "x_id_obat", form: "fdetail_resepadd", limit: ew.LOOKUP_PAGE_SIZE };
    }
    options.minimumResultsForSearch = Infinity;
    options = Object.assign({}, ew.selectOptions, options, ew.vars.tables.detail_resep.fields.id_obat.selectOptions);
    ew.createSelect(options);
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->jumlah->Visible) { // jumlah ?>
    <div id="r_jumlah"<?= $Page->jumlah->rowAttributes() ?>>
        <label id="elh_detail_resep_jumlah" for="x_jumlah" class="<?= $Page->LeftColumnClass ?>"><?= $Page->jumlah->caption() ?><?= $Page->jumlah->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->jumlah->cellAttributes() ?>>
<span id="el_detail_resep_jumlah">
<input type="<?= $Page->jumlah->getInputTextType() ?>" name="x_jumlah" id="x_jumlah" data-table="detail_resep" data-field="x_jumlah" value="<?= $Page->jumlah->getEditValue() ?>" size="30" placeholder="<?= HtmlEncode($Page->jumlah->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->jumlah->formatPattern()) ?>"<?= $Page->jumlah->editAttributes() ?> aria-describedby="x_jumlah_help">
<?= $Page->jumlah->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->jumlah->getErrorMessage() ?></div>
<script<?= Nonce() ?>>
loadjs.ready(['fdetail_resepadd', 'jqueryinputmask'], function() {
	options = {
		'alias': 'numeric',
		'autoUnmask': true,
		'jitMasking': false,
		'groupSeparator': '<?php echo $GROUPING_SEPARATOR ?>',
		'digits': 0,
		'radixPoint': '<?php echo $DECIMAL_SEPARATOR ?>',
		'removeMaskOnSubmit': true
	};
	ew.createjQueryInputMask("fdetail_resepadd", "x_jumlah", jQuery.extend(true, "", options));
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->dosis->Visible) { // dosis ?>
    <div id="r_dosis"<?= $Page->dosis->rowAttributes() ?>>
        <label id="elh_detail_resep_dosis" for="x_dosis" class="<?= $Page->LeftColumnClass ?>"><?= $Page->dosis->caption() ?><?= $Page->dosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->dosis->cellAttributes() ?>>
<span id="el_detail_resep_dosis">
<input type="<?= $Page->dosis->getInputTextType() ?>" name="x_dosis" id="x_dosis" data-table="detail_resep" data-field="x_dosis" value="<?= $Page->dosis->getEditValue() ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->dosis->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->dosis->formatPattern()) ?>"<?= $Page->dosis->editAttributes() ?> aria-describedby="x_dosis_help">
<?= $Page->dosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->dosis->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fdetail_resepadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fdetail_resepadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
loadjs.ready(["wrapper", "head", "swal"],function(){$('#btn-action').on('click',function(){if(fdetail_resepadd.validateFields()){ew.prompt({title: ew.language.phrase("MessageAddConfirm"),icon:'question',showCancelButton:true},result=>{if(result)$("#fdetail_resepadd").submit();});return false;} else { ew.prompt({title: ew.language.phrase("MessageInvalidForm"), icon: 'warning', showCancelButton:false}); }});});
</script>
<?php } ?>
<script<?= Nonce() ?>>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("detail_resep");
});
</script>
<?php if (Config("MS_ENTER_MOVING_CURSOR_TO_NEXT_FIELD")) { ?>
<script>
loadjs.ready("head", function() { $("#fdetail_resepadd:first *:input[type!=hidden]:first").focus(),$("input").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("select").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()}),$("radio").keydown(function(i){if(13==i.which){var e=$(this).closest("form").find(":input:visible:enabled"),n=e.index(this);n==e.length-1||(e.eq(e.index(this)+1).focus(),i.preventDefault())}else 113==i.which&&$("#btn-action").click()})});
</script>
<?php } ?>
<script<?= Nonce() ?>>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
