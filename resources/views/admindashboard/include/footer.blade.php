 <!-- Bootstrap core JavaScript-->
 
 <script>
   
    document.addEventListener("DOMContentLoaded", function() {
       
        var successMessage = document.getElementById('successMessage');
        
     
        if (successMessage) {
           
            setTimeout(function() {
               
                successMessage.style.transition = "opacity 1s";
                successMessage.style.opacity = 0;
               
                setTimeout(function() {
                    successMessage.remove();
                }, 1000); 
            }, 5000); 
        }
    });
</script>

     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="signout">Logout</a>
                </div>
            </div>
        </div>
    </div>
 <script src="{{asset('admindashboardEMS/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admindashboardEMS/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admindashboardEMS/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admindashboardEMS/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admindashboardEMS/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admindashboardEMS/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admindashboardEMS/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>