<!-- Modal -->
<div class="modal fade" id="fileManagerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?= _('File Manager') ?></h4>
            </div>
            <div class="modal-body no-padding">
                <iframe id="filemanagerFrame" width="100%" height="100%" frameborder="0"
                        src="<?= $pluginDir ?>filemanager/dialog.php?<?= $request ?>"></iframe>
                <script>
                    $("#filemanagerFrame").height(window.innerHeight - 150);

                    function responsive_filemanager_callback(field_id) {
                        var field = jQuery('#' + field_id);
                        var url = field.val();
                        /*
                        önizleme için url değerinin aktarılması istenen img nesnesi. id değerini  php den aktarınca otomatik olarak img nesnesinin tamamını alıyor(ilginç:)).
                         */
                        var targetImageId = <?=$targetImageId?>;
                        if ($.type(targetImageId) !== 'undefined') {
                            $(targetImageId).attr('src', url);
                        }

                        //eğer seçilen alan resimse url source özelliğine aktarılıacak
                        if (field.is('img')) {
                            field.attr('src', url)
                        }
                    }
                </script>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>