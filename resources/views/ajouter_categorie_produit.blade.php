
@extends('layouts.design')


@section('content')


    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">


                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Form Validation </h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    <a href="#">Zircos</a>
                                </li>
                                <li>
                                    <a href="#">Forms </a>
                                </li>
                                <li class="active">
                                    Form Validation
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->



                <div class="row">
                    <div class="col-xs-3"></div>
                    <div class=" col-xs-6 " >
                        <div class="card-box">

                            <div class="row">
                                <div class="col-sm-12 col-xs-6 col-md-12  ">

                                    <h4 class="header-title m-t-0">Ajouter une Catégorie de produit</h4>
                                    {{--  <p class="text-muted font-13 m-b-10">
                                          Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                                      </p>--}}

                                    @if(Session::has('message_error'))

                                        <span class="text-danger">{!! Session('message_error') !!}</span>
                                    @endif

                                    <div class="p-20">
                                        <form action="{{route('addCategorieProduit')}}"  method="post" data-parsley-validate novalidate>
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="Nom">Titre<span class="text-danger">*</span></label>
                                                <input type="text" name="nom" parsley-trigger="change" required
                                                       placeholder="Enter le nom d ela catégorie" class="form-control" id="nom">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description<span class="text-danger">*</span></label>
                                                <input type="text" name="description" parsley-trigger="change" required
                                                       placeholder="Enter la description" class="form-control" id="description">
                                            </div>
                                            <div class="form-group text-right m-b-0">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-default waves-effect m-l-5" data-dismiss="modal" aria-label="Close">
                                                    Cancel
                                                </button>
                                            </div>

                                        </form>
                                    </div>

                                </div>


                            </div>
                            <!-- end row -->


                            <!-- end row -->



                        </div> <!-- end ard-box -->
                    </div><!-- end col-->
                    <div class="col-xs-3"></div>
                </div>


                <!-- end row -->




            </div> <!-- container -->

        </div> <!-- content -->


        <!-- modal -->


        <!--  Modal ajouter un utilisateur -->
<!-- /.modal -->


        <!--  Modal modifier un utilisateur -->




        <!-- Modal delete -->





    </div>



    @endsection


@section('categorie_produit')



    <script>
        var resizefunc = [];
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
        $(function () {
            $('#demo-form').parsley().on('field:validated', function () {
                var ok = $('.parsley-error').length === 0;
                $('.alert-info').toggleClass('hidden', !ok);
                $('.alert-warning').toggleClass('hidden', ok);
            })
                .on('form:submit', function () {
                    return false; // Don't submit form for this demo
                });
        });
    </script>


    <script type="text/javascript" src="{{asset('plugins/parsleyjs/parsley.min.js')}}"></script>
    @stop
