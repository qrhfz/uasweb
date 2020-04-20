$(document).ready(function() { /// Wait till page is loaded
    $(document).on('click', '.btn-suka', function() {
        var id = $(this).attr('id').replace(/likebtn-/, '');
        console.log(id);
        $('#sukawrp-' + id).load('utils/tombol_suka.php?id='+id+'&update=1', function() {});
    });
});


function tambah(page) {   
    $(document).ready(function () { /// Wait till page is loaded
        newpage=page+1;
        if(window.location.href.indexOf("?") > -1) {
            var alamat = window.location.href+"&page="+page.toString()
        }else{
            var alamat = window.location.href+"?page="+page.toString()
        }
        $.ajax({
            url: alamat,
            success: function (data) { 
                $('#postwrapper').append(data); 
                $("#tomboltambah").remove();
                //$('#postwrapper').append('<button class="btn btn-primary btn-lg btn-block" id="tomboltambah" onclick="tambah('+newpage+')">Muat</button>');
                $("#tomboltambah").attr("onclick","tambah("+newpage+")");
                console.log(alamat)},
            dataType: 'html'
        });

    });
}

$(document).ready(function () {
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
});