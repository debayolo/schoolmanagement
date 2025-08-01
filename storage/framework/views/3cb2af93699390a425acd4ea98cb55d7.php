
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/vendors/css/jquery.data-tables.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/vendors/css/buttons.dataTables.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/vendors/css/rowReorder.dataTables.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/assets/vendors/css/responsive.dataTables.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jquery.data-tables.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/dataTables.buttons.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/buttons.flash.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/jszip.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/pdfmake.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/vfs_fonts.js"></script>
<script src="<?php echo e(asset('public/backEnd/js/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/buttons.html5.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/buttons.print.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/dataTables.rowReorder.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/dataTables.responsive.min.js"></script>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/buttons.colVis.min.js"></script>

<script type="text/javascript">

if ($("#table_id, .school-table-data").length) {
    window.table = $("#table_id, .school-table-data").DataTable({
      bLengthChange: false,
      bDestroy: true,
      language: {
        search: "<i class='ti-search'></i>",
        searchPlaceholder: window.jsLang("search"),
        paginate: {
          next: "<i class='ti-arrow-right'></i>",
          previous: "<i class='ti-arrow-left'></i>",
        },
      },
      dom: "Bfrtip",
      buttons: [
        {
          extend: "copyHtml5",
          text: '<i class="fa fa-files-o"></i>',
          title: $("#logo_title").val(),
          titleAttr: window.jsLang("copy_table"),
          <?php if(is_null(@$i)): ?>
            exportOptions: {
              columns: 'th:not(:last-child)'
            },
          <?php endif; ?>
        },
        {
          extend: "excelHtml5",
          text: '<i class="fa fa-file-excel-o"></i>',
          titleAttr: window.jsLang("export_to_excel"),
          title: $("#logo_title").val(),
          margin: [10, 10, 10, 0],
          <?php if(is_null(@$i)): ?>
            exportOptions: {
              columns: 'th:not(:last-child)'
            },
          <?php endif; ?>
        },
        {
          extend: "csvHtml5",
          text: '<i class="fa fa-file-text-o"></i>',
          titleAttr: window.jsLang("export_to_csv"),
          <?php if(is_null(@$i)): ?>
            exportOptions: {
              columns: 'th:not(:last-child)'
            },
          <?php endif; ?>
        },
        {
          extend: "pdfHtml5",
          text: '<i class="fa fa-file-pdf-o"></i>',
          title: $("#logo_title").val(),
          titleAttr: window.jsLang("export_to_pdf"),
          <?php if(is_null(@$i)): ?>
            exportOptions: {
              columns: 'th:not(:last-child)'
            },
          <?php endif; ?>
          orientation: "landscape",
          pageSize: "A4",
          margin: [0, 0, 0, 12],
          alignment: "center",
          header: true,
          customize: function (doc) {
            doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
            doc.content.splice(1, 0, {
              margin: [0, 0, 0, 12],
              alignment: "center",
              image: "data:image/png;base64," + $("#logo_img").val(),
            });
            doc.defaultStyle = {
              font: "DejaVuSans",
            };
          },
        },
        {
          extend: "print",
          text: '<i class="fa fa-print"></i>',
          titleAttr: window.jsLang("print"),
          title: $("#logo_title").val(),
          <?php if(is_null(@$i)): ?>
            exportOptions: {
              columns: 'th:not(:last-child)'
            },
          <?php endif; ?>
        },
        {
          extend: "colvis",
          text: '<i class="fa fa-columns"></i>',
          titleAttr: window.jsLang("action"),
          postfixButtons: ["colvisRestore"],
        },
      ],
      columnDefs: [
        {
          visible: false,
        },
      ],
      responsive: true,
    });
  }

  if ($("#tableWithoutSort").length) {
    $("#tableWithoutSort").DataTable({
      bLengthChange: false,
      bDestroy: true,
      language: {
        search: "<i class='ti-search'></i>",
        searchPlaceholder: window.jsLang("search"),
        paginate: {
          next: "<i class='ti-arrow-right'></i>",
          previous: "<i class='ti-arrow-left'></i>",
        },
      },
      dom: "Bfrtip",
      buttons: [
        {
          extend: "copyHtml5",
          text: '<i class="fa fa-files-o"></i>',
          title: $("#logo_title").val(),
          titleAttr: window.jsLang("copy_table"),
          exportOptions: {
            columns: 'th:not(:last-child)'
          },
        },
        {
          extend: "excelHtml5",
          text: '<i class="fa fa-file-excel-o"></i>',
          titleAttr: window.jsLang("export_to_excel"),
          title: $("#logo_title").val(),
          margin: [10, 10, 10, 0],
          exportOptions: {
            columns: 'th:not(:last-child)'
          },
        },
        {
          extend: "csvHtml5",
          text: '<i class="fa fa-file-text-o"></i>',
          titleAttr: window.jsLang("export_to_csv"),
          exportOptions: {
            columns: 'th:not(:last-child)'
          },
        },
        {
          extend: "pdfHtml5",
          text: '<i class="fa fa-file-pdf-o"></i>',
          title: $("#logo_title").val(),
          titleAttr: window.jsLang("export_to_pdf"),
          exportOptions: {
            columns: 'th:not(:last-child)'
          },
          orientation: "landscape",
          pageSize: "A4",
          margin: [0, 0, 0, 12],
          alignment: "center",
          header: true,
          customize: function (doc) {
            doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
            doc.content.splice(1, 0, {
              margin: [0, 0, 0, 12],
              alignment: "center",
              image: "data:image/png;base64," + $("#logo_img").val(),
            });
            doc.defaultStyle = {
              font: "DejaVuSans",
            };
          },
        },
        {
          extend: "print",
          text: '<i class="fa fa-print"></i>',
          titleAttr: window.jsLang("print"),
          title: $("#logo_title").val(),
          exportOptions: {
            columns: 'th:not(:last-child)'
          },
        },
        {
          extend: "colvis",
          text: '<i class="fa fa-columns"></i>',
          postfixButtons: ["colvisRestore"],
        },
      ],
      columnDefs: [
        {
          visible: false,
        },
      ],
      responsive: true,
      ordering: false,
    });
  }

  if ($("#noSearch").length) {
    $("#noSearch").DataTable({
      bLengthChange: false,
      bDestroy: true,
      language: {
        search: "<i class='ti-search'></i>",
        searchPlaceholder: window.jsLang("search"),
        paginate: {
          next: "<i class='ti-arrow-right'></i>",
          previous: "<i class='ti-arrow-left'></i>",
        },
      },
      dom: "Bfrtip",
      buttons: [
        {
          extend: "copyHtml5",
          text: '<i class="fa fa-files-o"></i>',
          title: $("#logo_title").val(),
          titleAttr: window.jsLang("copy_table"),
          exportOptions: {
            columns: 'th:not(:last-child)'
          },
        },
        {
          extend: "excelHtml5",
          text: '<i class="fa fa-file-excel-o"></i>',
          titleAttr: window.jsLang("export_to_excel"),
          title: $("#logo_title").val(),
          margin: [10, 10, 10, 0],
          exportOptions: {
            columns: 'th:not(:last-child)'
          },
        },
        {
          extend: "csvHtml5",
          text: '<i class="fa fa-file-text-o"></i>',
          titleAttr: window.jsLang("export_to_csv"),
          exportOptions: {
            columns: 'th:not(:last-child)'
          },
        },
        {
          extend: "pdfHtml5",
          text: '<i class="fa fa-file-pdf-o"></i>',
          title: $("#logo_title").val(),
          titleAttr: window.jsLang("export_to_pdf"),
          exportOptions: {
            columns: 'th:not(:last-child)'
          },
          orientation: "landscape",
          pageSize: "A4",
          margin: [0, 0, 0, 12],
          alignment: "center",
          header: true,
          customize: function (doc) {
            doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
            doc.content.splice(1, 0, {
              margin: [0, 0, 0, 12],
              alignment: "center",
              image: "data:image/png;base64," + $("#logo_img").val(),
            });
            doc.defaultStyle = {
              font: "DejaVuSans",
            };
          },
        },
        {
          extend: "print",
          text: '<i class="fa fa-print"></i>',
          titleAttr: window.jsLang("print"),
          title: $("#logo_title").val(),
          exportOptions: {
            columns: 'th:not(:last-child)'
          },
        },
        {
          extend: "colvis",
          text: '<i class="fa fa-columns"></i>',
          postfixButtons: ["colvisRestore"],
        },
      ],
      columnDefs: [
        {
          visible: false,
        },
      ],
      responsive: true,
      ordering: false,
      searching: false,
      
    });
  }
  
     pdfMake.fonts = {
         DejaVuSans: {
             normal: 'DejaVuSans.ttf',
             bold: 'DejaVuSans-Bold.ttf',
             italics: 'DejaVuSans-Oblique.ttf',
             bolditalics: 'DejaVuSans-BoldOblique.ttf'
         }
     };
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement (2)\resources\views\backEnd\partials\data_table_js.blade.php ENDPATH**/ ?>