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
                    <h6 class="m-0 font-weight-bold text-primary">Add FAQ</h6>
                    <a href="{{ route('addfaq') }}" style="float:right;" class="btn btn-primary btn-icon-split ">

                        <span class="text">List FAQ</span>
                    </a>
                </div>
                <div class="card-body ">

                    <form id="pollForm" action="{{ route('storefaq') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="questionInput">Question</label>
                            <input type="text" class="form-control" id="questionInput" name="question"
                                placeholder="Enter question">
                        </div>
                        <div class="form-group" id="answersContainer">
                            <label for="answerInput">Answers</label>
                            <div id="answerInputs">
                                <input type="text" class="form-control answerInput" name="answer"
                                    placeholder="Enter answer">
                            </div>
                          
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>


    </div>

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
