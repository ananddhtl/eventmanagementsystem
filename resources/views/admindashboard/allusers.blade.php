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
                            <h6 class="m-0 font-weight-bold text-primary">Normal Users List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                           
                                            <th> Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach($user as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->phonenumber}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->gender}}</td>
                                            <td>{{$item->email}}</td>
                                            <td><a href="{{ route('delete.organizer', ['id' => $item->id]) }}"><button type="submit"
                                                class="btn btn-primary">Delete User</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

    
    @include('admindashboard.include.footer')