// function to convert timestamp into date
function convertDate(timestamp) {
    var d = new Date(timestamp * 1000),
        yyyy = d.getFullYear(),
        mm = ("0" + (d.getMonth() + 1)).slice(-2),
        dd = ("0" + d.getDate()).slice(-2);
    return yyyy + "-" + mm + "-" + dd;
}

// funciton to confirm delete action and perform ajax request with sweet alert
function confirmDeleteAction(url, csrfToken, datatableId) {
    Swal.fire({
        title: "Konfirmasi",
        text: "Anda yakin ingin menghapus data ini?",
        icon: "warning",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya",
        cancelButtonText: "Tidak",
        showLoaderOnConfirm: true,
        backdrop: true,
        allowOutsideClick: () => !Swal.isLoading(),
        preConfirm: (id) => {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: `${url}`,
                    method: "DELETE",
                    data: {
                        _token: csrfToken,
                    },
                    success: function (res) {
                        return resolve(res);
                    },
                    error: function (err) {
                        Swal.fire({
                            title: "Gagal",
                            text: "Gagal menghapus data",
                            icon: "error",
                            allowOutsideClick: false,
                        }).then((result) => {
                            $(datatableId).DataTable().ajax.reload();
                        });
                        return reject(err);
                    },
                });
            });
        },
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Berhasil",
                text: "Berhasil hapus data",
                icon: "success",
                allowOutsideClick: false,
            }).then((result) => {
                $(datatableId).DataTable().ajax.reload();
            });
        }
    });
}

// function capitalize first letter on each word
function capitalizeFirstLetterEachWord(str) {
    return typeof str === "string"
        ? str.replace(/\w\S*/g, function (txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        })
        : str;
}

function ajaxAlertConfirm(alert, ajax, cb) {
    Swal.fire({
        title: alert.title,
        text: alert.text,
        icon: "warning",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Iya",
        cancelButtonText: "Tidak",
        showLoaderOnConfirm: true,
        backdrop: true,
        allowOutsideClick: () => !Swal.isLoading(),
        preConfirm: (id) => {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: ajax.url,
                    method: ajax.method,
                    data: ajax.data,
                    success: function (res) {
                        return resolve(res);
                    },
                    error: function (err) {
                        if (err.status < 500) {
                            Swal.fire({
                                title: "Gagal",
                                text: err.responseJSON.message,
                                icon: "error",
                                allowOutsideClick: false,
                            }).then((result) => {
                                return cb();
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: "Terjadi kesalahan di server kami.",
                                icon: "error",
                                allowOutsideClick: false,
                            }).then((result) => {
                                return cb();
                            });
                        }
                    },
                });
            });
        },
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: alert.success.title,
                text: alert.success.text,
                icon: "success",
                allowOutsideClick: false,
            }).then((result) => {
                return cb();
            });
        }
    });
}
