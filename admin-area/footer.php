<div class="footer-wrapper">
  <div class="footer-section f-section-1">
    <p class=""> © 2023 ALL RIGHTS RESERVED BY <a href="https://www.linkedin.com/in/ibrahim-nawab/" target="_blank">Ibrahim Nawab</a>.</p>
  </div>
  <div class="footer-section f-section-2">
    <p class="">CODED WITH <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
        </path>
      </svg></p>
  </div>
</div>
</div>
</div>
</div>
<!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?= $url ?>backassets/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="<?= $url ?>backassets/bootstrap/js/popper.min.js"></script>
<script src="<?= $url ?>backassets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= $url ?>backassets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= $url ?>backassets/assets/js/app.js"></script>
<script>
  $(document).ready(function() {
    App.init();
  });
</script>
<script src="<?= $url ?>backassets/assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?= $url ?>backassets/plugins/apex/apexcharts.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="<?= $url ?>backassets/assets/js/dashboard/dash_1.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?= $url ?>backassets/assets/js/customize.js"></script>
<script src="<?= $url ?>backassets/plugins/table/datatable/datatables.js"></script>
<script src="<?= $url ?>backassets/plugins/select2/select2.min.js"></script>
<script src="<?= $url ?>backassets/plugins/select2/custom-select2.js"></script>
<script>
  $('#zero-config').DataTable({
    "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    "oLanguage": {
      "oPaginate": {
        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
      },
      "sInfo": "Showing page _PAGE_ of _PAGES_",
      "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      "sSearchPlaceholder": "Search...",
      "sLengthMenu": "Results :  _MENU_",
    },
    "stripeClasses": [],
    "lengthMenu": [10, 25, 50, 100],
    "pageLength": 10
  });
</script>
<script src="https://cdn.tiny.cloud/1/7oqc5befp5m9u9znnxb9agwq4vdq1a51fo1lq4umu3m1snab/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#mytextareaa',
    height: 500,
    remove_linebreaks: false,
    convert_newlines_to_brs: true,
    plugins: ' fullpage   autolink   visualblocks visualchars  image link media  codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
  })
</script>
<!-- delete modal -->
<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="delete">
        <input type="hidden" name="id" id="del_page_id">
        <input type="hidden" id="delete_page" value="<?= $mypage ?>">
        <input type="hidden" id="reload" value="upcomoing-videos">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete !</h5>
          <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
        </div>
        <div class="modal-body">
          Are You Sure to Delete This ?
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sbmit">Yes</button>
          <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  function del(id) {
    $("#del_page_id").val(id);
    $("#deletemodal").modal("show")
  }
  function dele(id) {
    $("#del_page_ids").val(id);
  }
  $(".tagging").select2({
    tags: true
  });
</script>
</body>
</html>