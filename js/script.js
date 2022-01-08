    // ambil navitem
    $(".nav-item").on("click ", function() {
        //hapus class active
        $(".nav-item").removeClass("active")
            //tambahkan class active di nav-item yang di klik
        $(this).addClass("active")
    })