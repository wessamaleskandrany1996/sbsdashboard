<footer class="footer pt-5">

    </footer>
</main>
  <script src="assets/js/jquery-3.6.4.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="assets/js/custum.js"></script>
  <!-- ALERTIFY JavaScript -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
    <?php if (isset($_SESSION['message'])) { ?>
        alertify.set('notifier','position', 'bottom-right');
        alertify.success('<?= $_SESSION['message']; ?>');
      <?php
      unset($_SESSION['message']);
      } else{
      }
    ?>
  </script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="./assets/js/popper.min.js" ></script>
<script src="./assets/js/bootstrap.min.js" ></script>

<script src="./assets/js/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/smooth-scrollbar.min.js"></script> 
</body>
</html>