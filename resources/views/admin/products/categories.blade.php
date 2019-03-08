@extends('admin.layouts.base')
@section('title', 'Product Categories')

@section('content')
    <div class="category">
        <div class="row expanded">
            <h2>Product Categories</h2>
        </div>
        <div class="row expanded">
            <div class="small-12 medium-6 column">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="input-group-field" placeholder="Search by Name" />
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Search" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="small-12 medium-5 end column">
                <form action="/admin/products/categories" method="POST">
                    <div class="input-group">
                        <input type="text" class="input-group-field" name="name" placeholder="Category Name" />
                        <input type="hidden" name="token" value="{{ \app\classes\CSRFToken::_token() }}" />
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Create" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row expanded">
            <div class="small-12 medium-11 column">
                @if(count($categories))
                    <table class="hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->created_at->toFormattedDateString() }}</td>
                                    <td width="100" class="text-right">
                                        <a href="#"><i class="fa fa-edit"></i></a>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h4>No categories currently exist in the database.</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
