@extends('layouts.admin-layout.app')
@section('title', 'All s')
@section('content')
{{-- Start Modal --}}
   <div class="row justify-content-start mt-2">
    <div class="col-md-4">
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
           <strong>+</strong> New Department
        </button> 
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Add</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('department.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <label for="newDepartment">Enter New Department</label>
                                <input type="text" name="department" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
   </div>
{{-- End Modal --}}
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-8">
            <table class="table table-bordered border-primary table-centered mb-0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Department</th>
                        {{-- <th>Subjects</th> --}}
                        <th>Delete</th>
                        <th>Edit</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                    <tr>
                        <td class="table-">
                           <h5>{{$department->id}}</h5>
                        </td>
                        <td>{{$department->name}}</td>
                        <td class="text-center">
                            <form action="{{route('department.destroy', $department->id)}}" method="post">
                                @csrf
                                @method('Delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                           {{-- Start Modal --}}
                            <div class="row justify-content-start">
                                <div class="col-md-4">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal">
                                    Update
                                    </button> 
                                    <!-- Modal -->
                                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            {{-- <h5 class="modal-title" id="exampleModalLabel">Add</h5> --}}
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('department.update', $department->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <label for="newDepartment">Update Department</label>
                                                            <input type="text" name="department" class="form-control" value="{{$department->name}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal --}}
                        </td>
                        <td><a class="btn btn-dark text-white" href="{{route('subject.index')}}">Subjects</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection