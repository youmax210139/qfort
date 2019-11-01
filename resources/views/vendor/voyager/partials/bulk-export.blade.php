<a class="btn btn-warning" id="bulk_export_btn"><i class="voyager-forward"></i> <span>Export</span></a>

{{-- Bulk delete modal --}}
<div class="modal modal-warning fade" tabindex="-1" id="bulk_export_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <i class="voyager-forward"></i>
                    {{ __('generic.are_you_sure_export') }}
                    <span id="bulk_export_count"></span>
                    <span id="bulk_export_display_name"></span>
                    {{ __('generic.data') }}?
                </h4>
            </div>
            <div class="modal-body" id="bulk_export_modal_body">
            </div>
            <div class="modal-footer">
                <form action="{{ route('voyager.export', $dataType->slug) }}" id="bulk_export_form" method="GET">
                    <input type="hidden" name="ids" id="bulk_export_input" value="">
                    <input type="submit" class="btn btn-warning pull-right delete-confirm"
                             value="{{ __('generic.bulk_export_confirm') }}">
                </form>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                    {{ __('voyager::generic.cancel') }}
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
if (window.addEventListener) // W3C standard
{
  window.addEventListener('load', exportExcel, false); // NB **not** 'onload'
}
else if (window.attachEvent) // Microsoft
{
  window.attachEvent('onload', exportExcel);
}
 function exportExcel() {
    // Bulk delete selectors
    var $bulkExportBtn = $('#bulk_export_btn');
    var $bulkExportModal = $('#bulk_export_modal');
    var $bulkExportCount = $('#bulk_export_count');
    var $bulkExportDisplayName = $('#bulk_export_display_name');
    var $bulkExportInput = $('#bulk_export_input');
    // Reposition modal to prevent z-index issues
    $bulkExportModal.appendTo('body');
    // Bulk delete listener
    $bulkExportBtn.click(function () {
        var ids = [];
        var $checkedBoxes = $('#dataTable input[type=checkbox]:checked').not('.select_all');
        var count = $checkedBoxes.length;
        // Reset input value
        $bulkExportInput.val('');
        // Deletion info
        var displayName = (count == 0 || count > 1) ? '{{ $dataType->display_name_plural }}' : '{{ $dataType->display_name_singular }}';
        displayName = displayName.toLowerCase();
        $bulkExportCount.html(count>0?count:'all');
        $bulkExportDisplayName.html(displayName);
        // Gather IDs
        $.each($checkedBoxes, function () {
            var value = $(this).val();
            ids.push(value);
        })
        // Set input value
        $bulkExportInput.val(ids);
        // Show modal
        $bulkExportModal.modal('show');

    });

    $('#bulk_export_form').submit(function(e){
        $bulkExportModal.modal('hide');
    })
}
</script>
