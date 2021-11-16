@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('emps.create')}}" class="btn btn-success float-right">Add Categories</a>
    </div>
    <div class="cart card-default">
        <div class="card-header">Emp-details</div>
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif
        @if(session()->has('update_success'))
            <div class="alert alert-success">{{session()->get('update_success')}}</div>
        @endif
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Emp-name</th>
                    <th>Emp-Number</th>
                    <th>Emp-Email</th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($Emps as $Emp)
                    <tr>
                        <td>
                            {{$Emp->emp_name}}
                        </td>
                        <td>
                            {{$Emp->emp_mobile}}
                        </td>
                        <td>
                            {{$Emp->emp_email}}
                        </td>
                        <td>

                                <form action="{{route('emps.destroy', $Emp->id)}}" method="POST">
                                <a href="{{route('emps.create')}}" class="btn btn-info btn-sm">
                                    Add
                                </a>
                                <a href="{{route('emps.edit', $Emp->id)}}" class="btn btn-info btn-sm">
                                    Edit
                                </a>
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button href="" class="btn btn-danger btn-sm">
                                        Delete
</button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- delete modal here -->
            <!-- Modal -->



    </div>
@endsection

@section('scripts')
<script>
    function handleDelete(id)
    {
        $('#deleteModal').modal('show')
        var form = document.getElementById('deleteCategoryForm')
        form.action = '/categories/' + id;
        console.log('Deleted', form);
    }
</script>
@endsection
