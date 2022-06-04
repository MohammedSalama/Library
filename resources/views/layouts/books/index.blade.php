@extends('layouts.admin.master')
@section('css')
@endsection

@section('title')
    Books
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6"> Books <h4 class="mb-0"> </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color"> Books </a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('message')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <button class="btn btn-success btn-sm" title="create" data-toggle="modal"
                            data-target="#createbook" >
                        Create Book</button>
                    @include('layouts.books.create')
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $books)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td>{{ $books -> title}}</td>
                                    <td>{{ $books -> desc }}</td>
                                    <td>
                                        <img style="width: 50%; height: 50%;"
                                             src="
                                                {{--  مسار الصور --}}
                                             {{ asset('storage/'. $books -> img) }}"
                                        ></td>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" data-book_id="{{$books->id}}"
                                                data-toggle="modal" data-target="#deletedbook"><i
                                                class="fa fa-trash"></i></button>

                                        <button class="btn btn-success btn-sm" title="Edit" data-toggle="modal"
                                                data-target="#Editbook{{$books->id}}" ><i
                                                class="fa fa-edit"></i></button>

                                        @include('layouts.books.deleted')

                                        @include('layouts.books.edit')

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        $('#deletedbook').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var book_id = button.data('book_id')
            var modal = $(this)
            modal.find('.modal-body #book_id').val(book_id);
        })
    </script>
@endsection
