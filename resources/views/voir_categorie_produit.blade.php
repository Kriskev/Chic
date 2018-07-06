
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






                <!-- end row -->

                <div class="panel">

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="m-b-30">
                                    <button class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#ajouter"><i class="mdi mdi-plus-circle-outline"></i>Ajouter</button>

                                </div>
                            </div>
                        </div>

                        <div class="">
                            <table class="table table-striped add-edit-table table-bordered" id="datatable-editable">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categorieProduit as $key)
                                    <tr class="gradeA">
                                        <td>{{ $key->nom }}</td>
                                        <td> {{$key->description}}</td>
                                        <td> {{$key->description}}</td>
                                        <td class="actions">
                                            <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                            <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                            <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end: page -->

                </div>


            </div> <!-- container -->

        </div> <!-- content -->


        <!-- modal -->


        <!--  Modal ajouter un utilisateur -->
<!-- /.modal -->


        <!--  Modal modifier un utilisateur -->




        <!-- Modal delete -->




    </div>




@endsection


@section('optionscripts')






    <!-- Modal-Effect -->
    <script src="{{asset('plugins/custombox/js/custombox.min.js')}}"></script>
    <script src="{{asset('plugins/custombox/js/legacy.min.js')}}"></script>


    <!-- Examples -->
    <script src="{{asset('plugins/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatables-editable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('plugins/tiny-editable/mindmup-editabletable.js')}}"></script>
    <script src="{{asset('plugins/tiny-editable/numeric-input-example.js')}}"></script>


    <script src="{{asset('pages/jquery.datatables.editable.init.js')}}"></script>






@stop
