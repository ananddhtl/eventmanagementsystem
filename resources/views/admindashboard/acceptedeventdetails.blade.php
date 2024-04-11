@include('admindashboard.include.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admindashboard.include.sidebar')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Accepted Event List</h6><br>
                            <form class="form-inline mr-auto w-100 navbar-search" action="{{url('/getall-acceptedevents')}}" method="GET">
                                @csrf
                                    <div class="input-group">
                                        <input type="text" name="event_title" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">

                                            <input type="date" name="from" class="form-control bg-light border-0 small">
                                            <input type="date" name="to" class="form-control bg-light border-0 small">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="invoice"  class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Event Title</th>
                                            <th>Description</th>
                                            <th>Thumbnail</th>
                                            <th>Event Date</th>
                                            <th>Location</th>
                                            <th>Organizer Name</th>
                                            <th>Total Public Seats</th>
                                            <th>Total Vip Seats</th>
                                            <th> Vip Seats Price</th>
                                            <th> Public Seats Price</th>

                                        </tr>
                                    </thead>


                                    <tbody >
                                        @foreach($event as $item)
                                        <tr>
                                            <td>{{$item->event_title}}</td>
                                            <td>{{$item->description}}</td>
                                            <td><img src="{{$item->thumbnail}}"></td>
                                            <td>{{$item->event_date}}</td>
                                            <td>{{$item->location}}</td>
                                            <td>{{$item->organizer_id}}</td>
                                            <td>{{$item->total_public_seats}}</td>
                                            <td>{{$item->total_vip_seats}}</td>
                                            <td>{{$item->vip_seats_price}}</td>
                                            <td>{{$item->public_seats_price}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button class="btn btn-primary" id="download-button">Download as PDF</button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
	<script>
			const button = document.getElementById('download-button');

			function generatePDF() {
				
				const element = document.getElementById('invoice');
			
				html2pdf().from(element).save();
			}

			button.addEventListener('click', generatePDF);
		</script>

    @include('admindashboard.include.footer')
