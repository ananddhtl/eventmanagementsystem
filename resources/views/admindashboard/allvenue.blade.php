@include('admindashboard.include.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admindashboard.include.sidebar')


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="card shadow ">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary">Venue List</h6>
                    <a href="{{ route('addvenue') }}" style="float:right;" class="btn btn-primary btn-icon-split ">

                        <span class="text">Add Venue</span>
                    </a>
                </div>
                <div class="card-body ">
                    @if (session('message'))
                        <div id="successMessage" class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Title</th>

                                    <th> Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($venue as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>

                                        <td><a href="{{ route('venue.edit', ['id' => $item->id]) }}"><button
                                                    type="submit" class="btn btn-primary">Edit</button></a>&nbsp; <a
                                                href="{{ route('venue.delete', ['id' => $item->id]) }}">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </a>
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
    <script>
        function confirmDelete(itemId) {
            if (confirm('Are you sure you want to delete this item?')) {
                // Instead of 'deleteForm' + item, it should be 'deleteForm' + itemId
                document.getElementById('deleteForm' + itemId).submit();
            }
        }
    </script>


    @include('admindashboard.include.footer')
