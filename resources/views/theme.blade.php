<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Aplikasi Point Of Sale">
        <meta name="author" content="Muh Nasrul" />
        <meta name="developer" content="Muh Nasrul" />
        <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/main.css')}}">
        {{-- <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}" /> --}}
        {{-- <script src="{{asset('js/toastr.min.js')}}"></script> --}}
        {{-- <script src="{{asset('js/jquery.js')}}"></script> --}}
    </head>
    <body>
        @include('master_layout.theme_topbar')
        @include('master_layout.theme_sidebar')
        @include('sweetalert::alert')
        <div class="app-main__outer">
            <div class="app-main__inner">
                @yield('content')
            </div>
        </div>
        {{-- <script src="{{asset('js/jquery.mask.min.js')}}"></script> --}}
        <script src="{{asset('assets/assets/main.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/assets/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/assets/sweetalert2.all.min.js')}}" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        {{-- <script src="{{asset('assets/assets/bootstrap-confirmation.min.js')}}" type="text/javascript"></script> --}}
        
        <script type="text/javascript">
            
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                let forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                let validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
            $(document).on('click', '#select', function(){
                let id = $(this).data('id');
                let nama_barang = $(this).data('nama_barang');
                let stok_barang = $(this).data('stok_barang');
                let harga_jual = $(this).data('harga_jual');
                    $('#nama_barang').val(nama_barang);
                    $('#stok_barang').val(stok_barang);
                    $('#id').val(id);
                    $('#harga_jual').val(harga_jual);
                })
            })
        </script>
        <script type="text/javascript">
            // Ketika submit di klik
            $('.btn-submit').click(function(e){
                e.preventDefault();
                let nama = $("input[name='nama_barang']").val();
                if(nama == ''){
                    swal('Check Out Gagal','Barang wajib dipilih terlebih dahulu...!','error');
                    // alert('Barang wajib dipilih terlebih dahulu');
                    }else{
                        $(this).addClass('disabled');
                        $(this).closest('form').submit();
                    }
                })
        </script>
        <script type="text/javascript">
            // Ketika cari di klik
            $('.btn-cari').click(function(e){
                e.preventDefault();
                let caribarang = $("input[name='cari']").val();
                if(caribarang == ''){
                    swal('Pencarian Barcode Gagal','Masukkan Barcode Barang Atau Nama Barang terlebih dahulu...!','error');
                    // alert('Barang wajib dipilih terlebih dahulu');
                    }else{
                        $(this).addClass('disabled');
                        $(this).closest('form').submit();
                    }
                })
        </script>
        <script type="text/javascript">
            // Ketika cari di klik
            $('.btn-search').click(function(e){
                e.preventDefault();
                let caribarang = $("input[name='cari']").val();
                if(caribarang == ''){
                    swal('Pencarian Data Gagal','Masukkan Data terlebih dahulu...!','error');
                    // alert('Barang wajib dipilih terlebih dahulu');
                    }else{
                        $(this).addClass('disabled');
                        $(this).closest('form').submit();
                    }
                })
        </script>
        <script type="text/javascript">
            // Ketika submit di klik
            $('.btn-invoice').click(function(e){
                e.preventDefault();
                let namaconfirm = $("input[name ='nama_barang_confirm']").val();
                if(namaconfirm == '0'){
                    swal('Print Gagal','Tidak ada produk yang tersedia...!','error');
                    // alert('Barang wajib dipilih terlebih dahulu');
                    }else{
                        $(this).addClass('disabled');
                        $(this).closest('form').submit();
                    }
                })
        </script>
        <script type="text/javascript">
            // Ketika submit di klik
            $('.btn-report').click(function(e){
                e.preventDefault();
                let namaconfirm = $("input[name ='tanggal_awal']").val();
                if(namaconfirm == ''){
                    swal('Cetak Gagal','Silahkan pilih tanggal terlebih dahulu...!','error');
                    // alert('Barang wajib dipilih terlebih dahulu');
                    }else{
                        $(this).addClass('disabled');
                        $(this).closest('form').submit();
                    }
                })
        </script>
        <script type="text/javascript">
            // Ketika submit di klik
            $('.btn-cek').click(function(e){
                e.preventDefault();
                let namaconfirm = $("input[name ='cek']").val();
                if(namaconfirm == 'null'){
                    swal('Cetak Gagal','Tidak ada data yang tersedia...!','error');
                    // alert('Barang wajib dipilih terlebih dahulu');
                    }else{
                        $(this).addClass('disabled');
                        $(this).closest('form').submit();
                    }
                })
        </script>
        <script>
          function confirmDelete(item_id) {
            swal({
              title: 'Hapus data Produk...?',
              text: "Klik Hapus untuk menghapus data !",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus'
            }).then((result) => {
              if (result.value) {
                $('#'+item_id).submit();
              } else {
                swal('Pemberitahuan','Hapus Data Dibatalkan...!','info');
              }
            });
          }
</script>
    </body>
</html>
