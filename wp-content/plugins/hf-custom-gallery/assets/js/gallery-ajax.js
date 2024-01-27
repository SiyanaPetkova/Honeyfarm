let currentPage = 1;

jQuery(document).ready(function ($) {
    $('#load-more').on('click', function () {
        currentPage++;

        $.ajax({
            type: 'POST',
            url: my_ajax_object.ajax_url,
            dataType: 'html',
            data: {
                action: 'gallery_load_more',
                paged: currentPage,
            },
            success: function (res) {
                if (res.trim() !== '') {
                    $('.gallery').append(res);

                    let maxPages = parseInt($('.max-pages').data('max-pages'), 10);

                    if (currentPage >= maxPages) {
                        $('#load-more').hide();
                    }
                } else {
                    $('#load-more').hide();                    
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Ajax request failed:', textStatus, errorThrown);
            }
        });
    });
});
