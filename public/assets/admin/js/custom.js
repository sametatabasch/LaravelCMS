/**
 * Created by sametatabasch on 17.04.2014.
 */

$(function () {
	/**
	 * dataTable sınıflı  tablolar DataTeble ile düzenleniyor
	 */
	if ($.isFunction($.fn.dataTable)) {
		$('.dataTable').dataTable( {
			"language": {
				"sProcessing":   "İşleniyor...",
				"sLengthMenu":   "Sayfada _MENU_ Kayıt Göster",
				"sZeroRecords":  "Eşleşen Kayıt Bulunmadı",
				"sInfo":         "  _TOTAL_ Kayıttan _START_ - _END_ Arası Kayıtlar",
				"sInfoEmpty":    "Kayıt Yok",
				"sInfoFiltered": "( _MAX_ Kayıt İçerisinden Bulunan)",
				"sInfoPostFix":  "",
				"search":       "Bul:",
				"sUrl":          "",
				"oPaginate": {
					"sFirst":    "İlk",
					"sPrevious": "Önceki",
					"sNext":     "Sonraki",
					"sLast":     "Son"
				}

			}
		} );
	}
	/**
	 *  data-mask özelliği olan nesneye input mask uygular
	 */
	if ($.isFunction($.fn.inputmask)) {
		$("[data-mask]").inputmask();
	}
	/**
	 * şehir seçildiğinde otomatik olark ilçe listesini getirmek için
	 */
	$("select[name='meta[city]']").change(function () {
		$.post('/admin/options/counties', {city_id: this.value}, function (counties) {
			out = '';
			$.each(counties, function (key, value) {
				out += '<option value="' + key + '">' + value + '</option>';
			});
			$("select[name='meta[county]'] option").remove();
			$("select[name='meta[county]'] ").append(out);
		});
	});

	/**
	 * üye ekleme ve profil düzenleme sayfasında avatarı kaldırma işlemini yapar
	 */
	$('#clear').click(function () {
		$('img',$(this).parent()).attr('src', null);
		$($(this).attr('targetFormElement')).val(null);
	});
	/**
	 * checkbox lar için icheck eklentisini  aktif diyoruz
	 * todo teme seçimine göre iChek rengi otomatik olarak değişecek #93
	 */
	if ($.isFunction($.fn.iCheck)) {
		$('input[type=checkbox]').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			increaseArea: '20%' // optional
		});

		/**
		 * tablolardaki hepsini seç checkbox ı için
		 */
		//When unchecking the checkbox
		var table = $("#check-all").parents('table');
		$("#check-all").on('ifUnchecked', function (event) {
			//Uncheck all checkboxes
			$("input[type='checkbox']", table).iCheck("uncheck");
		});
		//When checking the checkbox
		$("#check-all").on('ifChecked', function (event) {
			//Check all checkboxes
			$("input[type='checkbox']", table).iCheck("check");
		});
	}
	/*Başlanğıç -> Yöneticiye mesaj gönder*/
	if(document.getElementById("message")!=null) {
		CKEDITOR.replace('message', {
			toolbar: [['Bold', 'Italic', 'Underline', 'Strike', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'TextColor']]
		});
	}

});//ready function