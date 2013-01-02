$(document).ready(function(){
 
 //   $('.myCarousel').carousel();
    var uploader = new qq.FileUploader({
        // pass the dom node (ex. $(selector)[0] for jQuery users)
        element: $('#file-uploader')[0],
        // path to server-side upload script
        action: '/doctors/upload/' + $('#hiddenID').val(),
        dragText: 'Перенесите файлы сюда для загрузки',
        uploadButtonText: 'Загрузить картинку',
        cancelButtonText: 'Отмена',
        failUploadText: 'Ошибка загрузки',        

        template: '<div class="qq-uploader">' +
                '<div class="qq-upload-drop-area"><span>{dragText}</span></div>' +
                '<div class="btn qq-upload-button">{uploadButtonText}</div>' +
                '<ul class="qq-upload-list"></ul>' +
                '</div>',  
                
        onComplete: function(id, fileName, data){
            if (data) {

            }
        },
    });
    
    $('.image-delete').live( 'click', function() {
        var parent  =  $(this).parents('li');
        $.post('/api/1/images/delete.json', { id : $(this).data('id')}, function(){
            parent.remove();
            if (! $('.image-main').is(":checked")) {
                var th = $('.image-main')[0];
                $(th).attr('checked', "checked");
            }
            
        });
        return false;   
    });

    
});