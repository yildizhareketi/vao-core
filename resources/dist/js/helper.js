function initSelect(url, placeholder, identifier, value) {
    $(identifier).select2({
        placeholder: placeholder,
        language: "tr",
        ajax: {
            url: url,
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
        }
    });
    if (value && value.length !== 0) {
        console.log(value.length)
        let studentSelect = $(identifier);
        $.ajax({
            type: 'GET',
            url: url,
            data: {id:value}
        }).then(function (data) {
            if (data) {
                if (isArray(data)){
                    for (const data2 of data){
                        let option = new Option(data2.name, data2.id, true, true);
                        studentSelect.append(option).trigger('change');
                        studentSelect.trigger({
                            type: 'select2:select',
                            params: {
                                data: data2
                            }
                        });
                    }

                }else{
                    let option = new Option(data.name, data.id, true, true);
                    studentSelect.append(option).trigger('change');
                    studentSelect.trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                }

            } else {

            }

        }).catch(function () {
            $(identifier).attr("data-placeholder", "bar");
            $(identifier).data('placeholder', 'This is a placeholder');
        });
    }

}
function selectSetValue(identifier, value) {
    if (value) {
        $(identifier).val(value)
    }

}
function initMultiSelectWithoutAjax(placeholder, identifier, value) {
    $(identifier).select2({
        placeholder: placeholder,
        language: "tr",
    });
    if (value) {
        selectSetValue(identifier, value)
        $(identifier).select2();
        $(identifier).trigger("change");
    }
}
function initDropzone(route,csrf,formId) {
    Dropzone.autoDiscover = false;
    let uploadedDocumentMap = {}
    $(function () {
        uploader = new Dropzone("#kt_dropzone_2", {
            url: route,
            paramName: "file",
            uploadMultiple: false,
            acceptedFiles: "image/*,video/*,audio/*",
            addRemoveLinks: true,
            forceFallback: false,
            maxFilesize: 1000,
            headers: {
                'X-CSRF-TOKEN': csrf,
            },
            parallelUploads: 100,
            removedfile: function (file, response) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $(formId).find('input[name="document[]"][value="' + name + '"]').remove()
            }

        });//end drop zone

        uploader.on("success", function (file, response) {
            $(formId).append('<input type="hidden" name="document[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
        });

        uploader.on("init", function (file, response) {
            var files = initData
            for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $(formId).append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
            }

        });
    });
}
function raiseToast(status,message) {

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    if (status === 'error'){
        toastr.error(message);
    }else{
        toastr.success(message);
    }

}
function raiseConfirmDialog(text,callback) {
    Swal.mixin({
        buttonsStyling: !1,
        customClass: {
            confirmButton: "btn btn-success m-1",
            cancelButton: "btn btn-danger m-1",
            input: "form-control"
        }
    }).fire({
        title: "Emin Misiniz ?",
        text: text,
        icon: "warning",
        showCancelButton: !0,
        customClass: {confirmButton: "btn btn-danger m-1", cancelButton: "btn btn-secondary m-1"},
        confirmButtonText: "Evet , Sil!",
        html: !1,
    }).then((function (e) {
        if (e.isConfirmed) {
            callback()
        }
    }))
}

function deleteData(href){
    raiseConfirmDialog('Silmek İstediğinize Emin Misiniz ?',function (){
        axios.delete(href).then(function (response){
            raiseToast('success',response.data)
            setTimeout(function (){
                location.reload();
            },1000)

        }).catch(function (response){
            raiseToast('error','Hata Oluştu '+response)
        });
    });
}

