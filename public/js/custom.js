// new cat modal : set necessary configs when new cat modal is opended
var newCatModal = document.getElementById('new-cat');
newCatModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget; // Button that triggered the modal

    var id = button.getAttribute('data-bs-id');
    newCatModal.querySelector('.cat-id').value = id;
    newCatModal.querySelector('.cat-title').value = null;

    document.querySelector('#all-cats').setAttribute('data-current-cat', id);
});

// edit cat modal : set necessary configs when edit cat modal is opended
var editCatModal = document.getElementById('edit-cat');
editCatModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget; // Button that triggered the modal

    var id = button.getAttribute('data-id');
    var title = button.getAttribute('data-title');
    var route = button.getAttribute('data-route');
    var type = button.getAttribute('data-type');

    editCatModal.querySelector('.cat-title').value = title;
    editCatModal.querySelector('#update-cat').setAttribute('action', route);

    document.querySelector('#all-cats').setAttribute('data-current-cat', id);
    document.querySelector('#all-cats').setAttribute('data-current-mode', type);

});


// load sub categories
$(document).on('click', '.load-subcats', function () {
    var route = $(this).data('route');
    var container = $(this).parents('.cat-container');
    $(this).parents('.card-body').html('<p class="text-center"> درحال بارگذاری ... </p>');
    $.ajax({
        url : route,
        method : 'GET',
        success : function (result) {
            container.html(result);
        }
    });

});

// store category
$(document).on('submit', '#store-cat, #update-cat', function (e) {
    e.preventDefault();

    var title = $(this).find('.cat-title').val();
    var parentCatId = $(this).find('.cat-id').val();
    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var mode = $('#all-cats').attr('data-current-mode'); // determine if it's being edited from table button or card button

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf]').attr('content')
        }
    });

    $.ajax({
        url : url,
        method : method,
        data : {
            title : title,
            parent_category_id : parentCatId,
            mode : mode
        },
        success : function (result) {
            var catToUpdateDOM = $('#all-cats').attr('data-current-cat');
            if (catToUpdateDOM) {
                // update DOM
                var catCard = $('#all-cats').find(`.cat-container .cat-card[data-cat-id=${catToUpdateDOM}]`);
                catCard.parent().html(result);
            }else {
                // update DOM
                $('#all-cats').append(`<div class="cat-container">${result}</div>`);
                // scroll to new appended div
                var target = $("#all-cats .cat-container").last();
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 500);
            }
            $('#new-cat').modal('hide');
            $('#edit-cat').modal('hide');
            $('#no-cat').remove();
        }
    });
});


// delete category
$(document).on('click', '.delete-cat', function () {

    var btn = $(this);
    var route = btn.data('route');
    var type = btn.data('type');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf]').attr('content')
        }
    });

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-primary mx-1',
            cancelButton: 'btn btn-secondary mx-1'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: '',
        text: "آیا مطمئن هستید؟",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'بله',
        cancelButtonText: 'خیر',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url : route,
                method : 'DELETE',
                success : function (result) {
                    if (result) {

                        // change DOM
                        if (type == 'card') {
                            btn.parents('.cat-card').remove();
                        }else {
                            btn.parents('tr').remove();
                        }

                        // Display swal message
                        swalWithBootstrapButtons.fire(
                            '',
                            'دسته بندی با موفقیت حذف شد.',
                            'success'
                        );

                    }else {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطایی رخ داد...',
                        });
                    }
                }
            });
        }
    })
});
