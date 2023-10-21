<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ URL('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ URL('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ URL('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ URL('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ URL('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ URL('assets/js/main.js') }}"></script>
<script src="{{ URL('assets/js/jquery.js') }}"></script>



<script>

let x = document.getElementById('EnD').defaultValue = 0 ;
let y = document.getElementById('AnD').defaultValue = 0 ;

let v1 = document.getElementById('PF').defaultValue = 0 ;
let v2 = document.getElementById('PM').defaultValue = 0 ;
let v3 = document.getElementById('PDW_PF').defaultValue = 0 ;
let v4 = document.getElementById('PDW_PM').defaultValue = 0 ;
function popup() {
var value1 = Number(document.getElementById('PF').value);
var value2 = Number(document.getElementById('PM').value);
var value3 = Number(document.getElementById('PDW_PF').value);
var value4 = Number(document.getElementById('PDW_PM').value);

var total = value1 + value2 + value3 + value4;
document.getElementById('total').value = total;
} 
</script>

@livewireScripts()