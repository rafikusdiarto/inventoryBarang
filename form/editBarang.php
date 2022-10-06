<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <title>Inventaris Online</title>
    <style>
    h1 {
        font-size: 2em;
    }

    a,
    a:hover,
    a:focus,
    a:active {
        text-decoration: none;
        color: inherit;
    }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="../index.php">Inventaris Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- Header-->
    <header class="bg-dark py-4">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder"><i class="fa fa-pencil me-3"></i>Ubah Informasi Barang</h1>
            </div>
        </div>
    </header>
    <!-- akhir header -->

    <!-- konten -->
    <div class="container mt-5" id="container">
        <form>
            <div class="row mb-3">
                <label for="anime" class="col-sm-2 col-form-label">Nama Barang *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required="required">
                </div>
            </div>
            <div class="row mb-3">
                <label for="income" class="col-sm-2 col-form-label">Harga Barang *</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" id="harga_barang" name="harga_barang"
                            value="0" required="required">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <label for="duration" class="col-sm-2 col-form-label">Stok Barang *</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="number" class="form-control" id="stok_barang" name="stok_barang" value="0"
                            required="required">
                        <span class="input-group-text">item</span>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
              <label for="orig_lang" class="col-sm-2 col-form-label">Made In *</label>
              <div class="col-sm-10">
                <select class="form-select" id="asal_id" name="asal_id" required="required">
                  <option selected="selected" value="">-</option>
                  <!-- Auto Fill -->
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="orig_lang" class="col-sm-2 col-form-label">Kondisi *</label>
              <div class="col-sm-10">
                <select class="form-select" id="id_kondisi" name="id_kondisi" required="required">
                  <option selected="selected" value="">-</option>
                  <!-- Auto Fill -->
                </select>
              </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-info text-white"><i
                            class="fa-solid fa-paper-plane me-2"></i>Submit</button>
                    <a href="../index.php" class="btn btn-outline-secondary"><i
                            class="fa-solid fa-arrow-left me-2"></i>Back</a>
                </div>
            </div>
        </form>
    </div>
    <!-- akhir konten -->

    <!-- Footer-->
    <footer class="py-2 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; PWEB D4 Group 2022</p>
        </div>
    </footer>
    <!-- akhir footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "../asal.php",
                    async: false,
                    success: function(response) { 
                        $.each(response, function (key, value) {
                            $("#asal_id").append("<option value='"+ value.asal_id +"'>"+ value.country +"</option>")
                        })
                     }
                });
                $.ajax({
                    type: "GET",
                    url: "../kondisi.php",
                    async: false,
                    success: function(response) { 
                        $.each(response, function (key, value) {
                            $("#id_kondisi").append("<option value='"+ value.id_kondisi +"'>"+ value.kondisi +"</option>")
                        })
                     }
                });
                var id = <?php $id = isset($_GET['id']) ? $_GET['id'] : 0; echo $id ?>;
                $.get("../barang.php?action=readidBarang&id=" + id, function (data) {
                    $("#nama_barang").val(data[0]['nama_barang']);
                    $("#harga_barang").val(data[0]['harga_barang']);
                    $("#stok_barang").val(data[0]['stok_barang']);
                    $("#asal_id").val(data[0]['asal_id']);
                    $("#id_kondisi").val(data[0]['id_kondisi']);
                })
                $("form").submit(function (event) {
                    event.preventDefault();
                    var data = $(this).serialize();
                    $.post("../barang.php?action=editBarang&id=" + id, data, function (response) {
                        alert("Data berhasil diubah");
                        window.location=document.referrer;
                    })
                })
            });
        </script>
</body>
</html>