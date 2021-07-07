$(document).ready(function(){
    $('.item-img').on('click', function() {
        $(this).find('.back').slideToggle();
    });
    $('.link-delete').on('click', function() {
        if(!confirm("Вы уверены, что хотите удалить?")) return false;
    });
    $('body').on('click', '.delete-image', function(e) {
        e.preventDefault();
        if(!confirm('Вы действительно хотите удалить картинку?')) return false;
        var self = $(this);
        var url = self.attr('href');
        $.get(url, function(res) {
            console.log(res);
            if(res) {
                self.parents('li').remove();
            }

        })
    });
    $('body').on('change', '.storage-item-tr .storage-item', function(e) {
        e.preventDefault();
        var self = $(this);
        var id = self.parents('.storage-item-tr').data('id');
        var val = self.val();
        var field = self.data('field');
        var template = true;
        $.get('/admin/storage/change-field-value', {id: id, field: field, val: val}, function(res) {
            $('p.error').removeClass('success').text('');
            if(!res) {
                template = false;
            }
            displayMessage(template);
        });
    });
    function displayMessage(template) {
        $('p.error').removeClass('success').text('');
        if(template) {
            $('p.error').addClass('success').text("Сохранено успешно");
        } else {
            $('p.error').text('Произошла ошибка сохранения');
        }
        setTimeout(function() {
            $('p.error').text('');
        }, 4000);
    }
    $('body').on('change', '.change-storage-model', function(e) {
        e.preventDefault();
        var self = $(this);
        var val = self.val();
        var id = self.data('id');
        var field = self.data('field');
        var template = true;
        $.get('/admin/storage/change-model-value', {id: id, field: field, val: val}, function(res) {
            console.log(res);
            $('p.error').removeClass('success').text('');
            if(!res) {
                template = false;
            }
            displayMessage(template);
        });
    });
    $('body').on('change', '.select-thing-category', function(e) {
        e.preventDefault();
        var self = $(this);
        var val = self.val();
        $.get('/admin/storage/get-child-categories', {val: val}, function(res) {
            self.parents('tr').find('td .select-thing-child-category').html(res);
        });
    });
    $('body').on('click', '.add-storage-item', function(e) {
        e.preventDefault();
        var self = $(this);
        var parent = self.parents('tr');
        if(parent.find('.select-thing-category').val() && parent.find('.select-thing-child-category').val()) {
            var id = parent.data('id');
            var user_id = $('#user_id').data('id');
            var name = parent.find('input[data-field="name"]').val();
            var category_id = parent.find('.select-thing-category').val();
            var child_category_id = parent.find('.select-thing-child-category').val();
            $.get('/admin/storage/add-thing', {id: id, name: name, category_id: category_id, child_category_id: child_category_id, user_id: user_id}, function(res) {
                if(res) {
                    displayMessage(true);
                    self.removeClass('add-storage-item').attr('disabled', 'disabled').text('Добавлено');
                }
            });
        } else {
            console.log('ddddd')
            displayMessage(false);
            return false;
        }
    });
});

