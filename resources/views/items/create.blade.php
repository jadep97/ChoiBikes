@extends('layouts.app', ['activePage' => 'item-management', 'titlePage' => __('Item Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Item Category</h4>
                <p class="card-category"> Managing Inventory Items</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

       <form class="form" method="POST" action="{{ route('item.store') }}">
        {{ csrf_field() }}

              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="itemName" name="itemName" class="form-control" />
                    <label class="form-label" for="itemName">Item Name/Category</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="brandName" name="brandName" class="form-control" />
                    <label class="form-label" for="brandName">Brand Name</label>
                  </div>
                </div>
              </div>

              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="number" id="price" name="price" class="form-control" />
                    <label class="form-label" for="price">Price</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="number" id="lastPrice" name="lastPrice" class="form-control" />
                    <label class="form-label" for="lastPrice">Last Price</label>
                  </div>
                </div>
              </div>

              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="number" id="stocks" name="stocks" class="form-control" />
                    <label class="form-label" for="price">Stocks</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="lastPrice" name="category" class="form-control" />
                    <label class="form-label" for="category">Category</label>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-block mb-4">Add Item</button>
              
      </form>

              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection