@extends('layouts.app')
@section('content')
    <div class="cart card-default">
        <div class="card-header">
        <!-- if is it variable its edit entry by default create entry -->
        {{ isset($category) ? 'Edit category': 'Create category'}}
        </div>
        <div class="card-body">
        <!-- <?php dump($errors->any()) ?> -->
        <!-- <?php dump(session()->has('success'))?> -->
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
            <form action="{{ isset($category) ? route('emps.update', $category->id): route('emps.store') }}" method="post">
            {{ csrf_field() }}
            @if(isset($Emp))
              @method('PATCH')
            @endif
                <div class="form-group">
                    <label for="name">Name</lable>
                    <input style="width:706px;" type="text" id="emp_name" class="form-control" name="emp_name" value="{{isset($emp) ? $emp->emp_name: '' }}" />
                    <?php echo  $errors->first('emp_name') ?>
                </div>
                <div class="form-group">
                    <label for="name">Mobile</lable>
                    <input style="width:706px;" type="text" id="emp_mobile" class="form-control" name="emp_mobile" value="{{isset($emp) ? $emp->emp_mobile: '' }}" />
                    <?php echo  $errors->first('emp_mobile') ?>
                </div>
                <div class="form-group">
                    <label for="name">Email</lable>
                    <input style="width:706px;" type="text" id="emp_email" class="form-control" name="emp_email" value="{{isset($emp) ? $emp->emp_email: '' }}" />
                    <?php echo  $errors->first('emp_email') ?>
                </div>
                <div class="form-group">
                    <label for="name">Address</lable>
                    <input style="width:706px;" type="text" id="emp_address" class="form-control" name="emp_address" value="{{isset($emp) ? $emp->emp_address: '' }}" />
                    <?php echo  $errors->first('emp_address') ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        {{isset($emp) ? 'Update Emps' :'Add Emps'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
