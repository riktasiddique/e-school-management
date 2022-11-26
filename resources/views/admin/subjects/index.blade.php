@extends('layouts.admin-layout.app')
@section('title', 'Sujects')
@section('content')
{{-- Start Modal --}}
   <div class="row justify-content-start mt-2">
    <div class="col-md-4">
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
           <strong>+</strong> New subject
        </button> 
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Add</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('subject.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="newsubject">Department</label>
                                <select class="form-select" name='department_code' aria-label="Default select example">
                                    @foreach ($departments as $department)
                                        <option value="{{$department->code}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="newsubject">Course Code</label>
                                <input type="text" name="course_code" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="newsubject">Course Title</label>
                                <input type="text" name="course_title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <h4>Or</h4>
    </div>
    <div class="col-md-4">
         <!-- Button trigger CSV modal -->
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#csv">
            <strong>+</strong> Upload CSV
         </button> 
         <!-- Modal -->
        <div class="modal fade" id="csv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload a CSV File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('subject.storeCsv')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <input type="file" name="csvFile" id="" accept=".csv">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
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
            <table class="table table-bordered border-primary table-centered mb-5">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Department</th>
                        <th>Subjects Name</th>
                        <th>Delete</th>
                        <th>Edit</th>
                        {{-- <th>Details</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                    <tr>
                        <td class="table-">
                           <h5>{{$subject->course_code}}</h5>
                        </td>
                        <td>{{$subject->department->name}}</td>
                        <td>{{$subject->course_title}}</td>
                        <td class="text-center">
                            <form action="{{route('subject.destroy', $subject->id)}}" method="post">
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
                                            <form action="{{route('subject.update', $subject->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="newsubject">Department</label>
                                                            <select class="form-select" name='department_code' aria-label="Default select example">
                                                                @foreach ($departments as $department)
                                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <label for="newsubject">Course Code</label>
                                                            <input type="text" name="course_code" class="form-control" value=" {{$subject->course_code}}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="newsubject">Course Title</label>
                                                            <input type="text" name="course_title" class="form-control" value=" {{$subject->course_title}}">
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="modal-footer justify-content-start">
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $subjects->links() }}
        </div>
</div>
@endsection