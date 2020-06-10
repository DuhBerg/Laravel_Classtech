<script>

  //Sidenav

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {edge:'right'});
  });


  //Tooltips

  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });

</script>

<!-- include do SweetAlert -->
@include('sweetalert::alert')

</body>
</html>
