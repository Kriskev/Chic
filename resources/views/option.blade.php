
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
                                    <th>Identifiant</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admin as $key)
                                <tr class="gradeA">
                                    <td>{{ $key->name }}</td>
                                   <td> {{$key->email}}</td>

                                    <td>{{ $key->role['nom']}}</td>


                                    <td class="actions">
                                        <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                        <a href="#" id="infouser" class="on-default " data-toggle="modal" data-target="#modifier" data-username="{{$key->name}}" data-email="{{$key->email}}" data-id={{$key->id}} data-role={{$key->roles_id}}><i class="fa fa-pencil"></i></a>

                                        <form action="{{ '/option/'.$key->id }}" class="pull-right" method="POST">
                                            {{ csrf_field() }}
                                        <button  type="submit" class="on-default remove-row" data-toggle="modal" data-username="{{$key->name}}" ><i class="fa fa-trash-o"></i></button>
                                        </form>
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
        <div class="modal fade bs-example-modal-lg" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Ajouter un utilisateur</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12  " >
                                <div class="card-box">

                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12 col-md-12 ">

                                            <h4 class="header-title m-t-0">Creer un utilisateur</h4>
                                            {{--  <p class="text-muted font-13 m-b-10">
                                                  Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                                              </p>--}}

                                            @if(Session::has('message_error'))

                                                <span class="text-danger">{!! Session('message_error') !!}</span>
                                            @endif

                                            <div class="p-20">
                                                <form action="{{route('storeuser')}}"  method="post" data-parsley-validate novalidate>
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="userName">Identifiant<span class="text-danger">*</span></label>
                                                        <input type="text" name="username" parsley-trigger="change" required
                                                               placeholder="Enter son idientifiant" class="form-control" id="userName">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="emailAddress">Adresse Email<span class="text-danger">*</span></label>
                                                        <input type="email" name="email" parsley-trigger="change" required
                                                               placeholder="Enter email" class="form-control" id="emailAddress">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pass1">Mot de passe<span class="text-danger">*</span></label>
                                                        <input id="pass1" type="password" placeholder="Password" name="password" required
                                                               class="form-control">
                                                    </div>

                                                    <div class="form-group">

                                                        <label class="col-sm-2 control-label">Rôle</label>

                                                        <div class="col-sm-10">

                                                            <select class="form-control" name="role" >
                                                                @foreach( $role as $key)
                                                                <option value="{{$key->id}}">{{ $key->nom }}</option>
                                                                @endforeach
                                                            </select>

                                                    </div>

                                                    </div>

                                                      <br> <br>  <br>


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

                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!--  Modal modifier un utilisateur -->

        <div class="modal fade bs-example-modal-lg" id="modifier" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Ajouter un utilisateur</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12  " >
                                <div class="card-box">

                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12 col-md-12 ">

                                            <h4 class="header-title m-t-0">Modifier un un utilisateur</h4>
                                            {{--  <p class="text-muted font-13 m-b-10">
                                                  Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                                              </p>--}}

                                            @if(Session::has('message_error'))

                                                <span class="text-danger">{!! Session('message_error') !!}</span>
                                            @endif

                                            <div class="p-20">
                                                <form action="{{''}}"  method="post" data-parsley-validate novalidate id="updateUser">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="userName">Identifiant<span class="text-danger">*</span></label>
                                                        <input type="text" name="name" parsley-trigger="change" required
                                                               placeholder="Enter son idientifiant" class="form-control" id="updateName">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="emailAddress">Adresse Email<span class="text-danger">*</span></label>
                                                        <input type="email" name="email" parsley-trigger="change" required
                                                               placeholder="Enter email" class="form-control" id="updateEmail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pass1">Mot de passe<span class="text-danger">*</span></label>
                                                        <input id="updatePassword" type="password" placeholder="Password" name="password" required
                                                               class="form-control">
                                                    </div>

                                                    <div class="form-group">

                                                        <label class="col-sm-2 control-label">Rôle</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="roles_id" id="updateRole" >
                                                                @foreach( $role as $key)
                                                                    <option  value="{{$key->id}}">{{ $key->nom }}</option>
                                                                    @endforeach
                                                            </select>

                                                        </div>

                                                    </div>

                                                        <br> <br>  <br>


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

                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>



        <!-- Modal delete -->


        <div id="supprimer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content p-0 b-0">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="panel-title">Panel Primary</h3>
                        </div>
                        <div class="panel-body">
                            <p>Voulez vous supprimer l'utilisateur <span id="nom"> </span> </p> <br><br>
                            <a href="" role="button" class="btn btn-danger waves-effect w-md waves-light m-b-5" id="delete">Supprimer</a>
                            <button type="button" class="btn btn-default waves-effect w-md m-b-5" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>


    </div>




    @endsection


@section('optionscripts')



    <script type="text/javascript">

        $(function() {
            $('#modifier').on("show.bs.modal", function (e) {

                var username = $(e.relatedTarget).data('username');
                var email = $(e.relatedTarget).data('email');
                var roleId = $(e.relatedTarget).data('role');
                var idUser =  $(e.relatedTarget).data('id');

                $(e.currentTarget).find('input[name="name"]').val(username);
                $(e.currentTarget).find('input[name="email"]').val(email);
                $(e.currentTarget).find('input[name="roles_id"]').val(roleId);


               // $(e.currentTarget).find('#updateRole').selectpicker('val', roleId);
                $(e.currentTarget).find('#updateRole').val(roleId).select("refresh");
                //$(e.currentTarget).find('#svrty').text(slctqstnsvrtytxt).selectpicker('render');

                var link = "/update/user/"+idUser

                $('#updateUser').attr("action",link);
            });
        });
    </script>


    //Supprimer

    <script type="text/javascript">

        $(function() {
            $('#supprimer').on("show.bs.modal", function (e) {

                var username = $(e.relatedTarget).data('username');
                var id = $(e.relatedTarget).data('id');

                var link = "/option/"+id;


                $(e.currentTarget).find('#nom').html(username);
                $('#delete').attr("href",link);


            });
        });
    </script>






    @if(Session::has('message_error'))

        <script type="text/javascript">
            $(document).ready(function(){
                $("#ajouter").modal('show');
            });
        </script>
    @endif



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
